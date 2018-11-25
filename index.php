<?php

  require 'core/init.php';
  require 'view/header.php';
  
  // ambil data dri table
  $pelanggan = productpelanggan("SELECT * FROM products");

    if ( !$pelanggan ) {
      echo mysqli_error($db);
      exit;
    }

?>
    <div class="bg-main">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-8 col-sm-12 py-3">
            <div class="py-5">
                <h1 class="display-3 text-white text-right">Lorem ipsum dolor sit.</h1>
                
                <p class="text-white text-right">It uses utility classes for typography and spacing to space content.</p>
                <p class="lead text-right">
                  <a class="btn clr-btn-main btn-lg" href="#" role="button">Shop Now</a>
                  <a class="btn clr-btn-main-border btn-lg" href="#" role="button">Learn more</a>
                </p>
            </div>
          </div>

          <div class="d-none d-lg-block col-lg-6">
          </div>
        </div>
      </div>
    </div>
    <!-- end banner -->

    <div class="why-us">
      <div class="container">
        <div class="row">
          <div class="col-4 text-center text-white"><i class="fa fa-globe fa-3x pt-2"></i><h5>FREE SHIPPING</h5><p>Lorem ipsum dolor sit.</p></div>
          <div class="col-4 text-center text-white"><i class="fa fa-mobile fa-3x pt-2"></i><h5>CALL US ANYTIME</h5><p>Lorem ipsum dolor sit.</p></div>
          <div class="col-4 text-center text-white"><i class="fa fa-map-marker fa-3x pt-2"></i><h5>OUR LOCATION</h5><p>Lorem ipsum dolor sit.</p></div>
        </div>
      </div>
    </div>
    <!-- end why us -->

    <div class="container">
      <h2 class="mt-5 wr-title">Product Terbaru</h2>
      <div class="row py-5">

        <?php foreach ($pelanggan as $pelanggans) : ?>

          <div class="col-lg-3 col-md-6 col-sm-12 py-2">
            <div class="card img-bor">
              <img class="card-img-top" src="view/images/<?= $pelanggans['foto_products']; ?>" alt="Card image cap" style="height: 285px;">
              <div class="card-body">
                <h4 class="card-title"><?= $pelanggans['nama_products']; ?></h4>
                <p class="card-text"><?= $pelanggans['deskripsi_products']; ?></p>
                <a href="functions/cart.php?id_products=<?= $pelanggans['id_products']; ?>" class="btn clr-btn-main" name="addchartbtn"><i class="fa fa-shopping-cart"></i>&nbsp; Add To Cart</a>
                <div class="btn-group" role="group" aria-label="Third group">
                  <a href="detail.php?id_products=<?= $pelanggans['id_products']; ?>">
                    <button type="button" class="btn btn-secondary" title="view"><i class="fa fa-eye"></i></button>
                  </a>
                </div>
              </div>
            </div>
          </div>

        <?php endforeach; ?>

      </div>
    </div>



<?php require 'view/footer.php'; ?>