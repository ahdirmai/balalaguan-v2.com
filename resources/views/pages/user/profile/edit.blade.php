@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mb-4 mx-4">
                <div class="card-body p-4">
                    <h1>Ubah data profil</h1>
                    {{-- <p class="text-medium-emphasis">Create your account</p> --}}
                    <form action="{{ route('user.profile.update', auth()->user()->id) }}" method="post">
                        @csrf
                        @method('PUT')

                        @error('name')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="input-group mb-3"><span class="input-group-text">
                                <svg class="icon">
                                    <use xlink:href="{{ asset('/core-ui/svg/free.svg#cil-user') }}"></use>

                                </svg></span>
                            <input class="form-control @error('name') is-invalid @enderror" type="text"
                                placeholder="Username" name="name" value="{{ $user->name ?? old('name') }}" required>
                        </div>
                        @error('email')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <div class="input-group mb-3"><span class="input-group-text">
                                <svg class="icon">
                                    <use xlink:href="{{ asset('/core-ui/svg/free.svg#cil-envelope-open') }}"></use>
                                </svg></span>
                            <input class="form-control @error('email') is-invalid @enderror" type="text"
                                placeholder="Email" name="email" value="{{ $user->email ?? old('email') }}" required>
                        </div>

                        {{-- <div class="input-group mb-3"><span class="input-group-text">
                                <svg class="icon">
                                    <use xlink:href="{{ asset('/core-ui/svg/free.svg#cil-lock-locked') }}"></use>
                                </svg></span>
                            <input class="form-control @error('password') is-invalid @enderror" type="password"
                                placeholder="Password" name="password">
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
                                placeholder="Repeat password" name="password_confirmation" autocomplete="new-password">
                        </div>
                        @error('password_confirmation')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror --}}

                        @error('nik')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="input-group mb-4"><span class="input-group-text">
                                <svg class="icon">
                                    <use xlink:href="{{ asset('/core-ui/svg/free.svg#cil-lock-locked') }}"></use>
                                </svg></span>
                            <input class="form-control @error('nik') is-invalid @enderror" type="number" placeholder="NIK"
                                name="nik" value="{{ $user->nik ?? old('nik') }}" required>
                        </div>

                        @error('phone')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="input-group mb-4"><span class="input-group-text">
                                <svg class="icon">
                                    <use xlink:href="{{ asset('/core-ui/svg/free.svg#cil-phone') }}"></use>
                                </svg></span>
                            <input class="form-control @error('phone') is-invalid @enderror" type="number"
                                placeholder="Phone" name="phone" value="{{ $user->phone ?? old('phone') }}" required>
                        </div>

                        @error('address')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="input-group mb-4"><span class="input-group-text">
                                <svg class="icon">
                                    <use xlink:href="{{ asset('/core-ui/svg/free.svg#cil-home') }}"></use>
                                </svg></span>
                            <input class="form-control @error('address') is-invalid @enderror" type="text"
                                placeholder="Alamat" name="address" value="{{ $user->address ?? old('address') }}" required>
                        </div>

                        <button class="btn btn-block btn-success text-light" type="submit">Update</button>
                        <a class="btn btn-secondary btn-block" href="{{ route('user.profile.index') }}">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
