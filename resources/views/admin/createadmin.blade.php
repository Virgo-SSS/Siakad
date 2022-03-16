@extends('layouts.sidebar')

@section('content')
<h3>Admin</h3>
<div class="card" style="background-color: #E9ECEF">
    <div class="card-body">
        <form action="{{ route('storeadmin') }}" method="post">
            @csrf
            <div class="row">
            
                <div class="col-6">
                    <label for="inp" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="inp" aria-describedby="emailHelp" required>
                    
                </div>
                <div class="col-6">
                    <label for="inp" class="form-label">Email</label>
                    <input type="text" name="email" class="form-control" id="inp" aria-describedby="emailHelp" required> 
                    
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-6">
                    <label for="inp" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="inp" required>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-6">
                    
                    <input type="number" value="1" hidden name="role" class="form-control" id="inp" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3" style="float: right">Submit</button>
        </form>
    </div>
</div>



@endsection