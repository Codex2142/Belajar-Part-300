<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;

class employeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $employee = Employee::with('department')->get();
        $employeeCount = Employee::count();
        $departmentCount = Department::count();

        $contract = Employee::where('status', 'cont')->count();
        $employee1 = Employee::where('status', 'emp')->count();
        $not_active = Employee::where('status', 'not_act')->count();
        
        return view('employee.read', compact(
            'employee',
            'employeeCount',
            'departmentCount',
            'contract',
            'employee1',
            'not_active'
            ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dept = Department::all();
        return view('employee.create', compact('dept'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:20',
            'address' => 'required',
            'dob' => 'required',
        ],[
            'firstname.required' => 'Please Fill yaour Firstname!',
            'firstname.string' => 'Not Contain a Number!',
            'firstname.max' => 'max character is 20',
            'address.required' => 'address required',
            'dob.required' => 'set Your DOB',
        ]);

        try{
            Employee::create([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'gender' => $request->gender,
                'address' => $request->address,
                'dob' => $request->dob,
                'dept_id' => $request->dept_id,
                'status' => $request->status,
            ]);
            return redirect('employee')->with('success','Added Success');
        }catch(\Exception $e){
            return redirect('employee/create')->with('error', $e);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employee = Employee::findOrFail($id);
        $department = Department::all();
        return view('employee.update', compact('employee', 'department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'firstname' => 'required|string|max:20',
            'address' => 'required',
            'dob' => 'required',
        ],[
            'firstname.required' => 'Please Fill yaour Firstname!',
            'firstname.string' => 'Not Contain a Number!',
            'firstname.max' => 'max character is 20',
            'address.required' => 'address required',
            'dob.required' => 'set Your DOB',
        ]);

        try{
            $employee = Employee::findOrFail($id);
            $employee->update([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'gender' => $request->gender,
                'address' => $request->address,
                'dob' => $request->dob,
                'dept_id' => $request->dept_id,
                'status' => $request->status,
            ]);
            return redirect('employee')->with('success','Updated Success');
        }catch(\Exception $e){
            return back()->with('error', $e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $employee = Employee::findorFail($id);
            $employee->delete();
            return redirect('employee')->with('success','Deleted Success');
        }catch(\Exception $e){
            return redirect('employee')->with('error', $e);
        }
    }
}
