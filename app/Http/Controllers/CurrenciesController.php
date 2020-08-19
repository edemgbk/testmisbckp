<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Currency;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Brian2694\Toastr\Facades\Toastr;

class CurrenciesController extends Controller
{
    //

    public function __construct() {
		$this->middleware('auth');
	}

	public function index() {
        $id = Auth::user();

		 $Currencys=Currency::all();
  return view('layouts.currencies.index',compact('Currencys'));
    }



    public function view() {
        $id = Auth::user();

		 $Currencys=Currency::all();
  return view('layouts.currencies.view');
    }


    public function create(Request $request) {

        $this->validate($request, [
            'name' => 'required|string|min:5',
            'symbol' => 'required|string|min:1',

        ]);

// dd($request->all());

    // try {
        $createCurrencies = new Currency();
        $createCurrencies->name = $request->name;
        $createCurrencies->symbol = $request->symbol;
        $createCurrencies->save();
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

    $c_id = Crypt::decrypt($id);

    $Currency = Currency::find($c_id);

    return view('layouts.currencies.edit',compact('Currency'));

}


public function update(Request $request,$id) {
    // dd($id);
    $c_id = Crypt::decrypt($id);

    //creates a slug name

    $this->validate($request, [
        'name' => 'required|string|min:3|unique:Currencies,name,' . $c_id,
        'symbol' => 'nullable|string|min:3',
    ]);

    try {

        $Currency = Currency::find($c_id);
        $Currency->name = $request->name;
        $Currency->symbol = $request->symbol;
        $Currency->save();

        // $owner->syncPermissions($request->permissions);

        $request->session()->flash('status', [
            'error' => false,
            'title' => 'Great!',
            'message' => 'Currency Updated!',
        ]);

        return redirect()->route('user-management.currencies');


    } catch (QueryException $exception) {

        $request->session()->flash('status', [
            'error' => true,
            'title' => 'Sorry!',
            'message' => 'Issue updating currency.',
        ]);

        return back();
    }
}

}
