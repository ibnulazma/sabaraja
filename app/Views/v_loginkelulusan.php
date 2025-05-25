<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url() ?>/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Login | Kelulusan</title>

</head>

<body>





    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="" style="margin-top: -200px;">
            <form action="<?= base_url('auth/ceklulus') ?>" method="POST">
                <div class="featured-image text-center mb-3">
                    <img src="<?= base_url() ?>/foto/logo.png" alt="" class="img-fluid logo" width="100px">
                </div>

                <div class="text-center mb-3">
                    <h4 style="font-weight:900;">Pengumuman Kelulusan</h4>
                    <h5 style="font-weight:900;">SMP INSAN KAMIL</h5>
                    <h5 style="font-weight:900;">Tahun 2024/2025</h5>
                </div>
                <div class=" row p-3 bg-white shadow box-area2 ">
                    <h5 style="font-weight:900; font-size:20px;" class="mb-4 text-center">Cek Hasil Kelulusan </h5>
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
                    <div class=" mb-3">
                        <label for="" class="mb-2">Masukkan NISN :</label>
                        <input type="password" name="nisn" class="form-control bg-light <?= ($validation->hasError('nisn')) ? 'is-invalid' : ''; ?>" placeholder="" id="Show">
                        <div class="invalid-feedback">
                            <small>
                                <?= $validation->getError('nisn'); ?>
                            </small>
                        </div>
                    </div>
                    <div class="input-grup ">
                        <div class="input-group">
                            <button type="submit" class="btn btn-primary w-100">Sign In</button>
                        </div>
                    </div>
                </div>
            </form>
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