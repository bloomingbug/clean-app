<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.ico" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="{{ asset('styles/style.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <title>Survei Pelayanan - Clean App</title>
  </head>
  <body class="survei-page">
    <main class="container">
      <div class="row d-flex justify-content-center align-items-center form">
        <div class="col-12 col-md-4">
          <div class="card rounded-3">
            <div class="card-body d-flex justify-content-center flex-column">
              <img src="{{ asset('images/ilustrasi-1.png') }}" alt="Ilustrasi Selamat Datang" class="mx-auto w-100" />
              <h6 class="card-title text-center fs-6 fw-bolder mt-2 mb-3">Survei Kepuasan Pengguna</h6>
              <p class="fs-6 mb-2">Kami meminta anda untuk mengisi survei kepuasan pengguna sebagai evaluasi layanan yang kami berikan.</p>
              <p class="fs-6">Pengisian survei akan memakan waktu beberapa menit.</p>
              <a href="#" class="btn kirim w-100"> Selanjutnya </a>
              <hr />
              <div class="d-flex align-items-center">
                <img src="{{ asset('images/logo-disdik.png') }}" alt="Logo Disdik"class="logo-disdik-footer" />
                <div class="ms-2">
                  <p class="mb-0 text-footer lh-sm">Survei dilakukan oleh</p>
                  <p class="fw-bolder mb-0 text-footer lh-sm">Dinas Pendidikan Kabupaten Bekasi</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  </body>
</html>
