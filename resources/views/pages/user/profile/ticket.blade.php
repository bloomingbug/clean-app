<x-layouts.user-layout titleMeta="Tiket" :vite="['resources/js/pages/user/profile/index.js']">

    <section class="card rounded-3 border-0 p-0">
        <div class="card-body">
            <div class="row">
                <div class="table-responsive">
                    <table id="tableTicket" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tiket</th>
                                <th>Campaign</th>
                                <th>Tanggal</th>
                                <th>Lokasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</x-layouts.user-layout>