@extends('layouts.master')

@section('title')
    Add an Employee
@endsection

@section('content')
<div class="">
    <div class="text-center mb-4">
        <h1>Add an Empolyee</h1>
    </div>
    <div class="">
        <form method="POST" action="{{ url('employees') }}">
            {{ csrf_field() }}
            <div class="row mb-4">
                <div class="col">
                    <!-- Text input -->
                    <div class="form-outline">
                        <label class="form-label" for="form6Example3">First Name</label>
                        <input type="text" name="first_name" id="form6Example3" class="form-control" />
                    </div>
                </div>
                <div class="col">
                    <!-- Text input -->
                    <div class="form-outline">
                        <label class="form-label" for="form6Example5">Last Name</label>
                        <input type="text" name="last_name" id="form6Example5" class="form-control" />
                    </div>
                </div>
            </div>
          
            <div class="row mb-4">
                <div class="col">
                    <!-- Text input -->
                    <div class="form-outline">
                        <label class="form-label" for="form6Example3">Company</label>
                        <input type="text" name="emp_company" id="form6Example3" class="form-control" />
                    </div>
                </div>
                <div class="col">
                    <!-- Email input -->
                    <div class="form-outline">
                        <label class="form-label" for="form6Example5">Email</label>
                        <input type="email" name="emp_email" id="form6Example5" class="form-control" />
                    </div>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col">
                    <!-- Number input -->
                    <div class="form-outline">
                        <label class="form-label" for="form6Example6">Telephone</label>
                        <input type="number" name="emp_phone" id="form6Example6" class="form-control" />
                    </div>
                </div>
                <div class="col">
                    <!-- Message input -->
                    <div class="form-outline">
                        <label class="form-label" for="form6Example7">Profile Picture</label>
                        <input type="file" name="emp_pic" class="form-control" id="" name=""/>
                    </div>
                </div>
            </div>

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