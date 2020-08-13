<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Employee;
use App\Http\Requests\StoreEmployeeRequest;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::select('id','first_name','last_name','company_id','email','phone','created_at')
                                ->orderBy('created_at','desc')
                                ->paginate(10);
        return view('employee.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::select('id','name')
                                ->orderBy('name','asc')
                                ->get();
        return view('employee.create',compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeRequest $request)
    {
        $data = $request->all();
        
        $employee = Employee::create($data);

        $signal = $employee ? "success" : "error";
        $message = $employee ? "Employee added successfully." : "Fail to add employee.";
        $request->session()->flash('notify', ["signal" => $signal, "message" => $message]);

        return redirect(route('employees.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $companies = Company::select('id','name')
                                ->orderBy('name','asc')
                                ->get();
        return view('employee.edit',compact('companies','employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreEmployeeRequest $request, Employee $employee)
    {
        $data = $request->all();
        
        $employee = $employee->update($data);

        $signal = $employee ? "success" : "error";
        $message = $employee ? "Employee updated successfully." : "Fail to update employee.";
        $request->session()->flash('notify', ["signal" => $signal, "message" => $message]);

        return redirect(route('employees.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $status = $employee->delete();
        $response = $status ? true : false;
        return $response;
    }
}
