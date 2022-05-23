@extends('layouts.sidebar')

@section('content')

@if(Session::has('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>{{ Session::get('error') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif


<h3 class="text-center"> Calon Mahasiswa</h3>

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
            @foreach ($rgs as $r)
            <tr>
                <td>{{ $r->name }}</td>
                <td>{{ $r->email }}</td>
                <td>{{ $r->no_wa}}</td>
                <td>
                    <a href="{{ route('showdatacalon', $r->id) }}" class="btn btn-success">Show</a> | <a href="{{ route('deletepelajar', $r->id) }}" class="btn btn-danger">Delete</a>           
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
