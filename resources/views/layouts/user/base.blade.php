<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('includes.user.head')
    @livewireStyles
    @stack('style')
    <title>Balalaguan - Bumantara Event Organizer</title>
</head>
<body class="bg-texture">

    @include('includes.user.navbar')
    @yield('outer')

    <main class="container-lg">
        <section>
            @yield('content')
        </section>
        @include('includes.user.footer')
    </main>
    
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    @vite('resources/js/app.js')

    @livewireScripts
    @stack('script')
    {{-- save user id into localStorage --}}
    <script>
        localStorage.setItem('balalaguan:userId', {{ auth()->check() ? auth()->user()->id : 'null' }})
    </script>
</body>
</html>