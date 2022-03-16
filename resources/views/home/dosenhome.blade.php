<?php 
use Carbon\Carbon;
?>
@if(auth('dosen')->user())

<div class="col-8">
    <div class="card">
        <p class="card-header">JADWAL KULIAH HARI INI ({{  Carbon::now()->format('l, d M y') }})</p>
        <p class="blockquote-footer">17:30 - 12-30</p> 
        <div class="row" >
            <h5 class="card-title">Rekaya Desain</h5>
            <p class="card-text">Sistem Informasi(2GKPD)</p>
            <P class="blockquote-footer" >Gedung B 314</P>
        </div>
        <p class="blockquote-footer">17:30 - 12-30</p> 
        <div class="row" >
            <h5 class="card-title">Rekaya Desain</h5>
            <p class="card-text">Sistem Informasi(2GKPD)</p>
            <P class="blockquote-footer" >Gedung B 314</P>
        </div>
        <p class="blockquote-footer">17:30 - 12-30</p> 
        <div class="row" >
            <h5 class="card-title">Rekaya Desain</h5>
            <p class="card-text">Sistem Informasi(2GKPD)</p>
            <P class="blockquote-footer" >Gedung B 314</P>
        </div>
        <p class="blockquote-footer">17:30 - 12-30</p> 
        <div class="row" >
            <h5 class="card-title">Rekaya Desain</h5>
            <p class="card-text">Sistem Informasi(2GKPD)</p>
            <P class="blockquote-footer" >Gedung B 314</P>
        </div>
        </div>
</div>

<div class="col-4">
    <div class="card">
        <div class="card-header row">
            <div class="col-10">

                Notifikasi
            </div>
            <div class="col-2">
                <span class="notif">
                    <i class="fa fa-bell"></i>
                    <a href="">View All</a>
                </span>
            </div>
        </div>
        <div class="card-body">
            car
        </div>
    </div>
</div>

@endif