<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function index(){

        return view('admin.seller.login');
    }

    public function dashboard(){

        return view('admin.index');
    }

    public function SellerLogin(Request $request){

        $check = $request->all();

       if (auth()->guard('seller')->attempt(['email' => $check['email'], 
       'password' => $check['password'] ])) {
        
        return redirect()->route('seller.dashboard');

       } else {
        
        return back()->with('error', 'Invalid Email or Password');
       }
       


    }
}
