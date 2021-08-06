@extends('layouts.master')

@section('title')
    Companies
@endsection

@section('content')
    <div class="container mt-5 row">
        <div class="mb-4 col-6">
            <a class="btn btn-success" href="/companies/create">Add Company</a>
        </div>
        <div class="mb-4 col-6">
            <a class="btn btn-success" href="/employees">Go to Employee Details</a>
        </div>
        <h2 class="mb-4">Company Details</h2>
        <table class="table table-bordered yajra-datatable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Logo</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($companies as $company)
                    <tr>
                        <td>{{$company->id}}</td>
                        <td>{{$company->logo}}</td>
                        <td>{{$company->name}}</td>
                        <td>{{$company->email}}</td>
                        <td>
                            <a class="btn btn-success" href="/companies/{{$company->id}}">view</a>
                            <a class="btn btn-warning" href="/companies/{{$company->id}}/edit">Edit</a>
                            <form action="{{ url('companies/'.$company->id) }}" method="POST">
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