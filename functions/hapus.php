<?php
	require 'db.php';
	require 'user.php';

	$id_products = $_GET['id_products'];

	if ( hapus($id_products) > 0 ) {
		echo "<script>
				alert('Data Berhasil Dihapus !');
				document.location.href='../admin.php';
			</script>";
	} else{
		echo "<script>
				alert('Data Gagal Dihapus !');
				document.location.href='../admin.php';
			</script>";
	}

?>