<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use App\Services\Models\Role\RoleService;

class AssignPermissionController extends Controller
{
    protected $roleService;
    public function __construct()
    {
        $this->roleService = new RoleService();
    }
    
    public function index($role_id)
    {
        $data = $this->roleService->assignPermissions($role_id); 
        $role = $data['role']; 
        $permissions = $data['permissions']; 
        $rolePermissions = $data['rolePermissions']; 
    
        return view('assign-permission.assign-permission', compact('role', 'permissions', 'rolePermissions'));
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
    
        // Fetch the permissions by their IDs
        $permissions = Permission::whereIn('id', $request['permissions'])->get();
    
        // Sync the permissions to the role
        $role->syncPermissions($permissions); 
    
        return back()->with('success', 'Permissions assigned successfully');
    }
    
}
