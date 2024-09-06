<x-layouts.auth-layout title="Register" :vite="['resources/js/pages/auth/register.js']">
    <div class="col-12 col-md-6 col-lg-4">
        <div class="card rounded-3">
            <div class="card-body d-flex justify-content-center flex-column">
                <img src="{{ asset('images/logo.png') }}" alt="Logo CleanApp" class="logo-disdik mx-auto" />
                <hr />

                <h6 class="card-title text-center fs-6 fw-semibold mb-3">Yuk, Daftarkan Dirimu <br> Mari Berkontribusi
                    Nyata Bagi Bumi
                </h6>

                <div id="alert" class="alert alert-danger" style="display: none" role="alert">
                </div>

                <form method="post" id="formLogin">
                    <div class="form-group mb-3">
                        <label class="form-label" for="name">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="Masukan nama lengkap kamu" />
                        <div class="invalid-feedback d-block" id="name">
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label" for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email"
                            placeholder="Masukan alamat email kamu" autocomplete="username" required />
                        <div class="invalid-feedback d-block" id="email">
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label" for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Masukan password kamu" autocomplete="new-password" required />
                        <div class="invalid-feedback d-block" id="password">
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label" for="password_confirmation">Konfirmasi Password</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password"
                            placeholder="Masukan kembali password sebelumnya" />
                        <div class="invalid-feedback d-block" id="password_confirmation">
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <p class="form-label" for="gender" class="d-block">Jenis Kelamin</p>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="genderM" value="M" />
                            <label class="form-check-label" for="genderM">Laki-laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="genderF" value="F" />
                            <label class="form-check-label" for="genderF">Perempuan</label>
                        </div>
                        <div class="invalid-feedback d-block" id="gender">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3 w-100">
                        Daftar
                    </button>
                    <p class="text-sm text-center mt-1">Sudah punya akun? login <a href="{{ route('login.index') }}"
                            title="Daftar" class="text-decoration-none">disini</a></p>
                </form>
            </div>
        </div>
    </div>
</x-layouts.auth-layout>