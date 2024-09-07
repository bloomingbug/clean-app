<x-layouts.admin-layout title="User" :vite="['resources/js/pages/admin/user/index.js']">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @can('user.create')
                    <a href="{{ route('admin.user.create') }}" class="btn btn-primary">
                        <i class="fa-solid fa-plus"></i>Tambah
                    </a>
                    @endcan

                    <div class="row">
                        <div class="table-responsive">
                            <table id="datatable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Role</th>
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