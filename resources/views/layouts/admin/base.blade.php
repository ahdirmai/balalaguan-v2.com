<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('includes.admin.head')    
    @stack('style')
    <title>Balalaguan - Bumantara Event Orginizer</title>
</head>
<body>
    @include('includes.admin.sidebar')
    <section class="wrapper d-flex flex-column min-vh-100 bg-light">
        {{-- Header --}}
        @include('includes.admin.header')
        {{-- Main content --}}
        <section class="body flex-grow-1 px-3">
            <section class="body flex-grow-1 px-3">
                @yield('content')
            </section>
        </section>
        {{-- Footer --}}
        @include('includes.admin.footer')
    </section>
    {{-- scripts --}}
    <!-- CoreUI and necessary plugins-->
    @vite(["resources/js/core-ui/main.js" ,"resources/js/core-ui/vendors/coreui.bundle.min.js", "resources/js/core-ui/vendors/simplebar.min.js"])
    @stack('script')
</body>
</html>