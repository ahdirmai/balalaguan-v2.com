@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mb-4 m-4">
                <div class="card-body p-4">
                    <h1>Register</h1>
                    <p class="text-medium-emphasis">Create your account</p>
                    <form action="{{ route('register') }}" method="post">
                        @csrf
                        <div class="input-group mb-3"><span class="input-group-text">
                                <svg class="icon">
                                    <use xlink:href="{{ asset('/core-ui/svg/free.svg#cil-user') }}"></use>
                                </svg></span>
                            <input class="form-control @error('name') is-invalid @enderror" type="text"
                                placeholder="Fullname" name="name" value="{{ old('name') }}" required>
                        </div>
                        @error('name')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <div class="input-group mb-3"><span class="input-group-text">
                                <svg class="icon">
                                    <use xlink:href="{{ asset('/core-ui/svg/free.svg#cil-envelope-open') }}"></use>
                                </svg></span>
                            <input class="form-control @error('email') is-invalid @enderror" type="text"
                                placeholder="Email" name="email" value="{{ old('email') }}" required>
                        </div>
                        @error('email')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <div class="input-group mb-3"><span class="input-group-text">
                                <svg class="icon">
                                    <use xlink:href="{{ asset('/core-ui/svg/free.svg#cil-lock-locked') }}"></use>
                                </svg></span>
                            <input minlength="8" maxlength="8" class="form-control @error('password') is-invalid @enderror" type="password"
                                placeholder="Password" name="password" required>
                        </div>
                        @error('password')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <div class="input-group mb-4"><span class="input-group-text">
                                <svg class="icon">
                                    <use xlink:href="{{ asset('/core-ui/svg/free.svg#cil-lock-locked') }}"></use>
                                </svg></span>
                            <input id="password-confirm"
                                class="form-control @error('password_confirmation') is-invalid @enderror" type="password"
                                placeholder="Repeat password" name="password_confirmation" autocomplete="new-password" required>
                        </div>
                        @error('password_confirmation')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <div class="input-group mb-4"><span class="input-group-text">
                                <svg class="icon">
                                    <use xlink:href="{{ asset('/core-ui/svg/free.svg#cil-lock-locked') }}"></use>
                                </svg></span>
                            <input class="form-control @error('nik') is-invalid @enderror" type="number" placeholder="NIK"
                                name="nik" minlength="16" maxlength="16" value="{{ old('nik') }}" required>
                        </div>
                        @error('nik')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <div class="input-group mb-4"><span class="input-group-text">
                                <svg class="icon">
                                    <use xlink:href="{{ asset('/core-ui/svg/free.svg#cil-phone') }}"></use>
                                </svg></span>
                            <input class="form-control @error('phone') is-invalid @enderror" type="number"
                                placeholder="Phone" name="phone"  value="{{ old('phone') }}" required>
                        </div>
                        @error('phone')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <div class="input-group mb-4"><span class="input-group-text">
                                <svg class="icon">
                                    <use xlink:href="{{ asset('/core-ui/svg/free.svg#cil-home') }}"></use>
                                </svg></span>
                            <input class="form-control @error('address') is-invalid @enderror" type="text"
                                placeholder="Alamat" name="address"  value="{{ old('address') }}">
                        </div>
                        @error('address')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <button class="btn btn-block btn-success text-light mb-2" type="submit">Buat akun</button>
                        <p>
                            Sudah punya akun ? Login <a href="{{ route('login') }}">disini</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        let bg = document.querySelector('.bg-light');
        bg.style.backgroundImage = "url('{{ asset('img/concert-layer.png') }}')";
        bg.style.backgroundSize = "cover";
        bg.style.backgroundRepeat = "no-repeat";
        bg.style.minHeight = "120vh";
    </script>
@endsection
