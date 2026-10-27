<!doctype html>
<html lang="en">

<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="<?= base_url() ?>/assets/frontend/login/css/style.css">

</head>

<body>

  <body class="img js-fullheight" style="background-image: url(<?= base_url() ?>/assets/frontend/login/images/bg.jpg);">


    <main class="d-flex min-vh-100 align-items-center p-4 p-md-0">

      <div class="container">
        <div class="row">
          <div class="col-md-6 intro-section">
            <div class="intro-content-wrapper">
              <div class="brand-wrapper">

              </div>
              <br></br><br></br>
              <h1 class="intro-title " style="color: #fff">Silahkan Login!</h1>
              <p class="mb-4">Jika Belum memiliki akun ,silahkan daftar dan silahkan login <br>untuk melakukan pemesanan.</p>
              <a href="<?= site_url('registrasi') ?>" class="btn btn-info" style="color: #fff">  Buat Akun   </a>
            </div>
          </div>
          <div class="col-md-6 form-secion">
            <br></br><br></br>
            <div class="login-wrapper">
              <h2 class="login-title" style="color: #fff">Log in</h2>
              <form action="userlogin/ceklogin" class="signin-form" method='post'>
                <div class="form-group">
                  <input type="text" class="form-control <?php if (session()->getFlashdata('user')) {
                                                            echo "is-invalid";
                                                          } ?>" name="username" id="username" placeholder="Username" required>
                  <div class="invalid-feedback">Username tidak ditemukan</div>
                </div>
                <div class="form-group">
                  <input id="password-field" type="password" class="form-control <?php if (session()->getFlashdata('pwd')) {
                                                                                    echo "is-invalid";
                                                                                  } ?>" id="password" name="password" placeholder="Password" required>
                  <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                  <div class="invalid-feedback">Password Salah</div>
                </div>
                <div class="form-group">
                  <button type="submit" class="form-control btn btn-primary submit px-3" value="Login">Sign In</button>
                </div>
                <div class="form-group d-md-flex">
                  <div class="w-50">

                    </label>
                  </div>
                  <div class="w-50 text-md-right">
                    <a href="<?= site_url('registrasi') ?>" style="color: #fff">Belum punya akun? Buat Akun</a>
                  </div>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
      </section>
    </main>
    <script src="<?= base_url() ?>/assets/frontend/login/js/jquery.min.js"></script>
    <script src="<?= base_url() ?>/assets/frontend/login/js/popper.js"></script>
    <script src="<?= base_url() ?>/assets/frontend/login/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>/assets/frontend/login/js/main.js"></script>

  </body>

</html>