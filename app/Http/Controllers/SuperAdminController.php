<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
   public function home()
   {
    return view('dashboard.superadmin');
   }
}
