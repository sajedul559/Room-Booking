<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;

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
        dd($request->all());
    }
}
