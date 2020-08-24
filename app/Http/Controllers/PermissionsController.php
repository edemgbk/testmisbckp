<?php

namespace App\Http\Controllers;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailNotify;

use App\Classes\ToastNotification;
use App\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Validation\ValidationException;

class PermissionsController extends Controller {
	//
	public function __construct() {
		$this->middleware('auth');
	}

	public function index() {
		$permissions = Permission::all();
		return view('layouts.permissions.index', compact('permissions'));
	}

	public function create(Request $request) {



			$this->validate($request, [
				'name' => 'bail|required|unique:permissions,name|string|min:5',
				'display_name' => 'required|string|min:5',
				'description' => 'required|string|min:5',
			]);



		try {
			$createPermission = new Permission();
			$createPermission->name = str_slug(strtolower($request->name));
			$createPermission->display_name = $request->display_name;
			$createPermission->description = $request->description;
			$createPermission->save();

            $request->session()->flash('status', [
                'error' => false,
                'title' => 'Great!',
                'message' => 'Role Updated!',
            ]);
//            notify(new ToastNotification('Successful!', 'Permission Added!', 'success'));
		} catch (\Illuminate\Database\QueryException $ex) {
//            notify(new ToastNotification('Error!', 'Permission name already exist or check enter appropriate data.!', 'warning'));
			return back();
		}

		return back();
	}

	public function edit($id) {
		$permission_id = Crypt::decrypt($id);
		$permission = Permission::find($permission_id);
		return view('layouts.permissions.edit', compact('permission'));
	}

	public function update(Request $request,$id) {

		$pid = Crypt::decrypt($id);

			$this->validate($request, [
				'name' => 'required|unique:permissions,name,' . $pid . '|string|min:3',
				'display_name' => 'required|string|min:3',
				'description' => 'required|string|min:3',
			]);

//dd("hello");
		try {
			$updatePermission = Permission::find($pid);
			$updatePermission->name = str_slug(strtolower($request->name));
			$updatePermission->display_name = $request->display_name;
			$updatePermission->description = $request->description;
			$updatePermission->save();
//			    notify(new ToastNotification('Successful!', 'Permission updated!', 'success'));

		} catch (\Illuminate\Database\QueryException $ex) {
			notify(new ToastNotification('Error!', 'Permission name already exist or check enter appropriate data.!', 'warning'));
			return back();
		}
	return	redirect()->route('user-management.permissions');
	}

	public function delete(Request $request) {
		$id = Crypt::decrypt($request->input('id'));
		// dd($id);
		$permission = Permission::where('id', $id)->first();

		if (empty($permission)) {
			$request->session()->flash('status', [
				'error' => true,
				'title' => 'Sorry!',
				'message' => 'Issue deleting permission, please retry.',
			]);
		}

		if ($permission->delete()) {
			$request->session()->flash('status', [
				'error' => false,
				'title' => 'Deleted!',
				'message' => 'permission deleted successfully.',
			]);
		}

		return redirect()->route('user-management.permissions');
	}

}
