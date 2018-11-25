<?php

  require 'core/init.php';
  require 'view/header.php';
  
 	// echo "<pre>";
	// print_r($_SESSION["keranjang"]);
	// echo "</pre>";
	
	// jika blm login
  if (!isset($_SESSION["login"])) {
   echo "<script>
       alert('Anda Belum Login, Silahkan Login !');
       document.location.href='login.php';
     </script>";
  }


  if ( empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"]) ) {
  	echo "<script>
       alert('Ooopss, Cart Anda Kosong. Silahkan Blanja Dulu !');
       document.location.href='index.php';
     </script>";
  }

  

?>



<div class="container py-5">
	<h1 class="text-center wr-title py-5">My Cart</h1>

	<table class="table table-striped mb-5">
	  <thead>
	    <tr>
	      <th scope="col">No</th>
	      <th scope="col">Gambar</th>
	      <th scope="col">Product</th>
	      <th scope="col">Harga</th>
	      <th scope="col">Jumlah</th>
	      <th scope="col">Total</th>
	      <th scope="col">Aksi</th>
	    </tr>
	  </thead>

	  <tbody>
	  	<?php $nomor = 1; ?>
		<?php foreach ($_SESSION["keranjang"] as $id_products => $jumlah) : ?>
		<!-- Menampilkan produk berdasarkan id yang di beli -->
		<?php
			$results = mysqli_query($db, "SELECT * FROM products WHERE id_products = '$id_products'");
			$pecah = mysqli_fetch_assoc($results);
			$total = $pecah["harga_products"]*$jumlah;
			// echo "<pre>";
			// print_r($pecah);
			// echo "</pre>";
		?>
	    <tr>
	      <th scope="row"><?= $nomor; ?></th>
	      <td><img src="view/images/<?= $pecah["foto_products"]; ?>" alt="product image" width="90"></td>
	      <td><?= $pecah['nama_products']; ?></td>
	      <td>Rp. <?= number_format($pecah["harga_products"]); ?></td>
	      <td><?= $jumlah; ?></td>
	      <td>Rp. <?= number_format($total); ?></td>
	      <td>
	      	<a href="functions/hapus_keranjang.php?id_products=<?= $id_products ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin ?');">Hapus</a>
	      </td>
	    </tr>
		<?php $nomor++; ?>
	    <?php endforeach; ?>
	  </tbody>
	</table>

	<a href="index.php" class="btn btn-danger">Lanjutkan Belanja</a>
	<a href="checkout.php" class="btn btn-success">Checkout</a>

</div>

<?php require 'view/footer.php'; ?>