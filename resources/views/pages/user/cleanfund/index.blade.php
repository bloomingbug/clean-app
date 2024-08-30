<x-layouts.user-layout title="CleanFund"
    description="Berikan donasi Anda untuk mendukung kampanye yang berarti. Bersama-sama, kita bisa menciptakan dampak positif bagi lingkungan."
    :vite="['resources/js/pages/user/cleanfund/index.js']">

    <section class="card rounded-3 border-0 p-0">
        <div class="card-body">
            <form action="/cleanfund" method="get">
                <div class="form-group d-flex justify-content-between align-content-center gap-3">
                    <input type="text" class="form-control" id="keyword" name="keyword"
                        placeholder="Cari berdasarkan nama campaign" value="{{request('keyword')}}">
                    <button type="submit" class="btn btn-primary">Cari</button>
                </div>
            </form>
        </div>
    </section>

    <section class="row mt-3 mt-md-4">
        @forelse ($campaigns as $campaign)
        <x-elements.card.donation :slug="$campaign->slug" :cover="$campaign->cover" :totalFund="$campaign->total_fund"
            :targetFund="$campaign->target_fund" :title="$campaign->title" :date="$campaign->due_date_fund"
            :city="$campaign->city->name" :province="$campaign->city->province->name" />
        @empty
        <p class="fs-4">Data campaign tidak ditemukan</p>
        @endforelse
    </section>

    <section class="mt-4">
        {{ $campaigns->links('vendor.pagination.bootstrap-5') }}
    </section>
</x-layouts.user-layout>