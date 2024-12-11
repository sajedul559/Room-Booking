<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {


        $users = User::with('role')->get();
        return view('backend.users.list', compact('users'));
    }

    // Show the form for creating a new resource.
    public function create()
    {
        $roles = Role::all();
        return view('backend.users.create', compact('roles'));
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $role = $request->role;
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $user->assignRole($role);

        return redirect()->route('admins.index')->with('success', 'User has been successfully created.');
    }

    // Display the specified resource.
    public function show($id)
    {
        $user = User::with('roles')->findOrFail($id);
        return view('user.show', compact('user'));
    }

    // Show the form for editing the specified resource.
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $user_role = $user->getRoleNames()->implode(', '); // Converts the collection to a comma-separated string


        $roles = Role::all();
        return view('backend.users.edit', compact('user', 'roles','user_role'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', "unique:users,email,$id"],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }


        $user->roles()->detach();
        $user->assignRole($request->role);
        $user->save();

        return redirect()->route('admins.index')->with('success', 'User has been successfully updated.');
    }

    // Remove the specified resource from storage.
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->roles()->detach();
        $user->delete();

        return redirect()->route('admins.index')->with('success', 'User has been successfully deleted.');
    }
}


