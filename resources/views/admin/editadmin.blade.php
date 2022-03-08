@extends('layouts.sidebar')

@section('content')
<h3>Admin</h3>
<div class="card" style="background-color: #E9ECEF">
    <div class="card-body">
        <form action="{{ route('updateadmin', $admins->id) }}" method="post">
            @method('PUT')
            @csrf
            <div class="row">

                <div class="col-6">
                    <label for="exampleInputName1" class="form-label">Name</label>
                    <input type="text" name="name" value="{{ $admins->name }}" class="form-control" id="exampleInputName1" aria-describedby="emailHelp" required>
                </div>
                <div class="col-6">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="text" name="email" value="{{ $admins->email }}" class="form-control" id="exampleInputName1" aria-describedby="emailHelp" required> 
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3" style="float: right">Submit</button>
        </form>
    </div>
</div>



@endsection