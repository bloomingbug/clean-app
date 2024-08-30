<x-layouts.admin-layout title="Edit User" :vite="['resources/js/pages/admin/user/create.js']">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.user.update', $user->username) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama User</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ $user->name }}" placeholder="Masukan nama user">
                            <div id="name" class="invalid-feedback">
                                @error('name')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror"
                                id="username" name="username" value="{{ $user->username }}"
                                placeholder="Masukan username">
                            <div id="username" class="invalid-feedback">
                                @error('username')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control " id="email" value="{{ $user->email }}" disabled
                                readonly>
                        </div>

                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select name="role" id="role" class="form-select @error('role') is-invalid @enderror">
                                @forelse ($roles as $role)
                                @if ($user->hasRole($role->name))
                                <option value="{{ $role->name }}" selected>{{ $role->name }}</option>
                                @else
                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                                @endif
                                @empty
                                @endforelse
                            </select>
                            @error('role')
                            <div id="role" class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layouts.admin-layout>