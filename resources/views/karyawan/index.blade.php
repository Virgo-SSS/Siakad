@extends('layouts.sidebar')

@section('content')

@if (Session::has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ Session::get('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<h3 class="text-center">Employee</h3>

<a href="{{ route('createadmin') }}" style="float: right;">
    <button type="button" class="btn btn-primary">
        <i class="fa-solid fa-circle-plus"></i>
        Add New Employee
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
            {{-- @foreach ($admins as $admin) --}}
            <tr>
                <td>aaa</td>
                <td>aa</td>
                <td>
                    <a href="#" class="btn btn-primary">Edit</a> | <a href="#" class="btn btn-primary">Delete</a>           
                </td>
            </tr>
            {{-- @endforeach --}}
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
