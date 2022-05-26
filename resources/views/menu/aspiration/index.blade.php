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


<h3 class="text-center">Aspiration</h3>

<div class="container mt-4">
    
    <form action="{{ route('filter') }}" method="GET">
        @csrf
        <div class="form-group">
        <div class="row">
            <div class="col-md-2" >
                <select class="form-control" id="inp" name="category">
                    <option selected disabled>Filter</option>
                    <option value="Complaint">Complaint</option>
                    <option value="Suggestion">Suggestion</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div>
                <button type="submit" class="btn btn-outline-primary">Filter</button>
            </div>
        </div>
        </div>
    </form>


    
    <table id="admintable" class="table table-striped display" style="width:100%">
        <thead>
            <tr>
                <th>Category</th>
                <th>Tittle</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cp as $c)
            <tr>
                <td>{{ $c->category }}</td>
                <td>{{ $c->Title }}</td>
                <td>{{ $c->description }}</td>
                <td>
                    <a href="{{ route('deletedosen', $c->id) }}" class="btn btn-danger">Delete</a>           
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
