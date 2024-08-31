<x-layouts.admin-layout title="Role" :vite="['resources/js/pages/admin/role/index.js']">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @can('role.add')
                    <a href="{{ route('admin.role.create') }}" class="btn btn-primary">
                        <i class="fa-solid fa-plus"></i>Tambah
                    </a>
                    @endcan
                    <div class="table-responsive">
                        <table id="datatable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Permission</th>
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
</x-layouts.admin-layout>