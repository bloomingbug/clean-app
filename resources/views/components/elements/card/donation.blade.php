<div class="col-12 col-md-6 col-xl-4 text-decoration-none my-3">
    <div class="card border-0 rounded-3">
        <div class="card-image-wrapper">
            <img src="{{ $cover }}" alt="Campaign" class="card-img">

        </div>
        <div class="card-body">
            <div class="progress mb-3" role="progressbar">
                <div class="progress-bar" style="width: {{ $percentage }}%">
                    {{ $totalFund ?? '0' }}
                </div>
            </div>

            <h5 class="mb-1 fw-bold">{{ $title }}</h5>
            <div class="d-flex gap-1 justify-content-start align-items-center">
                <p class="text-muted text-sm m-0">
                    <i class="fa-solid fa-calendar"></i>
                    {{ $date }}
                </p>
            </div>
            <div class="d-flex gap-1 justify-content-start align-items-center">
                <p class="text-muted text-sm">
                    <i class="fa-solid fa-location-dot"></i>
                    {{ $location }}
                </p>
            </div>

            <a href="/campaign/{{ $slug }}#donate" class="btn btn-primary w-100">Donasi</a>

        </div>
    </div>
</div>