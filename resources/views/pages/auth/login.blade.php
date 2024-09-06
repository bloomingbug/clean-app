<x-layouts.auth-layout title="Login" :vite="['resources/js/pages/auth/login.js']">
  <div class="col-12 col-md-4">
    <div class="card rounded-3">
      <div class="card-body d-flex justify-content-center flex-column">
        <img src="{{ asset('images/logo.png') }}" alt="Logo CleanApp" class="logo-disdik mx-auto" />
        <hr />

        <h6 class="card-title text-center fs-6 fw-semibold mb-3">Yuk, Login Dulu <br> Buat Pake CleanApp
        </h6>

        <div id="alert" class="alert alert-danger" style="display: none" role="alert">
        </div>

        <form method="post" id="formLogin">
          <div class="form-group mb-3">
            <label class="form-label" for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Masukan email kamu" required
              autocomplete="username" />
            <div class="invalid-feedback d-block" id="email">
            </div>
          </div>

          <div class="form-group mb-3">
            <label class="form-label" for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password"
              placeholder="Masukan password kamu" required autocomplete="current-password" />
            <div class="invalid-feedback d-block" id="password">
            </div>
          </div>

          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="true" id="remember" name="remember">
            <label class="form-check-label" for="remember">
              Ingat Saya
            </label>
          </div>

          <button type="submit" class="btn btn-primary mt-3 w-100">
            Masuk
          </button>
          <p class="text-sm text-center mt-1">Belum punya akun? daftar <a href="{{ route('register.index') }}"
              title="Daftar" class="text-decoration-none">disini</a></p>
        </form>
      </div>
    </div>
  </div>
</x-layouts.auth-layout>