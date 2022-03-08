@extends('layouts.sidebar')

@section('content')

@if (Session::has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ Session::get('success') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if (Session::has('erro'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ Session::get('erro') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<h3 class="text-center">Admin</h3>

<a href="{{ route('createadmin') }}" style="float: right;">
    <button type="button" class="btn btn-primary">
        <i class="fa-solid fa-circle-plus"></i>
        Add New Admin
    </button>
</a>
<div class="container">
    <table id="admintable" class="table table-striped display" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th> 
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($admins as $admin)
            <tr>
                <td>{{ $admin->name }}</td>
                <td>{{ $admin->email }}</td>
                <td>
                    <a href="{{ route('editadmin', $admin->id) }}" class="btn btn-success">Edit</a> | <a href="{{ route('deleteadmin', $admin->id) }}" class="btn btn-danger">Delete</a>           
                </td>
            </tr>
            @endforeach
        </tbody>
    
    </table>
    
</div>

<script>
$(document).ready( function () {
    $('#admintable').DataTable({
        searching: false,
        responsive: true,
    });
    
} );
</script>
@endsection
