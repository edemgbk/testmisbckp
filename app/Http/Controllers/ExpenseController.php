<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Expense;
use App\Category;
use App\Currency;
use App\Merchant;
use App\Report;
use App\Paid_Through;

use Brian2694\Toastr\Facades\Toastr;

use Illuminate\Support\Facades\Crypt;
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
         $Expenses=Expense::all();
        $Reports=Report::all();
        $Currencys=Currency::all();
        $paid_throughs=Paid_Through::all();
        // $Expense->paidthrough->accountname;
        // $expenseall=Expense::find(8);
        // dd($expenseall->reports);
        // foreach($expenseall->reports as $report){
        //     echo $report->title . "<br>";
        // }


        // dd($expenseone);
  return view('layouts.expense.index',compact('Categories','Merchants','Expenses','Reports','paid_throughs','Currencys'));
    }



    public function view($id) {
        $e_id = Crypt::decrypt($id);

        $expense = Expense::find($e_id);
    // return 0;


    // foreach($expense->merchants as $merchant){
        // $mname=$merchant->name;
            // }

//     foreach($expense->reports as $report){
// $rtitle=$report->title;
//     }


// foreach($expense->reports as $report){


// if($report->status == 0){
// dd('pending');
// }




// }
        return view('layouts.expense.view',compact('expense'));
    }



    public function create(Request $req) {

// dd($request->all());
        // $this->validate($request, [
        // 'date' => 'required|date',
        // 'reference' => 'required|string|min:1',
        // 'amount' => 'required|numeric|min:1',
        // 'description' => 'required|string|min:5',
        // 'file' => 'required|mimes:csv,txt,xlx,xls,pdf|max:2048',

        // 'currency_id' => 'required|string|min:1',
        // 'report_id' => 'required|string|min:5',
        // 'category_id' => 'required|string|min:3',
        // 'merchant_id' => 'required|string|min:3',

        // ]);

        $req->validate([
            'date' => 'required|date',
            'reference' => 'required|string|min:1',
            'amount' => 'required|numeric|min:1',
            'description' => 'required|string|min:5',
            'file' => 'required|mimes:csv,txt,xlx,xls,pdf|max:2048',
              ]);

// dd($request->all());

    // try {
        $createExpense = new Expense();
        $createExpense->date = $req->date;
        $createExpense->reference = $req->reference;
        $createExpense->description = $req->description;
        $createExpense->amount = $req->amount;

        if($req->file()) {
            $fileName = time().'_'.$req->file->getClientOriginalName();
            $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');

            $createExpense->fname = time().'_'.$req->file->getClientOriginalName();
            $createExpense->filepath = '/storage/' . $filePath;
            $createExpense->save();
        }

        $expense = Expense::where('reference',$req->reference)->first();

    //   dd($expense);

        // $createExpense->report_id=$request->report_id;
        // $createExpense->currency_id = $request->currency_id;
        // $createExpense->paidthrough_id=$request->paidthrough_id;
        // $createExpense->status = "Unsubmitted";

        $expense->reports()->attach($req->report_id);
        $expense->merchants()->attach($req->merchant_id);
        $expense->categories()->attach($req->categories_id);




        // $report_id = $request->report_id;
        // $category_id = $request->category_id;
        // $merchant_id = $request->merchant_id;
        // $createExpense->expenses()->attach(category_id);
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

    $e_id = Crypt::decrypt($id);

    $expense = Expense::find($e_id);
    $Paid_Through=Paid_Through::all();
    $categories=Category::all();
    $merchants=Merchant::all();
// $Expense->paidthrough->accountname
    $reports=Report::all();
    $currencies=Currency::all();
    return view('layouts.expense.edit',compact('expense','paid_throughs','categories','merchants','reports','currencies'));

}

public function update(Request $request,$id) {
    		// dd($id);
            $e_id = Crypt::decrypt($id);

            //creates a slug name
            $this->validate($request, [
                'date' => 'required|date',
                // 'reference' => 'required|string|min:5'. $e_id,
                'amount' => 'required|numeric|min:1',
                'description' => 'required|string|min:5',
                // 'paidthrough_id' => 'required|string|min:5',
                //   'report' => 'required|string|min:5',
                //  'category' => 'required|string|min:3',
                //  'merchant' => 'required|string|min:3',
                //  'currency' => 'required|string|min:3',

            ]);
// dd($request->all());
            try {
                $Expense = Expense::find($e_id);
                $Expense->reference =$request->reference;
                $Expense->amount = $request->amount;
                $Expense->description = $request->description;
                // $Expense->paidthrough_id = $request->paidthrough_id;
                $Expense->report_id = $request->report_id;
                $Expense->category_id = $request->category_id;
                $Expense->merchant_id = $request->merchant_id;
                $Expense->currency_id = $request->currency_id;
                // $Expense->status = $request->status;

                $Expense->save();

                // $owner->syncPermissions($request->permissions);

                $request->session()->flash('status', [
                    'error' => false,
                    'title' => 'Great!',
                    'message' => 'expenses Updated!',
                ]);

                return redirect()->route('expenses.expenses');


            } catch (QueryException $exception) {

                $request->session()->flash('status', [
                    'error' => true,
                    'title' => 'Sorry!',
                    'message' => 'Issue updating expenses.',
                ]);

                return back();
            }
        }



        public function delete(Request $request) {
            $id = Crypt::decrypt($request->input('id'));
            // dd($id);
            $user = Expense::where('id', $id)->first();

            if (empty($user)) {
                $request->session()->flash('status', [
                    'error' => true,
                    'title' => 'Sorry!',
                    'message' => 'Issue deleting expense, please retry.',
                ]);
            }

            if ($user->delete()) {
                $request->session()->flash('status', [
                    'error' => false,
                    'title' => 'Deleted!',
                    'message' => 'expense deleted successfully.',
                ]);
            }

            return redirect()->route('expenses.expenses');
        }


}
