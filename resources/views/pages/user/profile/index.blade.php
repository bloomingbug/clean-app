<x-layouts.user-layout :titleMeta="'Profile ' . $user->name" :vite="['resources/js/pages/user/profile/index.js']">

    <section class="card rounded-3 border-0 p-0">
        <div class="card-body">
            <div class="d-flex justify-content-center align-items-center mb-2">
                <div class="square ratio-1x1 bg-primary profile">
                    <img src="{{ $user->avatar ?? 'https://ui-avatars.com/api/?background=00754b&color=fff&name=' . $user->name }}"
                        alt="Avatar" class="img-fluid avatar-image" />
                </div>
            </div>

            <h1 class="fw-bold text-primary text-center mb-0">{{ $user->name }}</h1>
            <p class="text-muted text-center">{{ '@'. $user->username . ' | ' . $user->email }}</p>

            <div class="d-flex flex-column justify-content-center align-items-center mt-4 gap-2">
                <a href="{{ route('profile.edit') }}" class="btn btn-secondary w-100" title="Edit">Edit Profile</a>
                <a href="{{ route('profile.ticket') }}" class="btn btn-secondary w-100">Tiket</a>
                <a href="{{ route('profile.transaction') }}" class="btn btn-secondary w-100">Riwayat Donasi</a>

                <hr class="w-100">

                <form action="{{ route('profile.destroy') }}" method="POST" class="w-100">
                    @csrf
                    <button type="submit" class="btn btn-danger w-100">Logout</button>
                </form>
            </div>
        </div>
    </section>
</x-layouts.user-layout>