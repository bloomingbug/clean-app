<x-layouts.user-layout :titleMeta="'Tiket ' . $volunteer->campaign->title">

    <section class="card rounded-3 border-0 p-0">
        <div class="card-body">
            <div>
                <span class="badge text-bg-secondary">Ticket</span>
                <h1 class="fw-bold text-primary mb-3">{{ $volunteer->campaign->title }}</h1>


                <div class="d-flex justify-content-between align-items-center">
                    <img src="{{ 'https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=' . $volunteer->no }}"
                        alt="QR Ticket" class="img-fluid" height="200">
                </div>

                <div class="d-flex align-items-center gap-3 mt-3">
                    <div class="d-flex flex-column gap-1 justify-content-center align-items-start">
                        <p class="text-muted text-sm m-0">
                            <i class="fa-solid fa-calendar"></i>
                            {{ $volunteer->campaign->event_date ?? '-' }}
                        </p>
                        <p class="text-muted text-sm m-0">
                            <i class="fa-solid fa-clock"></i>
                            {{ $volunteer->campaign->event_time ? $volunteer->campaign->event_time . ' sd Selesai' : '-'
                            }}
                        </p>
                        <a href="{{ 'https://www.google.com/maps/@' . $volunteer->campaign->latitude . ',' . $volunteer->campaign->longitude . ',16z' }}"
                            target="_blank" class="text-link text-sm">
                            <i class="fa-solid fa-location-dot"></i>
                            {{ $volunteer->campaign->city->name . ', ' . $volunteer->campaign->city->province->name }}
                        </a>
                    </div>
                </div>


                @if($volunteer->campaign->event_date && $volunteer->campaign->event_time)
                @if ( $volunteer->campaign->event_date == now()->format('Y-m-d') && $volunteer->campaign->event_time <
                    now()->format('H:i'))
                    <div class="mt-5">
                        <form action="{{ route('cleanact.update', $volunteer->no) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <h5> Presensi Kehadiran </h5>

                            @if($volunteer->presence_evidence)
                            <img src="{{ $volunteer->presence_evidence }}" alt="Presence Evidence" height="200"
                                class="w-auto">
                            @endif

                            <div class="form-group mb-3">
                                <label for="presenceEvidence" class="form-label">Foto Kegiatan (Selfie) <span
                                        class="text-danger">*</span></label>

                                <input type="file" name="presence_evidence" id="presenceEvidence"
                                    class="form-control @error('presence_evidence') is-invalid @enderror" required>

                                @error('presence_evidence')
                                <div id="presenceEvidence" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                    @elseif ($volunteer->campaign->event_date < now()->format('Y-m-d'))
                        <div class="alert alert-danger mt-5" role="alert">
                            <h4 class="alert-heading">Event telah berakhir!</h4>
                            <p class="mb-0">Terima kasih telah berpartisipasi dalam kegiatan ini.</p>
                        </div>
                        @endif
                        @endif
            </div>
        </div>
    </section>
</x-layouts.user-layout>