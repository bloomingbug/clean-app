<x-layouts.user-layout :titleMeta="$campaign->title" :vite="['resources/js/pages/user/cleanup/show.js']">

    <section class="card rounded-3 border-0 p-0">
        <div class="card-body">
            <div class="img-wrapper">
                <img src="{{ $campaign->cover }}" alt="Campaign Cover">
            </div>
            <div class="mt-4">
                <h1 class="h3 fw-bold text-primary mb-2">{{ $campaign->title }}</h1>

                <div class="d-flex align-items-center gap-3">
                    @if ($campaign->event_date && $campaign->event_time)
                    <div class="d-flex gap-1 justify-content-start align-items-center">
                        <p class="text-muted text-sm m-0">
                            <i class="fa-solid fa-calendar"></i>
                            {{ $campaign->event_date }}
                        </p>
                    </div>
                    @endif

                    <div class="d-flex gap-1 justify-content-start align-items-center">
                        <p class="text-muted text-sm">
                            <i class="fa-solid fa-location-dot"></i>
                            {{ $campaign->city->name . ', ' . $campaign->city->province->name }}
                        </p>
                    </div>
                </div>

                <p class="text-muted text-justify">{!! $campaign->description !!}</p>

                <div class="row mt-5" id="register">
                    @if($campaign->target_volunteer > 0)
                    <div class="col-6 col-md-4">
                        <div class="text-black-50 mb-1">Total Volunteer</div>
                        <h3 class="fw-bold text-primary">
                            {{ $campaign->volunteers_count }}
                            <span class="fw-normal text-black fs-6 text-sm">
                                {{ ' dari ' . $campaign->target_volunteer }}
                            </span>
                        </h3>
                    </div>
                    @endif
                    @if($campaign->target_fund > 0)
                    <div class="col-6 col-md-4">
                        <div class="text-black-50 mb-1">Total Donasi</div>
                        <h3 class="fw-bold text-primary">
                            {{ 'Rp' . (number_format($campaign->total_fund, 0, ',', '.') ?? '0') }}
                            <span class="fw-normal text-black fs-6 text-sm">
                                {{ ' dari Rp' . number_format($campaign->target_fund, 0, ',', '.') }}
                            </span>
                        </h3>
                    </div>
                    @endif

                    @if($campaign->target_volunteer > 0)
                    <div class="col-12 col-md-4 mt-3 mt-md-0">
                        {{-- check auth user is already resgister --}}
                        @if(!$ticket)
                        <p class="text-black-50 text-center mb-1">Daftar sebagai volunteer</p>

                        @if(($campaign->volunteers_count >= $campaign->target_volunteer || $campaign->due_date_volunteer
                        < now())) <button class="btn btn-danger w-100" disabled>Daftar</button>
                            @else
                            <a href="{{ route('cleanact.create', $campaign->slug) }}"
                                class="btn btn-primary w-100">Daftar</a>
                            @endif

                            @else

                            <p class="text-black-50 text-center mb-1">Anda sudah terdaftar</p>
                            <a href="{{ route('cleanact.show', $ticket->no) }}" class="btn btn-info w-100">Tiket</a>
                            @endif

                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    @if(($campaign->target_fund > 0 || $campaign->due_date_fund > now()) || $fundings->count() > 0)
    <section class="card rounded-3 border-0 p-0 mt-4 mt-md-5">

        <div class="card-body">
            @if($campaign->target_fund > 0 || $campaign->due_date_fund > now())
            <div class="form-donation" id="donate">
                <form action="{{ route('cleanfund.store') }}" method="post" class="mb-4">
                    @csrf
                    @error('slug')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <input type="hidden" name="slug" value="{{ $campaign->slug }}">

                    <div class="form-group mb-3">
                        <label for="amount" class="form-label">Jumlah Donasi</label>
                        <input type="number" name="amount" id="amount" class="form-control" value="{{ old('amount') }}"
                            required>
                        @error('amount')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="message" class="form-label">Pesan (opsional)</label>
                        <textarea name="message" id="message" class="form-control">{{ old('message') }}</textarea>
                        @error('message')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" value="1" id="secret" name="is_anonymous">
                        <label class="form-check-label" for="secret">
                            Sembunyikan nama saya
                        </label>
                        @error('is_anonymous')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Donasi</button>
                </form>
            </div>
            @endif

            @forelse ($fundings as $funding)
            <div class="d-flex flex-col justify-content-center align-items-center my-2">
                <div class="card card-donation border-0 rounded-2 w-100">
                    <div class="card-body">
                        <div class="name">{{ $funding->is_anonymous ? censorName($funding->name) :
                            $funding->name }}</div>
                        <div class="amount">Telah berdonasi sebesar {{ 'Rp' .
                            number_format($funding->amount, 0, ',', '.') }}</div>
                        <div class="message">{{ $funding->message }}</div>
                    </div>
                </div>
            </div>
            @empty
            @endforelse
        </div>
    </section>
    @endif
</x-layouts.user-layout>