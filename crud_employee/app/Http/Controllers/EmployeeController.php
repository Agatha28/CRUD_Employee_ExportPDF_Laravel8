<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(){
        $data = Employee::all();
        return view('dataemployee', compact('data'));
    }

    public function addemployee(){
        return view('addemployee');
    }

    public function insertdata(Request $request){
        Employee::create($request->all());
        return redirect()->route('employee')->with('success', 'Adding Data Success');
    }

    public function showdata($id){
        $data = Employee::find($id);
        dd($data);
    }
}
