<x-layouts.user-layout title="Edit Campaign" :vite="['resources/js/pages/admin/campaign/create.js']">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.campaign.update', $campaign->slug) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label for="title" class="form-label">Nama Campaign</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                                name="title" value="{{ $campaign->title }}" placeholder="Masukan nama campaign">
                            <div id="title" class="invalid-feedback">
                                @error('title')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="eventDate" class="form-label">Tanggal Kegiatan</label>
                            <input type="date" class="form-control @error('event_date') is-invalid @enderror"
                                id="eventDate" name="event_date" value="{{ $campaign->event_date }}" <div
                                id="event_date" class="invalid-feedback">
                            @error('event_date')
                            {{ $message }}
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="eventTime" class="form-label">Waktu Mulai Kegiatan</label>
                            <input type="time" class="form-control @error('event_time') is-invalid @enderror"
                                id="eventTime" name="event_time" value="{{ $campaign->event_time }}">
                            <div id="event_time" class="invalid-feedback">
                                @error('event_time')
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
                                id="description" name="description" value="{{ $campaign->description }}"
                                placeholder="Masukan penjelasan terkait lokasi, permasalahan, dan kebutuhan penanganan">
                                        {{ $campaign->description }}
                                    </textarea>
                            <div id="description" class="invalid-feedback">
                                @error('description')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="location" class="form-label">Lokasi</label>
                            <div class="d-flex align-items-center justify-content-between flex-nowrap gap-2">
                                <input type="text" class="form-control @error('location') is-invalid @enderror"
                                    id="location" name="location"
                                    value="{{ $campaign->latitude . ', ' . $campaign->longitude }}"
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

                        <button type="submit" class="btn btn-primary">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layouts.user-layout>