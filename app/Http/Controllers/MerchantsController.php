<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Merchant;
use Illuminate\Http\Request;

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
        $createMerchant->name = str_slug(strtolower($request->name));
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
}
