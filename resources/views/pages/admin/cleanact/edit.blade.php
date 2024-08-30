<x-layouts.admin-layout title="Edit Campaign">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.cleanact.update', $campaign->slug) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label for="targetVolunteer" class="form-label">Target Jumlah Volunteer</label>
                            <input type="number" inputmode="numeric"
                                class="form-control @error('target_volunteer') is-invalid @enderror"
                                id="targetVolunteer" name="target_volunteer" value="{{ $campaign->target_volunteer }}"
                                placeholder="Masukan target jumlah volunteer">
                            <div id="target_volunteer" class="invalid-feedback">
                                @error('target_volunteer')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="dueDateVolunteer" class="form-label">Tanggal Penutupan Pendaftaran
                                Volunteer</label>
                            <input type="date" class="form-control @error('due_date_volunteer') is-invalid @enderror"
                                id="dueDateVolunteer" name="due_date_volunteer"
                                value="{{ $campaign->due_date_volunteer }}">
                            <div id="due_date_volunteer" class="invalid-feedback">
                                @error('due_date_volunteer')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layouts.admin-layout>