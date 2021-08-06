@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>{{ __('Dashboard') }}</h2></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">
                    <h2>Other Links</h2>
                </div>

                <div class="card-body">
                   <div class="row text-center">
                    <div class="col-6">
                        <a class="btn btn-primary" href="/companies">Company</a>
                    </div>
                    <div class="col-6">
                        <a class="btn btn-primary" href="/employees">Employee</a>
                    </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
