<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;

use App\Models\Employee;
use App\Models\EmployeeAttendence;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {

        return view('admin.auth.login');

    }

    public function dashboard()
    {


        $employees = Employee::all();
        $employee_attendences = EmployeeAttendence::all();

        return view('admin.dashboard', compact('employees', 'employee_attendences'));

    }

    public function adminLogin(LoginRequest $request)
    {

        $validated = $request->validated();

        if (auth()->guard('admin')->attempt($validated)) {

            return redirect()->route('admin.dashboard')->with('error', 'You Successfully logged in');

        } else {

            return back()->with('error', 'Invalid Email or Password');
        }


    }

    public function adminLogout()
    {

        auth()->guard('admin')->logout();

        return redirect()->route('login_form')->with('error', 'You have successfully logged out.');
    }

    public function AdminRegister()
    {

        return view('admin.auth.register');
    }

    public function CreateAdmin(Request $request)
    {

        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'created_at' => now()
        ]);

        return redirect()->route('login_form')->with('error', 'New admin has been created.');

    }
}