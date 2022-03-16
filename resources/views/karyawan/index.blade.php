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


<h3 class="text-center">Employee</h3>

<a href="{{ route('createkaryawan') }}" style="float: right;">
    <button type="button" class="btn btn-primary">
        <i class="fa-solid fa-circle-plus"></i>
        Add New Employee
    </button>
</a>
<div class="container">
    <table id="admintable" class="table table-striped display" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>No HP</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <?php $i=1; ?>
        <tbody>
            @foreach ($employees as $emp)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $emp->name }}</td>
                <td>{{ $emp->email }}</td>
                <td>{{ $emp->nohp }}</td>
                @if($emp->image)
                    <td><img src="{{ asset('storage/'.$emp->image) }}" alt="" width="50px" height="50px"></td>
                @else
                    <td><img src="{{ asset('img/profile.jpg') }}" alt="" width="50px" height="50px"></td>
                @endif  
                <td>
                    <a href="{{ route('editkaryawan', $emp->id) }}" class="btn btn-success">Edit</a> | <a href="{{ route('deletekaryawan', $emp->id) }}" class="btn btn-danger">Delete</a>           
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
