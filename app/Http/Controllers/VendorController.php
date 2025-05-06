<?php
namespace App\Http\Controllers;

use Hash;
use Session;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class VendorController extends Controller
{

    public function registerVendor()
    {
        
        return view('vendor_register');
    }  
    public function storeVendor(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'phone' => 'required|numeric|unique:users,phone',
            'password' => 'required|min:6|confirmed',
            'id_verification' => 'nullable|image|max:2048',
        ]);

        DB::beginTransaction();

        try {
            // 1. Create User
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
                'type' => 'vendor', // or use an enum/constant if defined
                'is_active' => true,
            ]);

            // 2. Handle ID Verification Upload
            $idVerificationPath = null;
            if ($request->hasFile('id_verification')) {
                $idVerificationPath = $request->file('id_verification')->store('id_verifications', 'public');
            }

            // 3. Create Vendor
            Vendor::create([
                'user_id' => $user->id,
                'phone' => $request->phone,
                'email' => $request->email,
                'status' => 'pending', // or default status
                'id_verification' => $idVerificationPath,
            ]);

            DB::commit();

            return redirect()->route('login')->with('success', 'Vendor registered successfully. Please log in.');

        } catch (\Exception $e) {
            dd("error",$e);
            DB::rollBack();
            return back()->with('error', 'Registration failed. Please try again.');
        }
    }

    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Email is required',
            'password.required' => 'Password is required',
        ]);
    
        $credentials = $request->only('email', 'password');
    
        // Hardcoded admin login
        // if ($credentials['email'] == 'admin@example.com' && $credentials['password'] == '123456') {
        //     return redirect()->intended('/dashboard')->withSuccess('Signed in');
        // }
    
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
    
            // Check user type and redirect accordingly
            if ($user->type === 'admin') {
                return redirect()->intended('/dashboard')->withSuccess('Signed in');
            } else {
                return redirect()->intended('/')->withSuccess('Signed in');
            }
        }
    
        return redirect("login")->withErrors('These credentials do not match our records.');
    }
    
    public function registration()
    {
        return view('register'); 
    }
      

    public function customRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'confirm_password' => 'required|min:6'
        ],
         [
            'name.required' => 'Username is required',
            'email.required' => 'Email is required',
            'password.required' => 'Password is required',
            'confirm_password' => 'Password is required'
        ]
    );
           
        $data = $request->all();
        $check = $this->create($data);
         
        return redirect("login")->withSuccess('You have signed-in'); 
    }


    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }    
    

    public function dashboard()
    {
        if(Auth::check()){
            return view('index');
        }
  
        return redirect("login")->withSuccess('You are not allowed to access');
    }
    

    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
}