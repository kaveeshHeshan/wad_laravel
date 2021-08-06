<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = DB::table('employees')->paginate(10);
        return view('employee.index')->with('employees', $employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'emp_company' => 'required',
            'emp_email' => 'required|email',
            'emp_phone' => 'required|numeric',
            'emp_pic' => 'required'
        ]);

        // handle image upload
        if ($request->hasFile('emp_pic')) {
            // Get filename with extention
            $fileNameWithExtension = $request->file('emp_pic')->getClientOriginalName();
            // Get just the file name
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            // Get just the file extension
            $extension = $request->file('emp_pic')->getClientOriginalExtension();
            // File name to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('emp_pic')->storeAs('public/Store logos and company profile images', $fileNameToStore);
        } else {
            // defaultImage
            $fileNameToStore = 'noImage.jpg';
        }

        $employee = new Employee;
        $employee->firstName = $request->input('first_name');
        $employee->lastName = $request->input('last_name');
        $employee->company = $request->input('emp_company');
        $employee->email = $request->input('emp_email');
        $employee->phone = $request->input('emp_phone');
        $employee->profile_photo = $fileNameToStore;
        $employee->save();

        return redirect('/employees')->with('success', 'Employee details added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::find($id);
        return view('employee.show')->with('employee', $employee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        return view('employee.edit')->with('employee', $employee);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'edit_first_name' => 'string',
            'edit_last_name' => 'string',
            'edit_emp_company' => '',
            'edit_emp_email' => 'email',
            'edit_emp_phone' => 'numeric',
            'edit_emp_pic' => ''
        ]);

        $employee = Employee::find($id);

        // handle image upload
        if ($request->hasFile('edit_emp_pic')) {
            // Get filename with extention
            $fileNameWithExtension = $request->file('edit_emp_pic')->getClientOriginalName();
            // Get just the file name
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            // Get just the file extension
            $extension = $request->file('edit_emp_pic')->getClientOriginalExtension();
            // File name to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('edit_emp_pic')->storeAs('public/Store logos and company profile images', $fileNameToStore);
        }else{
            $fileNameToStore = $employee->profile_photo;
        }


        $employee->firstName = $request->input('edit_first_name');
        $employee->lastName = $request->input('edit_last_name');
        $employee->company = $request->input('edit_emp_company');
        $employee->email = $request->input('edit_emp_email');
        $employee->phone = $request->input('edit_emp_phone');
        $employee->profile_photo = $fileNameToStore;
        $employee->save();

        return redirect('/employees')->with('success', 'Employee details added successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();

        return redirect('/employees')->with('success', 'Employee details deleted successfully.');
    }
}
