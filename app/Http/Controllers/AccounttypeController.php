<?php

namespace App\Http\Controllers;
// use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use App\Account_Type;
use Illuminate\Support\Facades\Crypt;

use Illuminate\Http\Request;

class AccounttypeController extends Controller
{
    //


	public function index() {
        $id = Auth::user();

         $Account_Types=Account_Type::all();

  return view('layouts.accounttype.index',compact('Account_Types'));
    }




    public function view($id) {
		$c_id = Crypt::decrypt($id);

		$Account_Type = Account_Type::find($c_id);
        return view('layouts.accounttype.view',compact('Account_Type'));
	}


    public function create(Request $request) {

        // $this->validate($request, [
        //     'name' => 'required|string|min:5',
        //     'description' => 'required|string|min:3',

        // ]);

// dd($request->all());

    // try {
        $AccountType = new Account_Type();
        $AccountType->name = $request->name;
        $AccountType->description = $request->description;
        $AccountType->save();
// dd("hello");

        // $request->session()->flash('status', [
        //     'error' => false,
        //     'title' => 'Great!',
        //     'message' => 'Expense Created!',
        // ]);
//            notify(new ToastNotification('Successful!', ' Expense Created!', 'success'));
    // } catch (\Illuminate\Database\QueryException $ex) {
        // dd("error");
//            notify(new ToastNotification('Error!', 'Expense  already exist or check enter appropriate data.!', 'warning'));
        // return back();
    // }

    return back();
}



public function edit($id) {

    $r_id = Crypt::decrypt($id);

    $Account_Type = Account_Type::find($r_id);

    return view('layouts.accounttype.edit',compact('Account_Type'));

}

public function update(Request $request,$id) {
    		// dd($id);
            $m_id = Crypt::decrypt($id);

            //creates a slug name

            $this->validate($request, [
                'name' => 'required|string|min:3|unique:merchants,name,' . $m_id,
                'code' => 'nullable|string|min:3',
            ]);

            try {
                $owner = Account_Type::find($m_id);
                $owner->name = $request->name;
                $owner->code = $request->code;
                $owner->save();

                // $owner->syncPermissions($request->permissions);

                $request->session()->flash('status', [
                    'error' => false,
                    'title' => 'Great!',
                    'message' => 'Account_Type Updated!',
                ]);

                return redirect()->route('user-management.accountype');


            } catch (QueryException $exception) {

                $request->session()->flash('status', [
                    'error' => true,
                    'title' => 'Sorry!',
                    'message' => 'Issue updating Account_Type.',
                ]);

                return back();
            }
        }



        public function delete(Request $request) {
            $id = Crypt::decrypt($request->input('id'));
            // dd($id);
            $Account_Type = Account_Type::where('id', $id)->first();

            if (empty($Account_Type)) {
                $request->session()->flash('status', [
                    'error' => true,
                    'title' => 'Sorry!',
                    'message' => 'Issue deleting Account_Type, please retry.',
                ]);
            }

            if ($Account_Type->delete()) {
                $request->session()->flash('status', [
                    'error' => false,
                    'title' => 'Deleted!',
                    'message' => 'Account_Typense deleted successfully.',
                ]);
            }

            return redirect()->route('user-management.accountype');
        }

}
