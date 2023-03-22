<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;

class PermissionController extends Controller {

	public function set_permission(Request $request)
	{
		if (auth()->user()->can('set-permission'))
		{
			$id = $request['roleId'];
			$role = Role::findById($id);
			$all_permissions = $request['checkedId'];
			$role->syncPermissions($all_permissions);

			return response()->json(['success' => __('Successfully saved the permission')]);
		}
		return response()->json(['success' => __('You are not authorized')]);
	}

	public function rolePermission($id){
		if (auth()->user()->can('set-permission'))
		{
			$role = Role::findById($id);
			return view('settings.roles.permission',compact('role'));
		}
		return response()->json(['success' => __('You are not authorized')]);
	}

	public function permissionDetails($id)
	{
		$role = Role::findById($id);
		$role_permissions = $role->permissions()->select('name')->get();
        //return response($role_permissions);

		$permissions = array();
		foreach ($role_permissions as $permission)
		{
			$permissions[] = $permission->name;
		}
		return json_encode($permissions);
	}
}
