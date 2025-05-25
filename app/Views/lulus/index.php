<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url() ?>/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Login | SIAKAD INSAN KAMIL</title>

</head>

<body>





    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="bg-white box-area2 ">
            <div class="card">
                <div class="card-header bg-primary text-white text-center">
                    Hasil Kelulusan
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush" style="font-weight: 500;">
                        <li class="list-group-item">
                            Nama Lengkap :<span style="float: right;"><?= $datasiswa['nama_siswa'] ?></span>

                        </li>
                        <li class="list-group-item">
                            TTL :<span style="float: right;"><?= $datasiswa['tempat_lahir'] ?>, <?= formatindo($datasiswa['tanggal_lahir']) ?></span>

                        </li>
                        <li class="list-group-item">
                            Nama Orang Tua :<span style="float: right;"><?= $datasiswa['nama_ayah'] ?></span>
                        </li>
                        <li class="list-group-item">
                            Dinyatakan :<span class="fw-bolder" style="float: right;text-shadow: 2px 2px rgb(75, 238, 11);">LULUS</span>
                        </li>
                    </ul>
                    <div class="tombol d-flex justify-content-between mt-3">
                        <button type="button" class="btn btn-danger btn-sm"> <i class="fa-solid fa-print"></i> Print SKL</button>
                        <button type="button" class="btn btn-info btn-sm "> <i class="fa-solid fa-print"></i> Print Transkrip</button>
                        <button type="button" class="btn btn-warning btn-sm "> <i class="fa-solid fa-print"></i> Print E-Ijazah</button>
                    </div>
                </div>
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