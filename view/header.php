<?php
  
  require 'functions/db.php';

?>

<!doctype html>
<html>
  <head>
    <title>Blanja.com | Blanja Mudah dan Nyaman</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="author" content="AkhmadRizki">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="view/css/bootstrap.css">
    <link rel="stylesheet" href="view/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="view/css/style.css">
    <link rel="icon" href="view/images/icon.png">
    <script type="text/javascript" src="view/js/jquery-3.3.1.min.js"></script>
  </head>
  <body>

  
  <div class="alert alert-dark fade show mb-0" role="alert">
    <div class="container">
    <strong>Discount 50%</strong> Jika Anda Membeli 3 Product Kami.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    </div>
  </div>



    <div class="top-header">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-6 col-sm-5 py-2 pembatas">

            <ul class="nav">
              <li class="nav-item text-white">
                <a class="nav-link"><i class="fa fa-envelope-o"></i>&nbsp;<span class="size-mail">contact@blanja.com</span></a>
              </li>
              
              
              <form class="d-none d-lg-block form-inline ml-lg-auto ml-md-0 pt-2">
                <div class="input-group">
                  <input type="text" class="cari rounded-left" placeholder="Search..." aria-label="search" aria-describedby="basic-addon1">
                  <div class="input-group-prepend">
                    <span class="input-group-text rounded-right tmbl-cari" id="basic-addon1"><i class="fa fa-search"></i></span>
                  </div>
                </div>
              </form>
            </ul>

          </div>

          <div class="col-lg-4 col-md-6 col-sm-7 py-2">
            <div class="dropdown float-left">
              <button class="btn color-button dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-user"></i>&nbsp;

                  <!-- jika sudah login -->
                  <?php if( isset($_SESSION["pelanggan"]) ): ?>
                    <?= $_SESSION['user']; ?>
                  <!-- belum login -->
                  <?php else: ?>
                    Account
                  <?php endif; ?>

              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenu2">

                <!-- jika sudah login -->
                <?php if( isset($_SESSION["pelanggan"]) ): ?>
                  <a class="dropdown-item" href="./logout.php">Logout</a>
                <!-- belum login -->
                <?php else: ?>
                  <a class="dropdown-item" href="./login.php">Login</a>
                <?php endif; ?>


                <!-- jika sudah login -->
                <?php if( isset($_SESSION["pelanggan"]) ): ?>

                <!-- belum login -->
                <?php else: ?>
                  <a class="dropdown-item" href="./register.php">Register</a>
                <?php endif; ?>


                
              </div>
            </div>

           <a href="mycart.php">
            <button type="button" class="btn clr-chart float-right">
              <i class="fa fa-shopping-basket"></i>&nbsp;My Cart 
            </button>
           </a>
          </div>

        </div>
        <!-- end row -->
      </div>
    </div>
    <!-- end top header -->
    
    <div class="header py-1">
      <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark">
          <a class="navbar-brand" href="#">
            <img src="view/images/logo.png" title="Blanja.com" alt="logo" width="180">
          </a>
          <button class="navbar-toggler clr-chart" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link text-uppercase text-danger" href="index.php">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-uppercase" href="404.php">shop</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-uppercase" href="404.php">blog</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-uppercase" href="404.php">contact</a>
              </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="search" placeholder="write something down ..." aria-label="Search">
              <button class="btn clr-cari2 my-2 my-sm-0" type="submit">Search</button>
            </form>
          </div>
        </nav>
      </div>
    </div>

    