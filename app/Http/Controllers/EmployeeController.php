<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use App\Models\EmployeeBankDetails;
use App\Models\Official;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Http;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        $employees=Employee::get();

        return view('employee.index',compact('employees'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $departments=Department::get();
//        $designations=Designation::get();


//        return $designations;
        return  view('employee.create');
//        return  view('employee.create',compact('departments','designations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        return $request->id;
        if($request->id){
            $emp=Employee::findOrFail($request->id);
        }
        else{
            $emp=new Employee();
        }
        $emp->emp_id=$request->emp_id;
        $emp->name=$request->name;
        $emp->dob=$request->dob;
        $emp->gender=$request->gender;
        $emp->fatherName=$request->fatherName;
        $emp->motherName=$request->motherName;
        $emp->email=$request->email;
        $emp->phoneNumber=$request->phoneNumber;
        $emp->address=$request->address;
        $emp->division=$request->division;
        $emp->zipCode=$request->zipCode;
        $emp->save();


        if($request->id){
            $official=Official::findOrFail($request->id);

        }
        else{
            $official=new Official();
            $official->employee_id=$emp->id;
        }
        $official->emp_id=$request->emp_id;
        $official->department=$request->department;
        $official->designation=$request->designation;
        $official->join_dt=$request->join_dt;
        $official->save();


        if($request->id){
            $bank=EmployeeBankDetails::findOrFail($request->id);
        }
        else{
            $bank=new EmployeeBankDetails();
            $bank->employee_id=$emp->id;
        }

        $bank->ac_holder_name=$request->ac_holder_name;
        $bank->ac_number=$request->ac_number;
        $bank->bank_name=$request->bank_name;
        $bank->branch_name=$request->branch_name;
        $bank->save();
//        return $request;
        if($request->id){
            Session::flash('message', 'Employee updated successfully!');
        }
        else{
            Session::flash('message', 'Employee created successfully!');
        }

        return redirect()->route('employees.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {


        return $employee;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $departments=Department::get();
        $designations=Designation::get();
        $official=Official::where('employee_id',$employee->id)->first();
        $bank= EmployeeBankDetails::where('employee_id',$employee->id)->first();
//        return $bank;

        return  view('employee.create',compact('employee','official','bank','departments','designations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
//        return "asf";
        $official=Official::findOrFail($employee->id);
        $official->delete();
        $bank=EmployeeBankDetails::findOrFail($employee->id);
        $bank->delete();
        $employee->delete();

        Session::flash('message', 'Employee Deleted successfully!');
        return redirect()->route('employees.index');

    }
}
