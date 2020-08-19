<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailNotify;


class CategoriesController extends Controller
{
    //


    public function __construct() {
		$this->middleware('auth');
	}

	public function index() {
        $id = Auth::user();

         $Categories=category::all();

  return view('layouts.categories.index',compact('Categories'));
    }



    public function view(
        $id
        ) {
		$c_id = Crypt::decrypt($id);

		$category = Category::find($c_id);
// return 0;
        return view('layouts.categories.view',compact('category'));
	}


    public function create(Request $request) {

        $this->validate($request, [
            'name' => 'required|string|min:5',
            'description' => 'required|string|min:1',

        ]);

// dd($request->all());

    // try {
        $createCategories = new Category();
        $createCategories->name = $request->name;
        $createCategories->description = $request->description;
        $createCategories->save();


$to_name = 'Leslie';
$to_email = 'leslienarh@gmail.com';
$data = array('name'=>"leslie", "body" => "Test mail");

Mail::send('Email.mail', $data, function($message) use ($to_name, $to_email) {
    $message->to($to_email, $to_name)
            ->subject('report approval pending');
    $message->from('jkb@test','dev');
});









        // toastr()->success('Success Message');

        // Toastr::success('added successfully :)','Success');

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


    // $notification = array(
    //     'message' => 'I am a successful message!',
    //     'alert-type' => 'success'
    // );

    // return Redirect::to('user-management/categories')
    // ->with($notification);

    return back()->with('success','Product successfully added.');
}


public function edit($id) {

    $c_id = Crypt::decrypt($id);

    $Category = Category::find($c_id);

    return view('layouts.categories.edit',compact('Category'));

}


public function update(Request $request,$id) {
    // dd($id);
    $c_id = Crypt::decrypt($id);

    //creates a slug name

    $this->validate($request, [
        'name' => 'required|string|min:3|unique:categories,name,' . $c_id,
        'description' => 'nullable|string|min:3',
    ]);

    // dd($request->all());
    try {
        $category = Category::find($c_id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        $request->session()->flash('status', [
            'error' => false,
            'title' => 'Great!',
            'message' => 'category Updated!',
        ]);

        return redirect()->route('user-management.categories');


    } catch (QueryException $exception) {

        $request->session()->flash('status', [
            'error' => true,
            'title' => 'Sorry!',
            'message' => 'Issue updating category.',
        ]);

        return back();
    }
}
}
