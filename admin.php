<?php

  require 'core/init.php';
  require 'view/header.php';

  // jika blm login
  if (!isset($_SESSION["login"])) {
    echo "<script>
        alert('Anda Belum Login, Silahkan Login !');
        document.location.href='login.php';
      </script>";
  }

  // ambil data dri table
  $products = query("SELECT * FROM products");

    if ( !$products ) {
      echo mysqli_error($db);
      exit;
    }
  


?>
    
    <div class="container">
      <h2 class="text-center wr-title py-3">Selamat Datang di Halaman Admin !</h2>


      <table class="table table-bordered">
        <thead class="clr-chart">
          <tr class="text-white">
            <th>No</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Deskripsi</th>
            <th>Foto</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          
          <?php $nomor = 1; ?>
          <?php foreach( $products as $product ) : ?>

          <tr>
            <td><?= $nomor ?></td>
            <td><?= $product["nama_products"]; ?></td>
            <td>Rp. <?= $product["harga_products"]; ?></td>
            <td><?= $product["deskripsi_products"]; ?></td>
            <td><img src="view/images/<?= $product["foto_products"]; ?>" alt="gambar-products" width="50"></td>
            <td>
              <a href="ubah.php?id_products=<?= $product["id_products"]; ?>" class="btn btn-warning">Ubah</a>
              <a href="functions/hapus.php?id_products=<?= $product["id_products"]; ?>" class="btn btn-danger" onclick="return confirm('Yakin ?');">Hapus</a>
            </td>
          </tr>
          <?php $nomor++; ?>
          <?php endforeach; ?>
          
        </tbody>
        
      </table>

      <a href="tambah_product.php" class="btn btn-success my-2">Tambah Product</a>

      
    </div>

<?php require 'view/footer.php'; ?>