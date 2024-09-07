<x-layouts.user-layout :titleMeta="'Edit Profile ' . $user->name">

    <section class="card rounded-3 border-0 p-0">
        <div class="card-body">
            <h1 class="fs-3 fw-bold text-primary">Edit Profile</h1>

            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group mb-3">
                    <label for="name" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                    <input type="text" name="name" id="name" @if(old('name')) value="{{ old('name') }}" @else
                        value="{{ $user->name }}" @endif class="form-control @error('name') is-invalid @enderror"
                        placeholder="Masukan nama lengkap..." required autofocus>
                    @error('name')
                    <div id="name" class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="email" class="form-label">Email </label>
                    <input type="email" id="email" value="{{ $user->email }}" class="form-control" readonly disabled>
                </div>

                <div class="form-group mb-3">
                    <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
                    <input type="text" name="username" id="username" @if(old('username')) value="{{ old('username') }}"
                        @else value="{{ $user->username }}" @endif
                        class="form-control @error('username') is-invalid @enderror" placeholder="Masukan username..."
                        required>
                    @error('username')
                    <div id="username" class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <p class="form-label" for="gender" class="d-block">Jenis Kelamin</p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="genderM" value="M" />
                        <label class="form-check-label" for="genderM">Laki-laki</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="genderF" value="F" />
                        <label class="form-check-label" for="genderF">Perempuan</label>
                    </div>
                    @error('gender')
                    <div id="gender" class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="avatar" class="form-label">Avatar</label>
                    <input type="file" name="avatar" id="avatar" @if(old('avatar')) value="{{ old('avatar') }}" @else
                        value="{{ $user->avatar }}" @endif class="form-control @error('avatar') is-invalid @enderror">
                    @error('avatar')
                    <div id="avatar" class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="oldPassword" class="form-label">Password Lama (opsional)</label>
                    <input type="password" name="old_password" id="oldPassword"
                        class="form-control @error('old_password') is-invalid @enderror"
                        placeholder="Masukan password lama...">
                    @error('old_password')
                    <div id="oldPassword" class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="password" class="form-label">Password Baru (opsional)</label>
                    <input type="password" name="password" id="password"
                        class="form-control @error('password') is-invalid @enderror"
                        placeholder="Masukan password baru...">
                    @error('password')
                    <div id="password" class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="passwordConfirmation" class="form-label">Konfirmasi Password Baru (opsional)</label>
                    <input type="password" name="password_confirmation" id="passwordConfirmation"
                        class="form-control @error('password_confirmation') is-invalid @enderror"
                        placeholder="Masukan kembali password baru...">
                    @error('password_confirmation')
                    <div id="passwordConfirmation" class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">
                    Update
                </button>
            </form>
        </div>
    </section>
</x-layouts.user-layout>