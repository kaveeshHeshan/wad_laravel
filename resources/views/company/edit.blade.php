@extends('layouts.master')

@section('title')
Edit the Company
@endsection

@section('content')
    <div class="">
        <div class="text-center mb-4">
            <h1>Edit the Company</h1>
        </div>
        <div class="">
            <form method="POST" action="{{ url('companies/'.$company->id) }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row mb-4">
                    <div class="col">
                        <!-- Text input -->
                        <div class="form-outline">
                            <label class="form-label" for="form6Example3">Company name</label>
                            <input name="edit_com_name" type="text" id="form6Example3" class="form-control" value="{{$company->name}}"/>
                        </div>
                    </div>
                    <div class="col">
                        <!-- Email input -->
                        <div class="form-outline">
                            <label class="form-label" for="form6Example5">Email</label>
                            <input name="edit_com_email" type="email" id="form6Example5" class="form-control" value="{{$company->email}}" />
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col">
                        <!-- Number input -->
                        <div class="form-outline">
                            <label class="form-label" for="form6Example6">Telephone</label>
                            <input name="edit_com_phone" type="number" id="form6Example6" class="form-control" value="{{$company->telephone}}"/>
                        </div>
                    </div>
                    <div class="col">
                        <!-- Message input -->
                        <div class="form-outline">
                            <label class="form-label" for="form6Example7">Company Logo</label>
                            <input name="edit_com_logo" type="file" class="form-control" id="" name="" value="{{$company->logo}}"/>
                        </div>
                    </div>
                </div>
                @method('PUT')
                <div class="row text-center">
                    <!-- Submit button -->
                    <div class="col-6">
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                    <div class="col-6">
                        <button type="reset" class="btn btn-danger">Cancel</button>
                    </div>
                </div>
              </form>
        </div>
    </div>
@endsection