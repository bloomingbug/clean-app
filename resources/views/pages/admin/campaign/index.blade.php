<x-layouts.admin-layout title="Campaign" :vite="['resources/js/pages/admin/campaign/index.js']">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @can('campaign.create')
                    <a href="{{ route('admin.campaign.create') }}" class="btn btn-primary">
                        <i class="fa-solid fa-plus"></i>Tambah
                    </a>
                    @endcan
                    <div class="row">
                        <div class="table-responsive">
                            <table id="datatable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Nama</th>
                                        <th>Deskripsi</th>
                                        <th>Lokasi</th>
                                        <th>Diajukan Oleh</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.admin-layout>