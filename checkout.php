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
	    </tr>
	  </thead>

	  <tbody>
	  	<?php $nomor = 1; ?>
	  	<?php $totalbelanja = 0; ?>
	  	<?php $totaljumlah = 0; ?>
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
	    </tr>
		<?php $nomor++; ?>
		<?php $totaljumlah += $jumlah; ?>
		<?php $totalbelanja += $total; ?>
	    <?php endforeach; ?>
	  </tbody>
	  <tfoot>
	  	<tr>
	  		<th colspan="5">Total Belanja</th>
	  		<th>
	  			<!-- Logic Diskon -->
	  			<?php
	  				if ($jumlah == 3 OR $nomor == 4 OR $totaljumlah == 3) {
	  				  	$diskon = $totalbelanja*50/100;
	  				  	echo "Rp. ";
	  				  	echo "<s>";
	  				  	echo number_format($totalbelanja);
	  				  	echo "</s>";
	  				  	echo "&nbsp";
	  				  	echo "Rp. ";
	  				  	echo number_format($diskon);
	  				  } else{
	  				  	echo "Rp. ";
	  				  	echo number_format($totalbelanja);
	  				  }
	  			?>
	  		</th>
	  	</tr>
	  </tfoot>
	</table>

	
	<a href="bayar.php" class="btn btn-success">Bayar</a>

</div>

<?php require 'view/footer.php'; ?>