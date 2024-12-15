<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AssignPermissionController extends Controller
{
    public function index($role_id)
    {
        $data['role'] = Role::where('id', $role_id)->first();
        $data['permissions'] = Permission::all();
        return view('assign-permission.assign-permission', $data);
    }
    public function store(Request $request)
    {
      

         // Get the role name from the request
    $roleName = $request->input('role');

    // Retrieve the role by name
    $role = Role::where('name', $roleName)->first();

    if (!$role) {
        return response()->json(['error' => 'Role not found'], 404);
    }


    //     $roleId = $request['role'];
    // $role = Role::find($roleId); // Make sure Role is imported and properly used


    if (!$role) {
        return response()->json(['error' => 'Role not found'], 404); // Handle not found case
    }

    $role->syncPermissions($request['permissions']);
    return  back()->with('success','Role created successfully');


    }
}
