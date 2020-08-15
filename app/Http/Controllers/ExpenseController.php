<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Expense;
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

		 $Invoices;
  return view('layouts.expense.index');
    }

    public function view() {
        $id = Auth::user();

		 $Invoices;
  return view('layouts.expense.view');
    }


    public function create(Request $request) {

        $this->validate($request, [
            'reference' => 'required|string|min:5',
            'merchant' => 'required|string|min:5',
            'amount' => 'required|numeric|min:1',
            'description' => 'required|string|min:5',
            'report' => 'required|string|min:5',
            'date' => 'required|date',
        ]);



    // try {
        $createExpense = new Expense();
        $createExpense->merchant = str_slug(strtolower($request->merchant));
        $createExpense->reference = $request->reference;
        $createExpense->amount = $request->amount;
        $createExpense->description = $request->description;
        $createExpense->report = $request->report;
        $createExpense->date = $request->date;
        $createExpense->save();
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
