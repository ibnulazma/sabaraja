<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url() ?>/style.css">

    <title>Login | SIAKAD INSAN KAMIL</title>

</head>

<body>





    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="row border  p-3 bg-white shadow box-area">
            <div class="col-md-6  d-flex justify-content-center align-items-center flex-column left-box kerangka">
                <div class="featured-image">
                    <img src="<?= base_url() ?>/foto/logo.png" alt="" width="150px" class="img-fluid logo">
                </div>
                <small class="selamat">SELAMAT DATANG</small>
                <small class="text-white text-wrap " style="font-weight: 500; font-size: 20px;">Sistem Informasi Akademik</small>
                <small class="text-white text-wrap " style="font-weight: 900; font-size: 20px;">SMP INSAN KAMIL</small>
            </div>
            <div class="col-md-6 right-box">
                <div class="row align-items-center">
                    <div class="header-text">
                        <h5 style="font-weight:900;">Hello Admin !!</h5>
                        <p>Please Login To Your Account!!</p>
                    </div>
                </div>

                <?php

                $errors = session()->getFlashdata('errors');
                ?>
                <?php if (session()->getFlashdata('pesan')) {
                    echo '<div class="alert alert-success" role="alert">';
                    echo  session()->getFlashdata('pesan');
                    echo ' </div>';
                } elseif (session()->getFlashdata('error')) {
                    echo '<div class="alert alert-danger" role="alert">';
                    echo '<small>';
                    echo session()->getFlashdata('error');
                    echo '</small>';
                    echo ' </div>';
                } ?>
                <form action="<?= base_url('auth/loginAdmin') ?>" method="POST">
                    <div class="form-floating mb-3">
                        <input type="text" name="username" class="form-control  bg-light <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" placeholder="Username">
                        <label for="">Username</label>
                        <div class="invalid-feedback">
                            <small>
                                <?= $validation->getError('username'); ?>
                            </small>
                        </div>
                    </div>
                    <div class="form-floating mb-1">
                        <input type="password" name="password" class=" form-control bg-light <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" placeholder="Password" id="Show">
                        <label for="">Password</label>
                        <div class="invalid-feedback">
                            <small>
                                <?= $validation->getError('password'); ?>
                            </small>
                        </div>
                    </div>
                    <div class="input-grup mb-3 d-flex justify-content-between">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" id="exampleCheck1" onclick="myFunction()">
                            <label class="form-check-label  show-pass" for="flexCheckDefault">
                                Show Password
                            </label>
                        </div>
                        <p class="forgot"><a href="">Forgot Password??</a></p>
                    </div>
                    <div class="input-grup mb-5 ">
                        <div class="input-group">
                            <button type="submit" class="btn btn-primary w-100">Sign In</button>
                        </div>
                    </div>
                </form>
                <small> Are You Teacher??? <a href="<?= base_url('auth/loginguru') ?>">Please Login</a></small>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>



    <script type="text/javascript">
        function myFunction() {
            var show = document.getElementById('Show');
            if (show.type == 'password') {
                show.type = 'text';
            } else {
                show.type = 'password';
            }
        }
    </script>

    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideDown(500, function() {
                $(this).remove();
            });
        }, 2000);
    </script>

</body>

</html>