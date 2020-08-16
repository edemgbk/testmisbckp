<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Expense;
use App\Category;
use App\Merchant;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ExpenseController extends Controller
{
    //

    public function __construct() {
		$this->middleware('auth');
	}

	public function index() {
        $id = Auth::user();

         $Categories=Category::all();
         $Merchants=Merchant::all();

  return view('layouts.expense.index',compact('Categories','Merchants'));
    }


    public function create(Request $request) {

        $this->validate($request, [
            'date' => 'required|date',
            // 'category_id' => 'required|string|min:5',
            // 'merchant_id' => 'required|int|min:5',
            'reference' => 'required|string|min:1',
            'amount' => 'required|string|min:1',
            'description' => 'required|string|min:5',
            'reports' => 'required|string|min:5',
        ]);

dd($request->all());

    // try {
        $createCategories = new Category();
        $createCategories->name = str_slug(strtolower($request->name));
        $createCategories->description = $request->description;
        $createCategories->save();
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
