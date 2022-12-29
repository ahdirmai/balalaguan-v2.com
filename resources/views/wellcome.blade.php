@extends('layouts.user.base')

@section('outer')
    @include('includes.user.header')
@endsection

@section('content')
    {{-- Overlapping Section --}}
    <section style="transform: translateY(-50%)" class="container-lg bg-white p-2 rounded-3 mx-auto shadow d-flex flex-column-reverse flex-md-row justify-content-between">
        <a class="btn bg-brand-red d-flex justify-content-center align-items-center text-light" href="https://google.com" target="_blank">Visit Map</a>
        {{-- Lokasi acara --}}
        <section class="d-flex align-items-center gap-4 p-3">
            <span class="border p-3 rounded-circle d-flex justify-content-center align-items-center" style="width: 40px; height: 40px">
                <i class="fa-solid fa-location-dot text-brand-red fs-5"></i>
            </span>
            <section>
                <strong>Lokasi Acara</strong>
                <p class="mb-0">Wetland Square Banjarmasin</p>
            </section>
        </section>
        {{-- Durasi acara --}}
        <section class="d-flex align-items-center gap-4 p-3">
            <span class="border p-3 rounded-circle d-flex justify-content-center align-items-center" style="width: 40px; height: 40px">
                <i class="fa-solid fa-clock text-brand-red fs-5"></i>
            </span>
            <section>
                <strong>Durasi Acara</strong>
                <p class="mb-0">2 Februari - 4 Februari 2023</p>
            </section>
        </section>
        {{-- Narahubung --}}
        <section class="d-flex align-items-center gap-4 p-3">
            <span class="border p-3 rounded-circle d-flex justify-content-center align-items-center" style="width: 40px; height: 40px">
                <i class="fa-solid fa-phone-volume text-brand-red fs-5"></i>
            </span>
            <section>
                <strong>Narahubung</strong>
                <p class="mb-0">085989894567</p>
            </section>
        </section>
    </section>
    {{-- Order now --}}
    <section class="py-4" style="margin-bottom: 4rem" id="about">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="text-brand-red mt-0">We've got what you need!</h2>
                    <hr class="divider divider-light" />
                    <p class="text-white-75 mb-4">Anim incididunt consectetur exercitation ad aute officia in irure. Nisi elit ea excepteur proident ipsum ex aute irure commodo ullamco do. Officia ea ex aliquip velit eiusmod adipisicing eu velit irure cillum ea nulla. Incididunt laboris pariatur ea deserunt enim culpa culpa veniam nostrud sint in excepteur in.!</p>
                    <a class="btn px-3 bg-brand-red text-light" href="#services">Pesan Sekarang!</a>
                </div>
            </div>
        </div>
    </section>
    {{-- All Ticket Package --}}
    <section class="container-lg">
        {{-- Early bid --}}
        <div class="row g-0" style="margin-bottom: 4rem">
            <div class="col-lg-6 order-lg-2 text-white" 
                style="
                    background-image: url('https://raw.githubusercontent.com/StartBootstrap/startbootstrap-landing-page/master/dist/assets/img/bg-showcase-3.jpg');
                    background-size: cover;
                    background-position: center
                    "></div>
            <div class="col-lg-6 order-lg-1 my-auto showcase-text pe-5">
                <h2>Early Bid</h2>
                <p class="lead mb-0">When you use a theme created by Start Bootstrap, you know that the theme will look great on any device, whether it's a phone, tablet, or desktop the page will behave responsively!</p>
            </div>
        </div>
        {{-- Presale 1--}}
        <div class="row g-0" style="margin-bottom: 4rem">
            <div class="col-lg-6 text-white showcase-img" 
            style="
                background-image: url('https://raw.githubusercontent.com/StartBootstrap/startbootstrap-landing-page/master/dist/assets/img/bg-showcase-3.jpg');
                background-size: cover;
                background-position: center">
                </div>
            <div class="col-lg-6 my-auto showcase-text ps-5">
                <h2>Presale 1</h2>
                <p class="lead mb-0">Newly improved, and full of great utility classes, Bootstrap 5 is leading the way in mobile responsive web development! All of the themes on Start Bootstrap are now using Bootstrap 5!</p>
            </div>
        </div>
        {{-- Presale 2--}}
        <div class="row g-0" style="margin-bottom: 4rem">
            <div class="col-lg-6 order-lg-2 text-white showcase-img" 
            style="
                background-image: url('https://raw.githubusercontent.com/StartBootstrap/startbootstrap-landing-page/master/dist/assets/img/bg-showcase-3.jpg');
                background-size: cover;
                background-position: center">
                </div>
            <div class="col-lg-6 my-auto showcase-text pe-5">
                <h2>Presale 2</h2>
                <p class="lead mb-0">Newly improved, and full of great utility classes, Bootstrap 5 is leading the way in mobile responsive web development! All of the themes on Start Bootstrap are now using Bootstrap 5!</p>
            </div>
        </div>
        {{-- Presale 3--}}
        <div class="row g-0" style="margin-bottom: 4rem">
            <div class="col-lg-6 text-white showcase-img" 
            style="
                background-image: url('https://raw.githubusercontent.com/StartBootstrap/startbootstrap-landing-page/master/dist/assets/img/bg-showcase-3.jpg');
                background-size: cover;
                background-position: center">
                </div>
            <div class="col-lg-6 my-auto showcase-text ps-5">
                <h2>Presale 3</h2>
                <p class="lead mb-0">Newly improved, and full of great utility classes, Bootstrap 5 is leading the way in mobile responsive web development! All of the themes on Start Bootstrap are now using Bootstrap 5!</p>
            </div>
        </div>
    </section>
@endsection