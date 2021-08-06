@extends('layouts.master')

@section('title')
    Edit the Employee
@endsection

@section('content')
<div class="">
    <div class="text-center mb-4">
        <h1>Edit the Empolyee</h1>
    </div>
    <div class="">
        <form method="POST" action="{{ url('employees/'.$employee->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="row mb-4">
                <div class="col">
                    <!-- Text input -->
                    <div class="form-outline">
                        <label class="form-label" for="form6Example3">First Name</label>
                        <input name="edit_first_name" type="text" id="form6Example3" class="form-control" value="{{$employee->firstName}}" />
                    </div>
                </div>
                <div class="col">
                    <!-- Text input -->
                    <div class="form-outline">
                        <label class="form-label" for="form6Example5">Last Name</label>
                        <input name="edit_last_name" type="text" id="form6Example5" class="form-control" value="{{$employee->lastName}}" />
                    </div>
                </div>
            </div>
          
            <div class="row mb-4">
                <div class="col">
                    <!-- Text input -->
                    <div class="form-outline">
                        <label class="form-label" for="form6Example3">Company</label>
                        <input name="edit_emp_company" type="text" id="form6Example3" class="form-control" value="{{$employee->company}}" />
                    </div>
                </div>
                <div class="col">
                    <!-- Email input -->
                    <div class="form-outline">
                        <label class="form-label" for="form6Example5">Email</label>
                        <input name="edit_emp_email" type="email" id="form6Example5" class="form-control"  value="{{$employee->email}}"/>
                    </div>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col">
                    <!-- Number input -->
                    <div class="form-outline">
                        <label class="form-label" for="form6Example6">Telephone</label>
                        <input name="edit_emp_phone" type="number" type="number" id="form6Example6" class="form-control" value="{{$employee->phone}}" />
                    </div>
                </div>
                <div class="col">
                    <!-- Message input -->
                    <div class="form-outline">
                        <label class="form-label" for="form6Example7">Profile Picture</label>
                        <input name="edit_emp_pic" type="file" class="form-control" id="" name=""/>
                    </div>
                </div>
            </div>
            @method('PUT')
            <div class="row text-center">
                <!-- Submit button -->
                <div class="col-6">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                <div class="col-6">
                    <button type="reset" class="btn btn-danger">Cancel</button>
                </div>
            </div>
          </form>
    </div>
</div>
@endsection