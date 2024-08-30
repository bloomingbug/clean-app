<x-layouts.admin-layout title="Edit Campaign">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.cleanfund.update', $campaign->slug) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label for="targetFunding" class="form-label">Target Funding</label>
                            <input type="number" inputmode="numeric"
                                class="form-control @error('target_fund') is-invalid @enderror" id="targetFunding"
                                name="target_fund" value="{{ $campaign->target_fund }}"
                                placeholder="Masukan target jumlah funding">
                            <div id="target_fund" class="invalid-feedback">
                                @error('target_fund')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="dueDateFund" class="form-label">Tanggal Penutupan Funding
                                Volunteer</label>
                            <input type="date" class="form-control @error('due_date_fund') is-invalid @enderror"
                                id="dueDateFund" name="due_date_fund" value="{{ $campaign->due_date_fund }}">
                            <div id="due_date_fund" class="invalid-feedback">
                                @error('due_date_fund')
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