<?php
namespace App\Http\Controllers;

use Hash;
use Session;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{

    public function index()
    {
        
        return view('login');
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
    
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
    
            // Check if user is vendor
            if ($user->type === User::USER_TYPE_VENDOR) {
                $vendor = Vendor::where('user_id', $user->id)->first();
    
                if (!$vendor || $vendor->status !== Vendor::VENDOR_STATUS_APPROVE) {
                    Auth::logout();
                    return redirect()->back()->with('error', 'Your account is currently disabled. Please contact the administrator.');
                }
            }
            // If redirect_to is set (e.g., from room review form), redirect there
            if ($request->filled('redirect_to')) {
                return redirect($request->input('redirect_to'))->with('success', 'Signed in success.');
            }
            // Redirect based on user type
            return in_array($user->type, [User::USER_TYPE_ADMIN, User::USER_TYPE_VENDOR])
            ? redirect()->intended('/dashboard')->with('success', 'Signed in success.')
            : redirect()->intended('/')->with('success', 'Signed in success.');
        }
    
        return redirect()->back()->withErrors(['email' => 'These credentials do not match our records.']);
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
        if ($data['password']) {
            $data['password']= Hash::make($data['password']);
        }
        $data['type'] = User::USER_TYPE_USER;
        $check = $this->create($data);
         
        return redirect("login")->withSuccess('You have registred successfully.'); 
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