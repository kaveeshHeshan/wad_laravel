@extends('layouts.master')

@section('title')
{{$employee->firstName}} {{$employee->lastName}}
@endsection

@section('content')
    <div class="text-center">
        <h1>{{$employee->firstName}} {{$employee->lastName}}</h1>
    </div>
    <div class="text-center">
        <p>{{$employee->email}}</p>
        <p>{{$employee->phone}}</p>
        <p>{{$employee->company}}</p>
    </div>
    <div class="text-center">
        <a href="/employees" class="btn btn-success">Back</a>
    </div>
@endsection