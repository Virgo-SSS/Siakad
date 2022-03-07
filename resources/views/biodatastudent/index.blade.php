@extends('layouts.sidebar')

@section('contentform')
<div class="row">
    <div class="col-md-4 mt-3">
        <div class="card shadow">
            <div class="card-header border-0 text-center mt-3">
                <img src="img/spiderman.jpg" alt="" width="150px" rounded style="border-radius:100px">
                <h4 class="mt-2">Virgo Stevanus</h4>
                <p>2121015</p>
            </div>
            <div class="card-body text-center">
              <p>SISTEM INFORMASI</p>
            </div>
        </div>
    </div>

    <div class="col-md-8 mt-3">
        <div class="card shadow">
            <div class="card-body">
                <h5 class="card-title text-center">Detail</h5>
                <p class="card-text">
                    <div class="row pl-5">
                        <div class="col-md-5">
                            <p>Nama :</p>
                        </div>
                        <div class="col-md-7" style="text-align: center">
                            <p>Virgo Stevanus</p>
                        </div>
                    </div>
                    <div class="row pl-5">
                        <p>Email :</p>
                    </div>
                </p>
            </div>
        </div>
    </div>
    
</div>


<a href="{{ route('editbiodatastudent') }}">
EDIT
</a>
@endsection