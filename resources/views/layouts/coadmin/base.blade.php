<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('includes.coadmin.head')    
    @stack('style')
</head>
<body>
    @include('includes.coadmin.sidebar')
    <section class="wrapper d-flex flex-column min-vh-100 bg-light">
        {{-- Header --}}
        @include('includes.coadmin.header')
        {{-- Main content --}}
        <section class="body flex-grow-1 px-3">
            <section class="body flex-grow-1 px-3">
                @yield('content')
            </section>
        </section>
        {{-- Footer --}}
        @include('includes.coadmin.footer')
    </section>
    {{-- scripts --}}
    <!-- CoreUI and necessary plugins-->
    @vite(["resources/js/core-ui/main.js" ,"resources/js/core-ui/vendors/coreui.bundle.min.js", "resources/js/core-ui/vendors/simplebar.min.js"])
    @stack('script')
</body>
</html>