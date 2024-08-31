<x-layouts.admin-layout title="Tambah Role">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.role.store') }}" method="post">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Role</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ old('name') }}" placeholder="Masukan nama role">
                            <div id="name" class="invalid-feedback">
                                @error('name')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="permissions" class="form-label">Permissions</label>
                            <div class="row">
                                @forelse ($permissions as $permission)
                                <div class="col-6 col-md-4 col-lg-3">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="{{ $permission->name }}"
                                            name="permissions[]" value="{{ $permission->name }}">
                                        <label class="form-check-label" for="{{ $permission->name }}">{{
                                            $permission->name
                                            }}</label>
                                    </div>

                                </div>
                                @empty

                                @endforelse
                            </div>
                            @error('permissions')
                            <div id="permissions" class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layouts.admin-layout>