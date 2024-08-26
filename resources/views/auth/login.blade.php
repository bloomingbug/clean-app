<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Login Admin - Clean App</title>
  <link rel="shortcut icon" href="images/favicon.ico" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preload" as="style"
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,700&display=swap"
    rel="stylesheet">
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,700&display=swap"
    rel="stylesheet">
  @vite(['resources/js/app.js', 'resources/js/pages/auth/login.js'])
</head>

<body class="auth-page">
  <main class="container-fluid vh-100">
    <div class="vh-100 row d-flex justify-content-center align-items-center">
      <div class="col-12 col-md-4">
        <div class="card rounded-3">
          <div class="card-body d-flex justify-content-center flex-column">
            <img src="{{ asset('images/Log-Clean-App2.png') }}" alt="Logo CleanApp" class="logo-disdik mx-auto" />
            <hr />
            <h6 class="card-title text-center fs-6 fw-semibold mb-3">Yuk, Login Dulu <br> Buat Pake CleanApp</h6>
            <form method="post" id="formLogin">
              <div class="form-group mb-2">
                <label for="email">Username/Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email address"
                  autocomplete="username" />
                <div class="invalid-feedback d-block" id="email">
                </div>
              </div>
              <div class="form-group mb-2">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                  autocomplete="current-password" />
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
            </form>
          </div>
        </div>
      </div>
    </div>

    <img src="/images/login-illustration.svg" alt="" class="illustration">
  </main>
</body>

</html>