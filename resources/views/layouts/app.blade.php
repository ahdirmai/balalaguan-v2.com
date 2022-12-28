<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('includes.admin.head')    
    <title>Balalaguan - Bumantara Event Orginizer</title>
</head>
<body>
    <div class="bg-light min-vh-100 d-flex flex-row align-items-center">
        <div class="container">
            @yield('content')
        </div>
    </div>
    {{-- scripts --}}
    <!-- CoreUI and necessary plugins-->
    @vite(["resources/js/core-ui/vendors/coreui.bundle.min.js", "resources/js/core-ui/vendors/simplebar.min.js"])
</body>
</html>
