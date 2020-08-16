<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Currency;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

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
        $createCurrencies->name = str_slug(strtolower($request->name));
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

}
