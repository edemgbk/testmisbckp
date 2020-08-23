<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Report;
use App\Expense;
use Illuminate\Support\Facades\Crypt;
use App\Exports\ReportExport;
use Maatwebsite\Excel\Facades\Excel;
use Brian2694\Toastr\Facades\Toastr;

use PDF;

class ReportController extends Controller
{
    //

    public function __construct() {
		$this->middleware('auth');
	}


        public function downloadPDF($id){
            $Report = Report::find($id);
            $pdf = PDF::loadView('layouts.pdf', compact('Report'));

            return $pdf->download('mypdf.pdf');
    }

    public function export()
    {
            return Excel::download(new ReportExport, 'Report.xlsx');
    }

    public function index() {
        $id = Auth::user();

         $Reports=Report::all();
        //  $Reports->expense()->savemany([
        //     $expense,
        //     $expense
        //  ]);
        $Expenses=Expense::all();

         return view('layouts.reports.index',compact('Reports','Expenses'));

    }



    public function create(Request $request) {

        $this->validate($request, [
            'title' => 'required|string|min:5',
            'purpose' => 'required|string|min:5',
            'fromd' => 'required|string|min:5',
            'tod' => 'required|string|min:5',

        ]);

// dd($request->all());

    // try {
        $report = new Report();
        $report->title = str_slug(strtolower($request->title));
        $report->purpose = $request->purpose;
        $report->fromd = $request->fromd;
        $report->tod = $request->tod;
        $report->status = "Draft";

        $report->save();
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


public function view($id) {
    $r_id = Crypt::decrypt($id);

    $report = Report::find($r_id);
    //   foreach($report->expenses as $expense){
    //         echo $expense->amount . "<br>";
    //     }
    return view('layouts.reports.view',compact('report'));
}


public function edit($id) {

    $r_id = Crypt::decrypt($id);

    $Report = Report::find($r_id);

    return view('layouts.reports.edit',compact('Report'));

}



public function update(Request $request,$id) {
    		// dd($id);
            $r_id = Crypt::decrypt($id);

            //creates a slug name

            $this->validate($request, [
                'title' => 'required|string|min:3|unique:merchants,name,' . $r_id,
                'purpose' => 'required|string|min:5',
                'fromd' => 'required|string|min:5',
                'tod' => 'required|string|min:5',

                ]);

            try {
                $Report = Report::find($r_id);
                $Report->title = $request->title;
                $Report->purpose = $request->purpose;
                $Report->fromd = $request->fromd;
                $Report->tod = $request->tod;

                $Report->save();

                // $owner->syncPermissions($request->permissions);

                $request->session()->flash('status', [
                    'error' => false,
                    'title' => 'Great!',
                    'message' => 'report Updated!',
                ]);

                return redirect()->route('reports.reports');


            } catch (QueryException $exception) {

                $request->session()->flash('status', [
                    'error' => true,
                    'title' => 'Sorry!',
                    'message' => 'Issue updating  report.',
                ]);

                return back();
            }
        }



//     public function approve(Request $request, $id)
// {
//     switch($request->get('approve'))
//     {
//         case 0:
//             Report::postpone($id);
//             break;
//         case 1:
//             Report::approve($id);
//             break;
//         case 2:
//             Report::reject($id);
//             break;
//         case 3:
//             Report::postpone($id);
//             break;
//         default:
//             break;

//     }
//     return redirect('reports.view');
// }




}
