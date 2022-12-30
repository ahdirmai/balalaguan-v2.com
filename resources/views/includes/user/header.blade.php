{{-- Header --}}
<x-user.hero-section>
    <div class="col-lg-10">
        <div class="text-center my-5">
            <img src="{{ asset('/img/balalaguan-logo.png') }}" alt="Balalaguan Logo" width="300" class="mb-4">
            <p class="lead text-light mb-4">Kerinduan pecinta musik selama dua tahun pandemi menjadi latar belakang utama kami untuk mengadakan <strong>“Balalaguan Festival”</strong>. Besarnya antusias masyarakat Kalimantan Selatan untuk menghadiri acara festival music seperti ini, juga menjadi landasan kami menghadirkan pertunjukan music dan memberikan kesan bagi penikmat music khususnya di Kalimantan Selatan. Kami akan menghadirkan pertunjukan musik dengan musisi ternama Indonesia. Dengan hadirnya “Balalaguan Festival” dapat mengurangi rasa rindu penikmat musik dan memberikan pengalaman serta kesan yang baik untuk para penikmat musik.</p>
            @if ( !auth()->check() )
            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                <a class="btn bg-brand-red btn-lg px-4 me-sm-3 text-light" href="{{ route('register') }}">
                    Daftar Akun
                </a>
                <a class="btn btn-outline-light btn-lg px-4" href="{{ route('login') }}">Masuk</a>
            </div>
            @endif
        </div>
    </div>
</x-user.hero-section>