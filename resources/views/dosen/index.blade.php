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

<h3 class="text-center">Teacher</h3>

<a href="{{ route('createdosen') }}" style="float: right;">
    <button type="button" class="btn btn-primary">
        <i class="fa-solid fa-circle-plus"></i>
        Add New Teacher
    </button>
</a>
<div class="container">
    <table id="admintable" class="table table-striped display" style="width:100%">
        <thead>
            <tr>
                <th>NIDN</th>
                <th>Name</th>
                <th>Email</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>No HP</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dosens as $dosen)
            <tr>
                <td>{{ $dosen->nidn }}</td>
                <td>{{ $dosen->nama }}</td>
                <td>{{ $dosen->email }}</td>
                <td>{{ $dosen->jeniskelamin }}</td>
                <td>{{ $dosen->alamat }}</td>
                <td>{{ $dosen->no_hp }}</td>
                @if($dosen->foto)
                    <td><img src="{{ asset('storage/'.$dosen->foto) }}" width="50px" height="50px"></td>
                @else 
                    <td><img src="{{ asset('img/profile.jpg') }}" width="50px" height="50px"></td>
                
                @endif
                <td>
                    <a href="{{ route('editdosen', $dosen->nidn) }}" class="btn btn-success">Edit</a> | <a href="{{ route('deletedosen', $dosen->nidn) }}" class="btn btn-danger">Delete</a>           
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
