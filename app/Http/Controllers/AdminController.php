<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){

        return view('admin.auth.login');

    }

    public function dashboard(){

        return view('admin.index');
    }

    public function AdminLogin(Request $request){

        // dd($request->all());

        $check = $request->all();

        if(auth()->guard('admin')->attempt(['email' => $check['email'], 
        'password' => $check['password'] ])){

            return redirect()->route('admin.dashboard')->with('error', 'You Successfully logged in');

        } else{

            return back()->with('error', 'Invalid Email or Password');
        }

        
    }

    public function AdminLogout(){

        auth()->guard('admin')->logout();

        return redirect()->route('login_form')->with('error', 'You have successfully logged out.');
    }

    public function AdminRegister(){

        return view('admin.auth.register');
    }

    public function CreateAdmin(Request $request){

        Admin::create([

            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'created_at' => now()
        ]);

        return redirect()->route('login_form')->with('error', 'New admin has been created.');

    }
}
