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
use App\Services\Vendor\VendorService;

class VendorController extends Controller
{

    public function __construct(protected VendorService $vendorService) {}

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
    
        $data = $request->only(['name', 'email', 'phone', 'password']);
        if ($request->hasFile('id_verification')) {
            $data['id_verification'] = $request->file('id_verification');
        }
    
        $result = $this->vendorService->registerVendor($data);
    
        if ($result['success']) {
            return redirect()->route('login')->with('success', 'Vendor registered successfully.');
        }
    
        return back()->with('error', 'Registration failed. ' . ($result['message'] ?? 'Please try again.'));
    }
}