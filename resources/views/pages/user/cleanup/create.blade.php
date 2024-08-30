<x-layouts.user-layout title="Tambah Campaign" description="Tambahkan campaign baru untuk membersihkan lingkungan kita."
    :vite="['resources/js/pages/user/cleanup/create.js']">

    <section class="card rounded-3 border-0">

        <div class="card-body">
            <form action="{{ route('cleanup.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group mb-3">
                    <label for="title" class="form-label">Nama Campaign</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                        value="{{ old('title') }}" placeholder="Masukan nama campaign">
                    <div id="title" class="invalid-feedback">
                        @error('title')
                        {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="cover" class="form-label">Foto Lokasi</label>
                    <input type="file" class="form-control @error('cover') is-invalid @enderror" id="cover"
                        name="cover">
                    <div id="cover" class="invalid-feedback">
                        @error('cover')
                        {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea type="text" class="form-control @error('description') is-invalid @enderror"
                        id="description" name="description" value="{{ old('description') }}"
                        placeholder="Masukan penjelasan terkait lokasi, permasalahan, dan kebutuhan penanganan"></textarea>
                    <div id="description" class="invalid-feedback">
                        @error('description')
                        {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="provinceId" class="form-label">Provinsi</label>
                    <select type="text" class="form-control @error('province_id') is-invalid @enderror" id="provinceId"
                        name="province_id" required>
                        <option value="" selected hidden disabled>Pilih Provinsi</option>
                        @forelse ($provinces as $province)
                        <option value="{{ $province->id }}">{{ $province->name }}</option>
                        @empty
                        @endforelse
                    </select>
                    <div id="provinceId" class="invalid-feedback">
                        @error('province_id')
                        {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="cityId" class="form-label">Kota</label>
                    <select type="text" class="form-control @error('city_id') is-invalid @enderror" id="cityId"
                        name="city_id">
                    </select>
                    <div id="cityId" class="invalid-feedback">
                        @error('city_id')
                        {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="address" class="form-label">Alamat</label>
                    <textarea type="text" class="form-control @error('address') is-invalid @enderror" id="address"
                        name="address" value="{{ old('address') }}"
                        placeholder="Masukan alamat lokasi campaign"></textarea>
                    <div id="address" class="invalid-feedback">
                        @error('address')
                        {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="location" class="form-label">Lokasi</label>
                    <div class="d-flex align-items-center justify-content-between flex-nowrap gap-2">
                        <input type="text" class="form-control @error('location') is-invalid @enderror" id="location"
                            name="location" value="{{ old('location') }}"
                            placeholder="Masukan koordinat (latitude, longitude)">
                        <div id="location" class="invalid-feedback">
                            @error('location')
                            {{ $message }}
                            @enderror
                        </div>
                        <button id="btnGetLocation" class="btn btn-outline-primary">
                            <i class="fa-solid fa-location-crosshairs"></i>
                        </button>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
        </div>
    </section>
</x-layouts.user-layout>