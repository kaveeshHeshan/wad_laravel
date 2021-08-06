@extends('layouts.master')

@section('title')
    Add a Company
@endsection

@section('content')
    <div class="">
        <div class="text-center mb-4">
            <h1>Add a Company</h1>
        </div>
        <div class="">
            <form method="POST" action="{{ url('companies') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row mb-4">
                    <div class="col">
                        <!-- Text input -->
                        <div class="form-outline">
                            <label class="form-label" for="form6Example3">Company name</label>
                            <input type="text" name="com_name" id="form6Example3" class="form-control" />
                        </div>
                    </div>
                    <div class="col">
                        <!-- Email input -->
                        <div class="form-outline">
                            <label class="form-label" for="form6Example5">Email</label>
                            <input type="email" name="com_email" id="form6Example5" class="form-control" />
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col">
                        <!-- Number input -->
                        <div class="form-outline">
                            <label class="form-label" for="form6Example6">Telephone</label>
                            <input type="number" name="com_phone" id="form6Example6" class="form-control" />
                        </div>
                    </div>
                    <div class="col">
                        <!-- Message input -->
                        <div class="form-outline">
                            <label class="form-label" for="form6Example7">Company Logo</label>
                            <input type="file" name="com_logo" class="form-control" id="" name=""/>
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