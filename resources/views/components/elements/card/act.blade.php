<div class="col-12 col-md-6 col-xl-4 text-decoration-none my-3">
    <div class="card border-0 rounded-3">
        <div class="card-image-wrapper">
            <img src="{{ $cover }}" alt="Campaign" class="card-img">

        </div>
        <div class="card-body">
            <h5 class="mb-1 fw-bold">{{ $title }}</h5>
            @if($total > 0)
            <p class="text-muted mb-3">
                <span class="fw-semibold text-primary">
                    {{ $total . " "}}
                </span>
                <span>sudah terdaftar</span>
            </p>
            @endif
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

            @if(!$isClosed)
            <a href="/campaign/{{ $slug }}#register" class="btn btn-primary w-100 fw-semibold">Daftar</a>
            @else
            <button class="btn btn-danger w-100 fw-semibold text-white" disabled>Daftar</button>
            @endif

        </div>
    </div>
</div>