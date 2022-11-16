<?php

namespace App\Http\Controllers\Admin;

use App\Models\EmployeeContact;
use DateTime;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\EmployeeAttendence;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\employeeLoginRequest;
use App\Http\Requests\StoreEmployeeRequest;

class EmployeeController extends Controller
{
    public function index()
    {

        return view('employee.auth.login');
    }

    public function dashboard()
    {

        $employee_attendences = EmployeeAttendence::where('employee_id', auth()->guard('employee')->user()->id)->get();
        return view('employee.dashboard', compact('employee_attendences'));

    }

    public function employeeLogin(employeeLoginRequest $request)
    {


        $validated = $request->validated();

        // if(auth()->guard('employee')->attempt(['email' => $check['email'], 
        // 'password' => $check['password'] ])){
        if (auth()->guard('employee')->attempt($validated)) {

            return redirect()->route('employee.dashboard')->with('error', 'You Successfully logged in');

        } else {

            return back()->with('error', 'Invalid Email or Password');
        }

    }

    public function employeeLogout()
    {

        auth()->guard('employee')->logout();

        return redirect()->to('/')->with('error', 'You have successfully logged out.');
    }

    public function storeEmployee(StoreEmployeeRequest $request)
    {
        $validated = $request->validated();

        $validated['password'] = bcrypt($request->password);

        Employee::create($validated);

        $notification = array(
            'message' => 'Employee has been created',
            'alert-type' => 'success'
        );

        return redirect()->route('dashboard')->with($notification);
    }


    public function editEmployee($id)
    {
        $employee = Employee::findOrFail($id);

        if ($employee) {
            return response()->json([
                'status' => '200',
                'employee' => $employee
            ]);
        } else {
            return response()->json([
                'status' => '404',
                'message' => 'Employee not found'
            ]);
        }

    }

    public function updateEmployee(StoreEmployeeRequest $request, $id)
    {
        $validated = $request->validated();

        Employee::findOrFail($id)->update($validated);

        $notification = array(
            'message' => 'Employee has been created',
            'alert-type' => 'success',
        );

        return redirect()->route('dashboard')->with($notification);
    }

    public function deleteEmployee($id)
    {
        Employee::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Employee has been created',
            'alert-type' => 'success',
        );

        return redirect()->route('dashboard')->with($notification);
    }

    public function employeeFilter()
    {
        // return
        $employees = EmployeeContact::with('employee')->get();

        return view('admin.employee.employee_filter', compact('employees'));
    }


    public function filterEmployeeAttendence(Request $request)
    {

        if (isset($request->fromDate)) {

            $fromDate = new DateTime($request->fromDate);
            $format_form_date = $fromDate->format('d F Y');
            $toDate = new DateTime($request->toDate);
            $format_to_date = $toDate->format('d F Y');

            $employee_attendences = EmployeeAttendence::whereBetween('attendence_date', [$format_form_date, $format_to_date])->get();

            return view('employee.dashboard', compact('employee_attendences'));

        }

    }
}