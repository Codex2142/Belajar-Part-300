<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;

class reportController extends Controller
{
    public function show(){
        $contract = Employee::where('status', 'cont')->count();
        $employee = Employee::where('status', 'emp')->count();
        $not_active = Employee::where('status', 'not_act')->count();
        $total = Employee::count();
        return view('report.summary', compact('contract', 'employee', 'not_active', 'total'));
    }

    public function status(){
        $show = Department::all();
        $employee = Employee::all();
        return view('report.status',compact('show', 'employee'));
    }

    
}
