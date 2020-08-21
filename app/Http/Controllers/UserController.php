<?php

namespace App\Http\Controllers;
use App\Classes\ToastNotification;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller {
	//
	public function __construct() {
		$this->middleware('auth');
	}

	public function index() {
		$id = Auth::user();
//		dd($id);
		$users = User::all();
		$roles = Role::all();

		return view('layouts.users.index', compact('users', 'roles'));

	}

	public function profile() {
		$id = Auth::id();
		$user = User::find($id);
		return view('layouts.users.profile', compact('user'));

	}


    public function create(Request $request) {
       dd($request->all());


            $this->validate($request, [
                'username' => 'required|string|max:20',
                'roles' => 'required|string|min:3',
                'first_name' => 'required|string|max:20:min:1',
                'last_name' => 'required|string|unique:users',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6|confirmed',
            ]);
    //    dd($request->all());

		try {

			$user = new User();
			$user->username = $request->username;
			$user->email = $request->email;
			$user->first_name = $request->first_name;
			$user->last_name = $request->last_name;
            $user->password = Hash::make($request->password);
            $user->save();

// dd("hello");

//        //We assign a then assign a role and permissions to a user
			$role = Role::where('name', $request->input('roles'))->first();
			if (!empty($role)) {
				$user->attachRole($role);
			}
			$request->session()->flash('status', [
				'error' => false,
				'title' => 'Great!',
				'message' => 'New user added.',
			]);
		} catch (QueryException $exception) {
			$request->session()->flash('status', [
				'error' => true,
				'title' => 'Sorry!',
				'message' => 'Issue adding user.',
			]);

			return back();
		}
		return redirect()->route('user-management.users');
	}



    public function update(Request $request,$id)
    {
//     dd($id);
      $id = Crypt::decrypt($id);



            $this->validate($request, [
            'username' => 'required|string|max:255|unique:users',
            'role' => 'required|string|min:3',
            'first_name' => 'required|string|max:255:min:1',
            'last_name' => 'required|string|max:255:min:1',
            'email' => 'required|min:2|email|unique:users',
            'password' => 'required|string|min:6|confirmed',

        ]);


        try {
        $user = User::find($id);

        $user->username = $request->username;
        $user->email = $request->email;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->password = $request->password;
        $user->save();

        $user->syncRoles([$request->role]);

        $request->session()->flash('status', [
            'error' => false,
            'title' => 'Great!',
            'message' => 'User Updated.',
        ]);
        } catch (QueryException $exception) {
            $request->session()->flash('status', [
                'error' => true,
                'title' => 'Sorry!',
                'message' => 'Issue adding user.',
            ]);

            return back();
        }
        return redirect()->route('user-management.users');
    }



	public function edit_user(Request $request, $id) {

		$user = Crypt::decrypt($id);

			$this->validate($request, [
				'first_name' => 'required|string|max:255',
				'last_name' => 'required|string|max:255',
				'username' => 'required|string|max:255',
				'email' => 'required|string|email|max:255|unique:users,email,' . $user,
				'password' => 'required|string|min:6|confirmed',
			]);


		User::find($user)->update([
			'first_name' => $request->first_name,
			'last_name' => $request->last_name,
			'username' => $request->username,
			'email' => $request->email,
		]);
		$user = User::find(Crypt::decrypt($id));

		if (trim($request->password) === trim($request->confirm_password)) {
			$user->password = Hash::make($request->password);
			$user->save();

		} else {
			echo "password error pls check";

			notify(new ToastNotification('fail!', 'User update fail!', 'success'));
		}
//        notify(new ToastNotification('Successful!', 'User updated!', 'success'));

		return back();
	}

	public function edit($id) {

		// $u_id = Crypt::decrypt($id);

		// $user = User::find($u_id);
		// $user_role = $user->roles;
		// $role_permissions = array();

		// foreach ($role_perms as $role_perm) {
		//     $role_permissions[] = $role_perm->id;
		// }

		// $permissions = Permission::all();

		// return view('roles.edit', compact('role', 'permissions', 'role_permissions'));
		$roles = Role::all();

		$user_id = Crypt::decrypt($id);
		$user = User::find($user_id);
		return view('layouts.users.edit', compact('user', 'roles'));

	}

	public function delete(Request $request) {
		$id = Crypt::decrypt($request->input('id'));
		// dd($id);
		$user = User::where('id', $id)->first();

		if (empty($user)) {
			$request->session()->flash('status', [
				'error' => true,
				'title' => 'Sorry!',
				'message' => 'Issue deleting user, please retry.',
			]);
		}

		if ($user->delete()) {
			$request->session()->flash('status', [
				'error' => false,
				'title' => 'Deleted!',
				'message' => 'user deleted successfully.',
			]);
		}

		return redirect()->route('user-management.users');
	}

}
