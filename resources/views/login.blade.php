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
    <title>Login Admin - Clean App</title>
  </head>
  <body class="survei-page">
    <main class="container">
      <div class="row d-flex justify-content-center align-items-center form">
        <div class="col-12 col-md-4">
          <div class="card rounded-3">
            <div class="card-body d-flex justify-content-center flex-column">
              <img
                src="{{ asset('images/logo-disdik.png') }}" alt="Logo Disdik"
                class="logo-disdik mx-auto"
              />
              <h4 class="mb-0 mt-2 fs-6 text-center">Sistem Penilaian</h4>
              <h4 class="mb-0 fs-6 text-center">Kepuasan Pengguna</h4>
              <hr />
              <h6 class="card-title text-center fs-5 fw-bolder">Masuk</h6>
              <form action="proses.php" method="post">
                <div class="form-group my-1">
                  <label for="email">Username/Email</label>
                  <input
                    type="text"
                    class="form-control"
                    id="email"
                    name="email"
                    placeholder="example@email.com"
                    required
                  />
                </div>
                <div class="form-group my-1">
                  <label for="password">Password</label>
                  <input
                    type="password"
                    class="form-control"
                    id="password"
                    name="password"
                    placeholder="Password"
                    required
                  />
                </div>
                <button type="submit" class="btn mt-4 kirim w-100">
                  Masuk
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
