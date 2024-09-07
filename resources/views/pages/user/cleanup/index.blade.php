<x-layouts.user-layout title="CleanUp"
    description="Inisiatif untuk membersihkan lingkungan kita. Ajukan campaign dan vote untuk mendukung aksi."
    :vite="['resources/js/pages/user/cleanup/index.js']">

    <section class="card rounded-3 border-0 p-0">

        <div class="card-body">
            <div class="map-placeholder">
                <div id="map" class="map">
                </div>
                <a href="{{ route('cleanup.create') }}" class="btn btn-primary btn-add"> <i class="fa-solid fa-plus"
                        title="Tambah Campaign"></i> Tambah Campaign
                </a>
            </div>

            <div class="modal" id="campaignModal" tabindex="-1">
                <div class="modal-dialog modal-dialog-scrollable border-0 rounded-3">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="campaignModalTitle">Campaign Title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Content will be filled by JavaScript -->
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>

    <!-- Location List Section -->
    <section class="card rounded-3 border-0 mt-4">
        <div class="card-body">
            <h5 class="text-primary fs-5 mb-0">#Trending</h5>
            <h2 class="fs-2 fw-bold mt-0">Daftar Campaign</h2>
            <p>
                Daftar Campaign yang sedang trending. Vote untuk mendukung aksi ini agar terealisasi. Semakin tinggi
                passing grade, semakin besar kemungkinan campaign dapat dijadikan sebagai lokasi CleanUp.
            </p>

            <div class="row">
                <div class="table-responsive">
                    <table id="campaign" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Lokasi</th>
                                <th>Vote</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </section>
</x-layouts.user-layout>