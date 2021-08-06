@extends('layouts.master')

@section('title')
{{$company->name}}
@endsection

@section('content')
    <div class="text-center">
        <h1>{{$company->name}}</h1>
    </div>
    <div class="text-center">
        <p>{{$company->email}}</p>
        <p>{{$company->telephone}}</p>
    </div>
    <div class="text-center">
        <a href="/companies" class="btn btn-success">Back</a>
    </div>
@endsection