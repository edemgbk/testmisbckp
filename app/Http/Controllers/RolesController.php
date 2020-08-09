<?php

namespace App\Http\Controllers;
use App\Permission;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class RolesController extends Controller {
	//
	public function __construct() {
		$this->middleware('auth');
	}

	public function index() {
		$roles = Role::all();
		$permissions = Permission::all();
		return view('layouts.roles.index', compact('roles', 'permissions'));

	}

	public function view($id) {
		$r_id = Crypt::decrypt($id);

		$role = Role::find($r_id);

		return view('layouts.roles.view', compact('role'));
	}

	public function edit($id) {

		$r_id = Crypt::decrypt($id);

		$role = Role::find($r_id);
		$role_perms = $role->permissions;
		$role_permissions = array();

		foreach ($role_perms as $role_perm) {
			$role_permissions[] = $role_perm->id;
		}

		$permissions = Permission::all();

		return view('layouts.roles.edit', compact('role', 'permissions', 'role_permissions'));
	}

	public function create(Request $request) {
//    return $request->all();
		$request->name = str_slug(strtolower($request->name));

		$this->validate($request, [
			'name' => 'required|string|min:2|unique:roles,name',
			'display_name' => 'nullable|string|min:2',
			'description' => 'nullable|string|min:3',
			'permissions' => 'required|array|min:1',
			'permissions.*' => 'required|numeric|min:1',
		]);

		try {
			$owner = new Role();
			$owner->name = $request->name;
			$owner->display_name = $request->display_name;
			$owner->description = $request->description;
			$owner->save();

			$owner->attachPermissions($request->permissions);

			$request->session()->flash('status', [
				'error' => false,
				'title' => 'Great!',
				'message' => 'New role added!',
			]);

			return redirect()->route('user-management.roles');
		} catch (QueryException $ex) {

			$request->session()->flash('status', [
				'error' => true,
				'title' => 'Sorry!',
				'message' => 'Issue adding role.',
			]);

			return back();
		}

	}

	public function update(Request $request,$id) {
//		dd($id);
		$r_id = Crypt::decrypt($id);

		//creates a slug name

		$this->validate($request, [
			'name' => 'required|string|min:3|unique:roles,name,' . $r_id,
			'display_name' => 'nullable|string|min:3',
			'description' => 'nullable|string|min:3',
			'permissions' => 'required|array|min:1',
			'permissions.*' => 'required|numeric|min:1',
		]);

		try {
			$owner = Role::find($r_id);
			$owner->name = str_slug(strtolower($request->name));
			$owner->display_name = $request->display_name;
			$owner->description = $request->description;
			$owner->save();

			$owner->syncPermissions($request->permissions);

			$request->session()->flash('status', [
				'error' => false,
				'title' => 'Great!',
				'message' => 'Role Updated!',
			]);

			return redirect()->route('user-management.roles');


        } catch (QueryException $exception) {

			$request->session()->flash('status', [
				'error' => true,
				'title' => 'Sorry!',
				'message' => 'Issue updating role.',
			]);

			return back();
		}
	}

	public function delete(Request $request) {
		$id = Crypt::decrypt($request->input('id'));
		// dd($id);
		$role = Role::where('id', $id)->first();

		if (empty($role)) {
			$request->session()->flash('status', [
				'error' => true,
				'title' => 'Sorry!',
				'message' => 'Issue deleting role, please retry.',
			]);
		}

		if ($role->delete()) {
			$request->session()->flash('status', [
				'error' => false,
				'title' => 'Deleted!',
				'message' => 'role deleted successfully.',
			]);
		}

		return redirect()->route('user-management.roles');
	}

}
