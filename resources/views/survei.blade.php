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
              <h6 class="card-title text-center fs-5 fw-bolder mt-2">
                Seberapa Puas Anda dengan Pelayanan yang Kami Berikan?
              </h6>
              <form action="">
                <div class="d-flex justify-content-center align-items-center">
                  <div class="ket-bintang">Sangat Tidak Sesuai</div>
                  <div class="d-flex flex-nowrap mx-1">
                    <div class="ratingControl">
                      <input
                        type="radio"
                        id="rating-5"
                        name="rating"
                        value="5"
                      />
                      <label
                        class="ratingControl-stars ratingControl-stars--5"
                        for="rating-5"
                        >5</label
                      >
                      <input
                        type="radio"
                        id="rating-45"
                        name="rating"
                        value="4.5"
                      />
                      <label
                        class="ratingControl-stars ratingControl-stars--45 ratingControl-stars--half"
                        for="rating-45"
                        >45</label
                      >
                      <input
                        type="radio"
                        id="rating-4"
                        name="rating"
                        value="4"
                      />
                      <label
                        class="ratingControl-stars ratingControl-stars--4"
                        for="rating-4"
                        >4</label
                      >
                      <input
                        type="radio"
                        id="rating-35"
                        name="rating"
                        value="3.5"
                      />
                      <label
                        class="ratingControl-stars ratingControl-stars--35 ratingControl-stars--half"
                        for="rating-35"
                        >35</label
                      >
                      <input
                        type="radio"
                        id="rating-3"
                        name="rating"
                        value="3"
                      />
                      <label
                        class="ratingControl-stars ratingControl-stars--3"
                        for="rating-3"
                        >3</label
                      >
                      <input
                        type="radio"
                        id="rating-25"
                        name="rating"
                        value="2.5"
                      />
                      <label
                        class="ratingControl-stars ratingControl-stars--25 ratingControl-stars--half"
                        for="rating-25"
                        >25</label
                      >
                      <input
                        type="radio"
                        id="rating-2"
                        name="rating"
                        value="2"
                      />
                      <label
                        class="ratingControl-stars ratingControl-stars--2"
                        for="rating-2"
                        >2</label
                      >
                      <input
                        type="radio"
                        id="rating-15"
                        name="rating"
                        value="1.5"
                      />
                      <label
                        class="ratingControl-stars ratingControl-stars--15 ratingControl-stars--half"
                        for="rating-15"
                        >15</label
                      >
                      <input
                        type="radio"
                        id="rating-1"
                        name="rating"
                        value="1"
                      />
                      <label
                        class="ratingControl-stars ratingControl-stars--1"
                        for="rating-1"
                        >1</label
                      >
                      <input
                        type="radio"
                        id="rating-05"
                        name="rating"
                        value="0.5"
                      />
                      <label
                        class="ratingControl-stars ratingControl-stars--05 ratingControl-stars--half"
                        for="rating-05"
                        >05</label
                      >
                    </div>
                  </div>
                  <div class="ket-bintang">Sangat Sesuai</div>
                </div>
                <p class="mt-2 mb-1">Alasannya</p>
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    value=""
                    id="flexCheckDefault"
                  />
                  <label class="form-check-label alasan" for="flexCheckDefault">
                    Alasan Pertama
                  </label>
                </div>
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    value=""
                    id="flexCheckDefault"
                  />
                  <label class="form-check-label alasan" for="flexCheckDefault">
                    Alasan Kedua
                  </label>
                </div>
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    value=""
                    id="flexCheckDefault"
                  />
                  <label class="form-check-label alasan" for="flexCheckDefault">
                    Alasan Ketiga
                  </label>
                </div>
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    value=""
                    id="flexCheckDefault"
                  />
                  <label class="form-check-label alasan" for="flexCheckDefault">
                    Alasan Keempat
                  </label>
                </div>
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    value=""
                    id="flexCheckDefault"
                  />
                  <label class="form-check-label alasan" for="flexCheckDefault">
                    Alasan Kelima
                  </label>
                </div>
                <div class="form-check">
                  <input
                    class="form-check-input"
                    name="lainnya"
                    type="checkbox"
                    value=""
                    id="lainnya"
                  />
                  <label class="form-check-label alasan" for="lainnya">
                    Lainnya
                  </label>
                  <div class="form-group my-1">
                    <textarea
                      class="form-control d-none"
                      id="isiLainnya"
                      name="isiLainnya"
                      rows="2"
                      placeholder="Alasan Lainnya..."
                      required
                    ></textarea>
                  </div>
                </div>
                <button type="submit" class="btn mt-4 kirim w-100" id="">
                  Kirim
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </main>
    <script src="{{ asset('vendor/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('scripts/formLainnya.js') }}"></script>
  </body>
</html>
