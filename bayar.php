<?php

	require 'core/init.php';

	// jika blm login
  if (!isset($_SESSION["login"])) {
   echo "<script>
       alert('Anda Belum Login, Silahkan Login !');
       document.location.href='login.php';
     </script>";
  }

	echo "<script>
			alert('Sukses Membeli Barang');
			document.location.href='index.php';
	</script>";

	unset($_SESSION["keranjang"]);

?>