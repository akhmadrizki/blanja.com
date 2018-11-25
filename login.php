<?php
// connect database
require 'core/init.php';

// cek tombol login udh di pencet apa blm
if( isset($_POST["login"]) ){

    $username = $_POST["username"];
    $_SESSION["user"] = $username;
    $password = $_POST["password"];

    $result = mysqli_query($db, "SELECT * FROM users WHERE username = '$username'");

    // cek username
    if( mysqli_num_rows($result) === 1 ){
        // cek password
        $row = mysqli_fetch_assoc($result);
        $_SESSION["pelanggan"] = $row;
        $cekpas = password_verify($password, $row["password"]);

        if( $cekpas ){

            // set session
            $_SESSION["login"] = true;

            // multi level logic
            if($row['level'] == "admin"){
                header("Location: admin.php");
            } else if($row['level'] == "pelanggan"){
                header("Location: index.php");
            }

            exit;
        }
    }

    $error = true;

}


?>

<!doctype html>
<html lang="en">
  <head>
    <title>Halaman Login</title>
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
                <div class="row">
                    <div class="col-md-6 mx-auto">

                        <!-- form card login -->
                        <div class="card rounded-0">
                            <div class="card-header">
                                <h3 class="mb-0 text-center">Login</h3>
                                <p class="text-center">Belum punya akun Blanja ? <a href="register.php">Daftar</a></p>
                            </div>
                            <div class="card-body">
                                <?php if( isset($error) ) : ?>
                                    <p class="font-italic text-danger">Username atau Password Salah!</p>
                                <?php endif; ?>
                                <form class="form" action="" method="post">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" name="username" id="username" class="form-control form-control-lg rounded-0" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" id="password" class="form-control form-control-lg rounded-0" required>
                                    </div>
                                    <div>

                                      <!-- <input type="checkbox" aria-label="Checkbox for following text input">
                                      <span class="custom-control-description small text-dark">Remember me</span> -->
                                    </div>
                                    <button type="submit" name="login" class="btn btn-primary btn-block float-right">Login</button>
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

