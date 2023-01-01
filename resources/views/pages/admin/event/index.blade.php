@extends('layouts.admin.base')

@section('content')
    <div class="container mb-5">
        <h1>{{ $event->name }}</h1>
        <form action="{{ route('admin.event.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Event logo --}}
            <div class="col-12 mb-4">
                <section class="d-flex justify-content-between align-items-end gap-2">
                    <div>
                        <label for="logo" class="form-label">Logo</label>
                        <input type="file" id="logo" name="logo" class="form-control" accept="image/jpg, image/png, image/jpeg">
                    </div>
                    <div>
                        <img width="200" src="{{ $event->hasMedia('logo') ? @$event->getMedia('logo')->last()->getUrl() : 'https://amdmediccentar.rs/wp-content/plugins/uix-page-builder/includes/uixpbform/images/no-logo.png' }}" class="img-thumbnail" alt="logo">
                    </div>
                </section>
            </div>
            {{-- End of Event logo --}}

            {{-- Event name --}}
            <div class="col-12 mb-4">
                <label for="name" class="form-label">Nama Event</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama paket"
                required value="{{ $event->name ?? old('name') }}">
            </div>
            {{-- End of Event name --}}

            {{-- Event description --}}
            <div class="col-12 mb-4">
                <label for="description" class="form-label">Deskripsi Event</label>
                <textarea name="description" id="description" class="form-control">{{ $event->description }}</textarea>
            </div>
            {{-- End of Event description --}}

            {{-- Event start --}}
            <div class="row mb-4">
                <div class="col-6">
                    <label for="start" class="form-label">Waktu Event dimulai</label>
                    <input type="datetime-local" class="form-control" id="start" name="start"
                    value="{{ $event->start ?? old('start') }}">
                </div>
            {{-- end of Event start --}}
            {{-- Event End --}}
                <div class="col-6">
                    <label for="end" class="form-label">Waktu Event berakhir</label>
                    <input type="datetime-local" class="form-control" id="end" name="end"
                    value="{{ $event->end ?? old('end') }}">
                </div>
            </div>
            {{-- End of Event End --}}

            <div class="row mb-4">
                {{-- Payment account name --}}
                <div class="col-6">
                    <label for="price" class="form-label">Nama akun pembayaran</label>
                    <input type="text" class="form-control" id="price" name="payment_name"
                        placeholder="Masukkan nama akun pembayaran" required
                        value="{{ $event->payment_name ?? old('payment_name') }}">
                    </div>
                {{-- end of Payment account name --}}
                {{-- Payment number --}}
                <div class="col-6">
                    <label for="stock" class="form-label">Nomor akun pembayaran</label>
                    <input type="text" class="form-control" id="stock" name="payment_account"
                    placeholder="Masukkan nomor akun pembayaran" required
                    value="{{ $event->payment_account ?? old('payment_account') }}">
                </div>
                {{-- end of Payment number --}}
            </div>

            <div class="row mb-4">
                {{-- Contact Name --}}
                <div class="col-6">
                    <label for="price" class="form-label">Nama narahubung</label>
                    <input type="text" class="form-control" id="price" name="contact_name"
                    placeholder="Masukkan nama akun pembayaran" required
                    value="{{ $event->contact_name ?? old('contact_name') }}">
                </div>
                {{-- end of Contact Name --}}
                {{-- Contact Person --}}
                <div class="col-6">
                    <label for="stock" class="form-label">Nomor narahubung</label>
                    <input type="text" class="form-control" id="stock" name="contact_number"
                    placeholder="Masukkan nomor akun pembayaran" required
                        value="{{ $event->contact_number ?? old('contact_number') }}">
                    </div>
                {{-- end of Contact Person --}}
            </div>

            {{-- Submit --}}
            <div class="col-12">
                <button type="submit" class="btn btn-primary">
                    <i class="fa-solid fa-save"></i>
                    Submit
                </button>
            </div>
        </form>
    </div>
@endsection

@push('script')
    <script>
        // Preview image before upload
        const fileInput = document.querySelector('[name=logo]')
        const imagePreview = document.querySelector('[alt=logo]')

        fileInput.addEventListener('change', evt => {
            const [ file ] = fileInput.files
            if ( file ) imagePreview.setAttribute('src', URL.createObjectURL(file))
        })
    </script>
@endpush