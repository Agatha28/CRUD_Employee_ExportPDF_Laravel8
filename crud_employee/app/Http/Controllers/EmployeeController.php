<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\EmployeeExport;



class EmployeeController extends Controller
{
    public function index(Request $request){

        if($request->has('search')){
             $data = Employee::where('nama','LIKE','%' .$request->search.'%')->paginate(5);
        }else{
             $data = Employee::paginate(5);
        }
        return view('dataemployee', compact('data'));
    }

    public function addemployee(){
        return view('addemployee');
    }

    public function insertdata(Request $request){
        $data = Employee::create($request->all());
        if($request->hasFile('foto')){
            $request->file('foto')->move('fotopegawai/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }

        Employee::create($request->all());
        return redirect()->route('employee')->with('success', 'Adding Data Success');
    }

    public function showdata($id){
        $data = Employee::find($id);
        //dd($data);

        return view('showdata', compact('data'));
    }

    public function updatedata(Request $request, $id){
        $data = Employee::find($id);
        $data->update($request->all());

        return redirect()->route('employee')->with('success', 'Update Data Success');
    }

    public function delete($id){
        $data = Employee::find($id);
        $data->delete();

        return redirect()->route('employee')->with('success', 'Delete Data Success');
    }

    public function exportpdf(){
        $data = Employee::all();

        view()->share('data', $data);
        $pdf = PDF::loadview('dataemployee-pdf');
        return $pdf->download('data.pdf');
    }

    public function exportexcel(){
        return Excel::download(new EmployeeExport, 'datapegawai.xlsx');
    }
}

