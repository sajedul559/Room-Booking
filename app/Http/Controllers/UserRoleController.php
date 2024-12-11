<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class UserRoleController extends Controller
{


   // GET method: Show form with user-specific permissions
    public function editPermissions(Request $request)
    {
        $users = User::all();  // Fetch all users
        $permissions = Permission::all();  // Fetch all available permissions

        // Check if user is selected
        $selectedUser = null;
        $userPermissions = [];
        if ($request->has('user')) {
            $selectedUser = User::findOrFail($request->user);
            $userPermissions = $selectedUser->permissions->pluck('name')->toArray(); // Fetch user-specific permissions
        }

        return view('roles.manage-user-permissions', compact('users', 'permissions', 'selectedUser', 'userPermissions'));
    }

    // POST method: Update user-specific permissions
    public function updatePermissions(Request $request, $userId)
    {
        $request->validate([
            'permissions' => 'nullable|array',
            'permissions.*' => 'string|exists:permissions,name',
        ]);

        $user = User::findOrFail($userId);

        // Sync permissions (if no permissions are selected, all permissions will be removed)
        if ($request->has('permissions')) {
            $user->syncPermissions($request->permissions);
        } else {
            $user->syncPermissions([]); // If no permissions are selected, clear all user-specific permissions
        }

        return redirect()->route('users.editPermissions', ['user' => $userId])
                         ->with('success', 'User permissions updated successfully.');
    }

}
