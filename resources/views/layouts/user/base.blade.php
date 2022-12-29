<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('includes.user.head')
    @stack('style')
    <title>Balalaguan - Bumantara Event Organizer</title>
</head>
<body>
    @include('includes.user.navbar')
    @yield('outer')
    <main class="bg-light">
        <section class="container-lg p-4">
            @yield('content')
        </section>
    </main>
    @include('includes.user.footer')
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    @vite('resources/js/app.js')

    @stack('script')
</body>
</html>