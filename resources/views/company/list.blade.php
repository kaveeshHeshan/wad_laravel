@extends('layouts.master')

@section('title')
    Companies
@endsection

@section('content')
    <div class="container mt-5">
        <div class="mb-4">
            <a class="btn btn-success" href="/companies/create">Add Company</a>
        </div>
        <h2 class="mb-4">Company Details</h2>
        <table class="table table-bordered yajra-datatable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Loo</th>
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
                            <a class="btn btn-success" href="">view</a>
                            <a class="btn btn-warning" href="/employees/{{$company->id}}/edit">Edit</a>
                            <a class="btn btn-danger" href="">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
       
@endsection

@section('scripts')
<script type="text/javascript">
    // $(function () {
      
    //   var table = $('.yajra-datatable').DataTable({
    //       processing: false,
    //       serverSide: true,
    //       ajax: "{{ route('companies.index') }}",
    //       columns: [
    //           {data: 'DT_RowIndex', name: 'DT_RowIndex'},
    //           {data: 'name', name: 'name'},
    //           {data: 'email', name: 'email'},
    //           {
    //               data: 'action', 
    //               name: 'action', 
    //               orderable: true, 
    //               searchable: true
    //           },
    //       ]
    //   });
      
    // });
  </script>
@endsection