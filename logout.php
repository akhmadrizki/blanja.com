<?php
 session_start();

 // menghancurkan session pelanggan

 session_destroy();

 echo "<script>
 		alert('Anda Telah Logout');
 		document.location.href='index.php';
 	</script>";


?>