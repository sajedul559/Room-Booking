<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\TenantReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('frontend.user.profile', ['user' => auth()->user()]);
    }

    public function updateAvatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $user = auth()->user();
        $avatarPath = $request->file('avatar')->store('avatars', 'public');
        $user->avatar = $avatarPath;
        $user->save();

        return back()->with('success', 'Avatar updated successfully.');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);
    
        $user = auth()->user();
    
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect.']);
        }
    
        $user->password = Hash::make($request->new_password);
        $user->save();
    
         // Log out the user after password change
        Auth::logout();

        // Redirect to login page with success message
        return redirect()->route('login')->with('success', 'Password changed successfully. Please login again.');
    }
    

}