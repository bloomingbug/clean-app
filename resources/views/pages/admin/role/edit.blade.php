<x-layouts.admin-layout title="Edit Role">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.role.update', $role->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Role</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ $role->name }}" placeholder="Masukan nama role">
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
                                            name="permissions[]" value="{{ $permission->name }}" {{
                                            in_array($permission->name, $role->permissions->pluck('name')->toArray()) ?
                                        'checked' : '' }}
                                        >
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

                        <button type="submit" class="btn btn-primary">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layouts.admin-layout>