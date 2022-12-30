{{-- Header --}}
<header class="bg-dark py-5"
    style="
    background-image: url('{{ asset('/img/concert-layer.png') }}');
    background-size: cover;
    background-repeat: no-repeat;
    min-height: 120vh;
    ">
    <div class="container px-5 pt-5">
        <div class="row gap-2 gx-5 justify-content-center">
            {{ $slot }}
        </div>
    </div>
</header>