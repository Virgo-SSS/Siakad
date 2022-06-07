@extends('pmb.layouts.main')


@section('content')

<div class="container">
    <ul class="ulNum">
        <li class="active liNum" id="pg1"><span class="marker-number">1</span> <span class="marker-text">Biodata</span></li>
        <li class="liNum" id="pg2"><span class="marker-number">2</span> <span class="marker-text">{{ __('lang.contact') }}</span></li>
        <li class="liNum" id="pg3"><span class="marker-number">3</span> <span class="marker-text">{{ __('lang.parents') }}</span></li>
        <li class="liNum" id="pg4"><span class="marker-number">4</span> <span class="marker-text">{{ __('lang.faculty') }}</span></li>
        <li class="liNum" id="pg5"><span class="marker-number">5</span> <span class="marker-text">{{ __('lang.achivement') }}</span></li>
    </ul> 
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                {{-- <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-exclamation-triangle"></i>
                        Akun Anda Belum Diaktifkan
                    </h3>
                </div> --}}
                <div class="panel-body">
                    <p>
                        Hallo {{ Auth::user()->name }}, {{ __('lang.hallo_pmb_student') }}
                        <br>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <h3 class="mt-3">{{ __('lang.pls_fill_regis_data_form') }}</h3>
    <form action="{{ route('pmb.store', $batch->id) }}" method="post" id="pmbForm" enctype="multipart/form-data">
        @csrf
       
        @include('pmb.menu.batch.biodata')
        @include('pmb.menu.batch.contact')
        @include('pmb.menu.batch.faculty')
        @include('pmb.menu.batch.parents')
        @include('pmb.menu.batch.achivement')

        {{-- button submit nya ada di achivement --}}
    </form>
</div>
@endsection