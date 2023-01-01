{{-- csrf token --}}
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

{{-- Manifest --}}
<meta name="author" content="Bumantara">
<meta name="keyword" content="Event,Organizer,Concert,Ticketing">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="theme-color" content="#ffffff">

{{-- Meta Tag --}}
@include('includes.base.meta-tag')

{{-- icons --}}
<link rel="icon" type="image/png" sizes="192x192" href="{{ asset('/icons/icon-192x192.png') }}">
<link rel="icon" type="image/png" sizes="152x152" href="{{ asset('/icons/icon-152x152.png') }}">
<link rel="icon" type="image/png" sizes="144x144" href="{{ asset('/icons/icon-144x144.png') }}">
<link rel="icon" type="image/png" sizes="128x128" href="{{ asset('/icons/icon-128x128.png') }}">
<link rel="icon" type="image/png" sizes="96x96" href="{{ asset('/icons/icon-96x96.png') }}">
<link rel="icon" type="image/png" sizes="72x72" href="{{ asset('/icons/icon-72x72.png') }}">


{{-- stylesheets --}}
@vite([
    'resources/css/brand/colors.css',
    'resources/css/app.css'
])

{{-- Font awesome 6 --}}
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css" integrity="sha384-/frq1SRXYH/bSyou/HUp/hib7RVN1TawQYja658FEOodR/FQBKVqT9Ol+Oz3Olq5" crossorigin="anonymous"/>

{{-- Poppins --}}
<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>
    * {
        font-family: 'Poppins', sans-serif;
    }
</style>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">