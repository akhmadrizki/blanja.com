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

  // ambil id dari url
  $id_products = $_GET["id_products"];
  // ambil data dri table
  $result = mysqli_query($db, "SELECT * FROM products WHERE id_products = '$id_products'");
  $detail = mysqli_fetch_assoc($result);

  // echo "<pre>";
  // print_r($detail);
  // echo "</pre>";

?>

<div class="container py-5">
	<div class="row">
		<div class="col-md-6">
			<img src="view/images/<?= $detail['foto_products']; ?>" alt="foto-product" class="img-fluid">
		</div>

		<div class="col-md-6">
			<h1 class="wr-title"><?= $detail['nama_products']; ?></h1>
			<h3 class="wr-title">Rp. <?= number_format($detail['harga_products']); ?></h3>

			<form action="" method="post">
				<div class="form-group">
					<div class="input-group">
						<input type="number" min="1" class="form-control" name="jumlah_pesan">
						<div class="input-group-btn">
							<button class="btn btn-danger" name="addchartbtn">Beli</button>
						</div>
					</div>
				</div>
			</form>

			<!-- logic masuk ke cart -->
			<?php

				// jika beli dipencet
			 	if (isset($_POST["addchartbtn"])) {
			 		// ambil jumlah yg di input
			 		$jumlah_pesan = $_POST["jumlah_pesan"];

			 		// masukkan ke cart
			 		$_SESSION["keranjang"]["$id_products"] = $jumlah_pesan;

			 		echo "<script>
							alert('Product Telah Ditambahkan Ke My Cart');
            				document.location.href='mycart.php';
			 			</script>";
			 	}

			?>

			<p><?= $detail['deskripsi_products']; ?></p>
		</div>
	</div>
</div>


<?php require 'view/footer.php'; ?>