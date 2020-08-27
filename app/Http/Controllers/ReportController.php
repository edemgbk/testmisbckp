<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Report;
use App\User;

use App\Expense;
use Illuminate\Support\Facades\Crypt;
use App\Exports\ReportExport;
use Maatwebsite\Excel\Facades\Excel;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailNotify;

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

    public function export(Request $request)
    {
            $r_id = Crypt::decrypt($request->id);

             $reportid = Report::find($r_id);

            return Excel::download(new ReportExport($reportid), 'Report.xlsx');

    }

//     public function export(Request $request,$id)
//   {

//     Excel::create('Report List', function($excel) use ($id)
//     {
//         $excel->sheet('Reports', function($sheet) use ($id)
//         {
//             $data = Report::where('id', $id)->get();
//             $data = json_decode(json_encode($data),true);
//             $Reports = [];
//             foreach ($data as $key => $value) {
//                 $report['title']= $value['vname'];
//                 $report['reportnumber']= $value['vaddress'];
//                 $report['fromd']= $value['fromd'];
//                 $report['tod']= $value['tod'];

//                 $Reports[] = $report;
//             }
//             $sheet->fromArray($Reports);
//         });
//     })->download('xlsx');
// }

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
        $report->status = 0;

        $report->save();

        $report = Report::where('title',$request->title)->first();
        $report->expenses()->attach($request->amount);
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



 public function submitreport(Request $request, $id){

    $r_id = Crypt::decrypt($id);
    $reports = Report::find($r_id);
    $uid = Auth::user();
    $Users = User::find($uid);

// dd($reports->title);

    foreach($Users as $User){
            $User->name . "<br>";
        }
  //   foreach($Report->expenses as $expense){
    //         echo $expense->amount . "<br>";
    //     }

$to_name = 'Mr Leslie';
$to_email = 'leslienarh@gmail.com';
$data = array('name'=>"edem", "body" => 'Dear '.$to_name .',The expense report titled  '.$reports->title .' has been submitted by'. $User->name.' for your approval.');

Mail::send('Email.mail', $data, function($message) use ($to_name, $to_email) {
    $message->to($to_email, $to_name)
            ->subject('report submitted ,approval pending');
    $message->from('jkb@test','dev');
});



return back()->with('success','Report submitted successfully .');


            }

    public function approve(Request $request, $id)
{
    switch($request->get('approve'))
    {
        case 0:
            Report::postpone($id);
            break;
        case 1:
            Report::approve($id);
            break;
        case 2:
            Report::reject($id);
            break;
        case 3:
            Report::postpone($id);
            break;
        default:
            break;

    }

    // jkofi.bucknor@googlemail.com
    // Madam Tawiah
$to_name = 'edem';
$to_email = 'edemgbk1@gmail.com';
$data = array('name'=>"gbeku", "body" => "Test mail");

Mail::send('Email.mail', $data, function($message) use ($to_name, $to_email) {
    $message->to($to_email, $to_name)
            ->subject('report approved');
    $message->from('jkb@test','dev');
});
    return redirect('reports.view');
}



public function delete(Request $request) {
    $id = Crypt::decrypt($request->input('id'));
    // dd($id);
    $user = Report::where('id', $id)->first();

    if (empty($user)) {
        $request->session()->flash('status', [
            'error' => true,
            'title' => 'Sorry!',
            'message' => 'Issue deleting report, please retry.',
        ]);
    }

    if ($user->delete()) {
        $request->session()->flash('status', [
            'error' => false,
            'title' => 'Deleted!',
            'message' => 'report deleted successfully.',
        ]);
    }

    return redirect()->route('reports');
}





}
