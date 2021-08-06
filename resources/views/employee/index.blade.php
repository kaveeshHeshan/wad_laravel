@extends('layouts.master')

@section('title')
    Companies
@endsection

@section('content')
    <div class="container mt-5 row">
        <div class="mb-4 col-6">
            <a class="btn btn-success" href="/employees/create">Add an Employee</a>
        </div>
        <div class="mb-4 col-6">
            <a class="btn btn-success" href="/companies">Go to Company Details</a>
        </div>
        <h2 class="mb-4">Employee Details</h2>
        <table class="table table-bordered yajra-datatable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Profile Picture</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                    <tr>
                        <td>{{$employee->id}}</td>
                        <td>{{$employee->profile_photo}}</td>
                        <td>{{$employee->firstName}} {{$employee->lastName}}</td>
                        <td>{{$employee->email}}</td>
                        <td>{{$employee->phone}}</td>
                        <td>
                            <a class="btn btn-success" href="/employees/{{$employee->id}}">view</a>
                            <a class="btn btn-warning" href="/employees/{{$employee->id}}/edit">Edit</a>
                            <form action="{{ url('employees/'.$employee->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
       
@endsection

@section('scripts')

@endsection