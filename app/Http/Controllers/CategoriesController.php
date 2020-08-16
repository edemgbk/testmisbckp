<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
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
