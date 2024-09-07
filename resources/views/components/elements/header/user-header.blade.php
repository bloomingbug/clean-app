<header class="sticky-top">
    <!-- Nav -->
    <nav class="navbar navbar-expand-lg bg-white navigasi" id="navigasi">
        <div class="container d-flex justify-content-between align-items-center py-2">
            <a href="/" class="d-flex align-items-center text-decoration-none">
                {{-- <i class="fa-solid fa-seedling fs-1"></i>
                <div class="ms-1 fs-5">
                    <span class="text-primary fw-bold">Clean</span>
                    <span class="text-black">App</span>
                </div> --}}
                <img src="/images/logo.png" alt="Logo CleanApp" height="38">
            </a>

            @if ($user)
            <a href="{{ route('profile.index') }}" class="square ratio-1x1 bg-primary profile" title="Profil">
                <img src="{{ $user->avatar ?? 'https://ui-avatars.com/api/?background=00754b&color=fff&name=' . $user->name }}"
                    alt="Avatar" class="img-fluid avatar-image" />
            </a>
            @else
            <a href="{{ route('login.index') }}" class="btn btn-primary" title="Masuk">Masuk</a>
            @endif
        </div>
    </nav>
    <!-- End of Nav -->
</header>

<section class="header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                @if($title)
                <h1 class="text-center fw-bold">{{ $title }}</h1>
                @endif

                @if($description)
                <p class="text-center fw-semibold fs-4">
                    {{ $description }}
                </p>
                @endif
            </div>
        </div>
    </div>
</section>