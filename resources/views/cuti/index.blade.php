@extends('layouts.sidebar')

@section('content')

@if(Session::has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ Session::get('success') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif


<h3 class="text-center">Daftar Cuti</h3>
<div class="container">
    <a href="{{ route('formcuti') }}">Add New Form</a>
    <table id="admintable" class="table table-striped display" style="width:100%">
        <thead>
            <tr>
             
                <th class="col-md-1">Tanggal Mulai</th>
                <th class="col-md-1">Tanggal Selesai</th>
                <th class="col-md-2">Keterangan</th>
                <th class="col-md-1">Status</th>
                @if(Auth('web')->user())
                <th class="col-md-1">Kategori</th>
                <th class="col-md-1">Nama</th>
                @endif
                <th class="col-md-2">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cuti as $ct)
            <tr>
                <td>{{ $ct->tanggal_mulai }}</td>
                <td>{{ $ct->tanggal_selesai }}</td>
                <td>{{ $ct->Keterangan}}</td>
                <td>{{ $ct->status}}</td>
                @if(Auth('web')->user())
                <td>{{ $ct->kategori }}</td>
                <td>{{ $ct->Rdo->}}</td>
                @endif
                <td>
                    
                    <a href="#" class="btn btn-success">Show</a> | <a href="#" class="btn btn-danger">Delete</a>           
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
