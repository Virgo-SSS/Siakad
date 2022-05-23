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


<h3 class="text-center">Mahasiswa</h3>

<div class="container">
    <table id="admintable" class="table table-striped display" style="width:100%">
        <thead>
            <tr>
             
                <th class="col-md-1">Name</th>
                <th class="col-md-2">Email</th>
                <th class="col-md-1">No WA</th>
               
                <th class="col-md-2">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rgs2 as $rg)
            <tr>
                <td>{{ $rg->name }}</td>
                <td>{{ $rg->email }}</td>
                <td>{{ $rg->no_wa}}</td>
                <td>
                    <a href="{{ route('editpelajar', $rg->id) }}" class="btn btn-success">Edit</a> | <a href="{{ route('deletepelajar', $rg->id) }}" class="btn btn-danger">Delete</a>           
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
