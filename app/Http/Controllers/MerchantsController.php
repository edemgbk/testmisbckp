<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Merchant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Brian2694\Toastr\Facades\Toastr;

class MerchantsController extends Controller
{

	public function index() {
        $id = Auth::user();

		 $Merchants=Merchant::all();
  return view('layouts.merchants.index',compact('Merchants'));

    }



//     public function view() {
//         $id = Auth::user();

// 		 $Invoices;
//   return view('layouts.merchants.view');
//     }

    public function view(
        $id
        ) {
		$c_id = Crypt::decrypt($id);

		$category = Category::find($c_id);
// return 0;
        return view('layouts.merchants.view',compact('merchants'));
	}


    public function create(Request $request) {

        $this->validate($request, [
            'name' => 'required|string|min:5',
            'code' => 'required|string|min:1',

        ]);

// dd($request->all());

    // try {
        $createMerchant = new Merchant();
        $createMerchant->name = $request->name;
        $createMerchant->code = $request->code;
        $createMerchant->save();
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

    $merchants = Merchant::find($r_id);

    return view('layouts.merchants.edit',compact('merchants'));

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
                $owner = Merchant::find($m_id);
                $owner->name = $request->name;
                $owner->code = $request->code;
                $owner->save();

                // $owner->syncPermissions($request->permissions);

                $request->session()->flash('status', [
                    'error' => false,
                    'title' => 'Great!',
                    'message' => 'merchant Updated!',
                ]);

                return redirect()->route('user-management.merchants');


            } catch (QueryException $exception) {

                $request->session()->flash('status', [
                    'error' => true,
                    'title' => 'Sorry!',
                    'message' => 'Issue updating merchant.',
                ]);

                return back();
            }
        }


}
