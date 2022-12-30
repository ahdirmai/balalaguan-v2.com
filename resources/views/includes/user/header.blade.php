{{-- Header --}}
<x-user.hero-section>
    <div class="col-lg-6">
        <div class="text-center my-5">
            <img src="{{ asset('/img/balalaguan-logo.png') }}" alt="Balalaguan Logo" width="300" class="">
            <h1 class="display-5 fw-bolder text-white mt-5 mb-2">Present your business in a whole new way</h1>
            <p class="lead text-light mb-4">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit!</p>
            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                <a class="btn bg-brand-red btn-lg px-4 me-sm-3 text-light" href="{{ route('register') }}">
                    Daftar Akun
                </a>
                <a class="btn btn-outline-light btn-lg px-4" href="{{ route('login') }}">Masuk</a>
            </div>
        </div>
    </div>
</x-user.hero-section>