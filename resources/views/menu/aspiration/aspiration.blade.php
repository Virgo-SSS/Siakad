@extends('layouts.sidebar')

@section('content')
<h3>Aspiration</h3>
@if (Session::has('success'))
<div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
    <strong>{{ Session::get('success') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<div class="card" style="background-color: #E9ECEF">
    <div class="card-body">
        <form action="{{ route('submitaspiration') }}" method="post">
            @csrf
            <label for="inp">Category</label>
            <select name="category" id="inp" class="form-control">
                <option value="Complaint">Complaint</option>
                <option value="Suggestion">Suggestion</option>
                <option value="Other">Other</option>
            </select>

            <label for="inp" class="mt-3">Title</label>
            <input type="text" name="title" id="inp" class="form-control">

            <label for="inp" class="mt-3">Description</label>
            <textarea name="description" id="inp" cols="30" rows="10" class="form-control"></textarea>
            
            
            <button type="submit" class="btn btn-primary mt-3" style="float: right">Submit</button>
        </form>
    </div>
</div>


@endsection