<?php
	session_start();
	$id_products = $_GET["id_products"];
	unset($_SESSION["keranjang"]["$id_products"]);

	echo "<script>
			alert('Item Berhasil Dihapus');
			document.location.href='../mycart.php';
		</script>";

?>