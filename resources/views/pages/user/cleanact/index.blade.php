<x-layouts.user-layout title="CleanAct"
    description="Daftarkan diri Anda untuk terjun langsung dalam aksi pembersihan lingkungan. Jadilah bagian dari perubahan nyata dan bantu kami menjaga bumi tetap bersih dan sehat."
    :vite="['resources/js/pages/user/cleanact/index.js']">

    <section class="card rounded-3 border-0 p-0">
        <div class="card-body">
            <form action="/cleanact" method="get">
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
        <x-elements.card.act :slug="$campaign->slug" :cover="$campaign->cover" :title="$campaign->title"
            :date="$campaign->due_date_volunteer" :total="$campaign->volunteers_count" :city="$campaign->city->name"
            :province="$campaign->city->province->name" />
        @empty
        <p class="fs-4">Data campaign tidak ditemukan</p>
        @endforelse
    </section>

    <section class="mt-4">
        {{ $campaigns->links('vendor.pagination.bootstrap-5') }}
    </section>
</x-layouts.user-layout>