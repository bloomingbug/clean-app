<x-layouts.user-layout :titleMeta="'Registrasi ' . $campaign->title"
    :vite="['resources/js/pages/user/cleanact/create.js']">

    <section class="card rounded-3 border-0 p-0">
        <div class="card-body">
            <div class="img-wrapper">
                <img src="{{ $campaign->cover }}" alt="Campaign Cover">
            </div>
            <div class="mt-4">
                <h1 class="fw-bold text-primary mb-0">Form Pendaftaran CleanAct</h1>
                <h2 class="fw-bold mb-3">{{ $campaign->title }}</h2>

                <div class="d-flex align-items-center gap-3">
                    <div class="d-flex flex-column gap-1 justify-content-center align-items-start">
                        <p class="text-muted text-sm m-0">
                            <i class="fa-solid fa-calendar"></i>
                            {{ $campaign->event_date ?? '-' }}
                        </p>
                        <p class="text-muted text-sm m-0">
                            <i class="fa-solid fa-clock"></i>
                            {{ $campaign->event_time ? $campaign->event_time . ' sd Selesai' : '-' }}
                        </p>
                        <a href="{{ 'https://www.google.com/maps/@' . $campaign->latitude . ',' . $campaign->longitude . ',16z' }}"
                            target="_blank" class="text-link text-sm">
                            <i class="fa-solid fa-location-dot"></i>
                            {{ $campaign->city->name . ', ' . $campaign->city->province->name }}
                        </a>
                    </div>
                </div>

                <div class="mt-4">
                    <form action="{{ route('cleanact.store', $campaign->slug) }}" method="post">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="name" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" @if(old('name')) value="{{ old('name') }}" @else
                                value="{{ auth()->user()->name }}" @endif
                                class="form-control @error('name') is-invalid @enderror"
                                placeholder="Masukan nama lengkap..." required>
                            @error('name')
                            <div id="name" class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" name="email" id="email" @if(old('email')) value="{{ old('email') }}"
                                @else value="{{ auth()->user()->email }}" @endif
                                class="form-control @error('email') is-invalid @enderror"
                                placeholder="Masukan alamat email..." required>
                            @error('email')
                            <div id="email" class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="phone" class="form-label">No. Handphone <span
                                    class="text-danger">*</span></label>
                            <input type="text" inputmode="tel" name="phone" id="phone" value="{{ old('phone') }}"
                                class="form-control @error('phone') is-invalid @enderror"
                                placeholder="Masukan nomor handphone..." required>
                            @error('phone')
                            <div id="phone" class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary w-100 mt-3">Daftar</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-layouts.user-layout>