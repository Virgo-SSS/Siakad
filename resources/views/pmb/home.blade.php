@extends('pmb.layouts.main')


@section('content')
    @if(auth()->user()->type == 'PMB' && auth()->user()->isActive == 0)
        <h2 style="text-align: center;margin-bottom:3px">HALLO, SELAMAT DATANG {{ strtoupper(Auth::user()->name) }}</h2>
        <div class="row" style="justify-content:center;gap:50px;margin-top:30px">
            
            @if(isset($batch))
                @foreach($batch as $b)
                    
                    <div class="column" style="text-align: center">
                        <div class="card" style="width: 19rem; ">
                            <img class="card-img-top" src="img/spiderman.jpg"  alt="Card image cap" style="height: 146px">
                            <div class="card-body">
                                <h5 class="card-title">{{ $b->name }}</h5>
                                <p class="card-text">Price = {{ $b->price }}</p>
                                <p class="card-text">start = {{ $b->start_date }}</p>
                                <p class="card-text">end = {{ $b->end_date }}</p>
                            
                                @if($b->isActive == 0)
                                    <button disabled style="border-radius:20px;color:white;background-color:rgb(77, 77, 82);border-style:none;width:250px">CLOSED</button>
                                @else
                                    <a href="{{ route('batchPMB', $b->code) }}">
                                        <button style="border-radius:20px;color:white;background-color:blue;border-style:none;width:250px">OPEN</button>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>

                @endforeach
            @endif
        </div>
    @else
        Anda telah Melakukan Registrasi, silahkan login menggunakan akun dari kampus yang di 
        kirim melalui email

        Ada Kendala ? Hubungi Kami
    @endif

@endsection