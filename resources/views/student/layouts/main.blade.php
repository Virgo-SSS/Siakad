<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home | Siakad</title>

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ updateVersion('css/sidebar.css') }}">
    <link rel="stylesheet" href="{{ updateVersion('css/style.css') }}">
    <link rel="stylesheet" href="{{ updateVersion('css/cardhome.css') }}">
    <link rel="stylesheet" href="{{ updateVersion('css/global/global_style.css') }}">

    {{-- DATA TABLE --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"  >
    
    {{-- Font awesome --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet"/>
</head>
<body>
<div class="wrapper">
    
        @include('student.layouts.sidebar') 
   

    <div class="content">
        @include('student.layouts.navbar')

        {{-- CONTENT --}}
        <div class="content">
            @yield('content')
        
        </div>
        {{-- END CONTENT --}}
    </div>
</div>

{{-- modal --}}
@include('modal_global')

{{-- JS --}}
@include('student.layouts.js_function')
</body>

</html>