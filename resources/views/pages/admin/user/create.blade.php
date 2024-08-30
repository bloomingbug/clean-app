<x-layouts.admin-layout title="Tambah User" :vite="['resources/js/pages/admin/user/create.js']">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.user.store') }}" method="post">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Nama User</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ old('name') }}" placeholder="Masukan nama user">
                            <div id="name" class="invalid-feedback">
                                @error('name')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror"
                                id="username" name="username" value="{{ old('username') }}"
                                placeholder="Masukan username">
                            <div id="username" class="invalid-feedback">
                                @error('username')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" value="{{ old('email') }}" placeholder="Masukan alamat email">
                            <div id="email" class="invalid-feedback">
                                @error('email')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select name="role" id="role" class="form-select @error('role') is-invalid @enderror">
                                <option value="" selected hidden disabled>Pilih Role</option>
                                @forelse ($roles as $role)
                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                                @empty
                                @endforelse
                            </select>
                            @error('role')
                            <div id="role" class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password" value="{{ old('password') }}"
                                placeholder="Masukan password">
                            <div id="password" class="invalid-feedback">
                                @error('password')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="passwordConfirmation" class="form-label">Konfirmasi Password</label>
                            <input type="password"
                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                id="passwordConfirmation" name="password_confirmation"
                                value="{{ old('password_confirmation') }}"
                                placeholder="Masukan kembali password sebelumnya">
                            <div id="password_confirmation" class="invalid-feedback">
                                @error('password_confirmation')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layouts.admin-layout>