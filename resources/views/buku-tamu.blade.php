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
    <title>Buku Tamu - Clean App</title>
  </head>
  <body class="survei-page">
    <main class="container">
      <div class="row d-flex justify-content-center align-items-center form">
        <div class="col-12 col-md-4">
          <div class="card rounded-3">
            <div class="card-body d-flex justify-content-center flex-column">
              <img
                src="{{ asset('images/logo-disdik.png') }}" alt="Logo-disdik"
                class="logo-disdik mx-auto"
              />
              <hr />
              <h6 class="card-title text-center fs-5 fw-bolder">Buku Tamu</h6>
              <form action="proses.php" method="post">
                <div class="form-group my-1">
                  <label for="name">Nama Lengkap</label>
                  <input
                    type="text"
                    class="form-control"
                    id="name"
                    name="name"
                    placeholder="Nama lengkap..."
                    required
                  />
                </div>
                <div class="form-group my-1">
                  <label for="nik">NIK</label>
                  <input
                    type="text"
                    class="form-control"
                    id="nik"
                    name="nik"
                    placeholder="Alamat Email..."
                    required
                  />
                </div>
                <div class="form-group my-1">
                  <label for="bagian">Bagian</label>
                  <select class="form-select" id="bagian">
                    <option selected disabled hidden>Pilih...</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                </div>
                <div class="form-group my-1">
                  <label for="tujuan">Keperluan</label>
                  <textarea
                    class="form-control"
                    id="tujuan"
                    name="tujuan"
                    rows="2"
                    placeholder="Tujuan Kunjungan..."
                    required
                  ></textarea>
                </div>
                <button type="submit" class="btn mt-4 kirim w-100">
                  Kirim
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </main>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  </body>
</html>
