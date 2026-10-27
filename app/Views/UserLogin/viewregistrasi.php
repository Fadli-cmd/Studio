<!doctype html>
<html lang="en">

<head>
    <title>Daftar</title>
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
                            <br></br><br></br><br></br><br></br>
                            <h1 class="intro-title " style="color: #fff">Daftar</h1>
                            <p class="mb-4">Silahkan isi data yang diperlukan <br>untuk melakukan pemesanan.</p>
                            <a href="<?= site_url('userlogin') ?>" class="">Sudah Punya Akun?<br><br><br><br></a>
                        </div>
                    </div>
                    <div class="col-md-6 form-secion">
                        <br></br><br></br>
                        <div class="login-wrapper">
                            <h2 class="login-title" style="color: #fff">Daftar</h2>
                            <form action="registrasi/save" class="signin-form" method='post'>

                                <div class="form-group">
                                    <input class="form-control 
                                    <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" type="username" name='username' required="" placeholder="Username">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('username'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input class="form-control
                                    <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" type="text" name='email' required="" placeholder="Email">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('email'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input class="form-control
                                    <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" type="textarea" name='alamat' required="" placeholder="Alamat">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('alamat'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input class="form-control
                                    <?= ($validation->hasError('telp')) ? 'is-invalid' : ''; ?>" type="text" name='telp' required="" placeholder="Telp">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('telp'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input id="password-field" type="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" name="password" placeholder="Password" required>
                                    <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                    <div class="invalid-feedback">
                                    <?= $validation->getError('password'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input id="passwordconfirm-field" type="password" class="form-control <?= ($validation->hasError('confirmpassword')) ? 'is-invalid' : ''; ?>" name="passwordconfirm" placeholder="Confirm Password" required>
                                    <span toggle="#passwordconfirm-field" class="fa fa-fw fa-eye field-icon toggle-passwordconfirm"></span>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('confirmpassword'); ?>
                                    </div>
                                </div>
                                <div class="form-group text-center row m-t-20">
                                    <div class="col-12">
                                        <button class="form-control btn btn-primary submit px-3" type="submit">Register</button>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </main>
    </body>
</body>


<script src="<?= base_url() ?>/assets/frontend/login/js/jquery.min.js"></script>
<script src="<?= base_url() ?>/assets/frontend/login/js/popper.js"></script>
<script src="<?= base_url() ?>/assets/frontend/login/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>/assets/frontend/login/js/main.js"></script>

<script>
    $(".toggle-passwordconfirm").click(function() {

        // alert('test');
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });
</script>
</body>

</html>