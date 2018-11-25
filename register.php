<?php
// connect database
require 'core/init.php';

// jika tombol register dipencet
    if( isset($_POST["register"]) ){

        if( registrasi($_POST) > 0 ){

                echo "
                        <script>
                            alert('User Baru Telah Berhasil Ditambahkan!');
                            document.location.href='login.php';
                        </script>
                    ";
                exit;

        } else{
                mysqli_error($db);
            }

    }

?>

<!doctype html>
<html lang="en">
  <head>
    <title>Halaman Registrasi</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="view/css/bootstrap.css">
  </head>
  <body>

    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center text-dark mb-4">Halaman Registrasi</h2>
                <div class="row">
                    <div class="col-md-6 mx-auto">

                        <!-- form card login -->
                        <div class="card rounded-0">
                            <div class="card-header">
                                <h3 class="mb-0">Registrasi</h3>
                            </div>
                            <div class="card-body">
                                <form class="form" action="" method="post">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" name="username" id="username" class="form-control form-control-lg rounded-0" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" id="password" class="form-control form-control-lg rounded-0" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="konfirm_pass">Konfirmasi Password</label>
                                        <input type="password" name="konfirm_pass" id="konfirm_pass" class="form-control form-control-lg rounded-0" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Level</label>
                                          <select name="level" class="form-control form-control-lg rounded-0">
                                            <option value="none">- select level -</option>
                                            <option value="admin">admin</option>
                                            <option value="pelanggan">pelanggan</option>
                                          </select>
                                    </div>
                                    <div>
                                      <!-- <input type="checkbox" aria-label="Checkbox for following text input">
                                      <span class="custom-control-description small text-dark">Remember me</span> -->
                                    </div>
                                    <button type="submit" name="register" class="btn btn-primary btn-block float-right">Daftar</button>
                                </form>
                            </div>
                            <!--/card-block-->
                        </div>
                        <!-- /form card login -->

                    </div>


                </div>
                <!--/row-->

            </div>
            <!--/col-->
        </div>
        <!--/row-->
    </div>
    <!--/container-->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="view/js/bootstrap.js"></script>
  </body>
</html>

