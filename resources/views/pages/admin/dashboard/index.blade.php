<x-layouts.admin-layout title="Dashboard" :vite="['resources/js/pages/admin/dashboard/index.js']">
    <div class="row mb-4">
        <div class="col-12 col-md-6 col-lg-4 my-2">
            <div class="card border-0 rounded-4">
                <div class="card-body">
                    <h6 class="fw-semibold mb-2">Campaign Butuh Approval</h6>
                    <h3 class="fw-bold text-primary">{{ $campaignNeedApproval }}</h>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4 my-2">
            <div class="card border-0 rounded-4">
                <div class="card-body">
                    <h6 class="fw-semibold mb-2">Campaign Butuh Set Fund</h6>
                    <h3 class="fw-bold text-primary">{{ $campaignNeedFund }}</h>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4 my-2">
            <div class="card border-0 rounded-4">
                <div class="card-body">
                    <h6 class="fw-semibold mb-2">Campaign Butuh Set Volunteer</h6>
                    <h3 class="fw-bold text-primary">{{ $campaignNeedVolunteer }}</h>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card border-0 rounded-4">
                <div class="card-body">
                    <h4 class="fw-semibold mb-3">Campaign Baru Ditambahkan</h4>
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Lokasi</th>
                                    <th>Pembuat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($newestCampaigns as $index => $campaign)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $campaign->title }}</td>
                                    <td>{{ $campaign->city->name . ', ' . $campaign->city->province->name }}</td>
                                    <td>{{ $campaign->proposedBy->name }}</td>
                                    <td>
                                        <a href="{{ route('cleanup.show', $campaign->slug) }}"
                                            class="btn btn-info btn-sm">Detail</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.admin-layout>