<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{



    // this function will handle the logout process of users
    public function Userlogout(Request $request){
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return  redirect()->route('login');
    }




    // this function will handle the logout process 0f admin
    public function Adminlogout(Request $request){
        $request->session()->invalidate();
        $request->session()->regenerateToken();
         return redirect()->route('adminLogin');
    }
} 
