<?php
  session_start();
  require 'db.php';
  

  // jika blm login
  if (!isset($_SESSION["login"])) {
   echo "<script>
       alert('Anda Belum Login, Silahkan Login !');
       document.location.href='../login.php';
     </script>";
  } else{
      // ambil id dari url
      $id_products = $_GET["id_products"];

    // jika barang sudah ada ditekan +1
      if (isset($_SESSION["keranjang"]["$id_products"])) {
        $_SESSION["keranjang"]["$id_products"] += 1;
      }
    // jika belum = 1
      else{
        $_SESSION["keranjang"]["$id_products"] = 1;
      }

      echo "<script>
            alert('Product Telah Ditambahkan Ke My Cart');
            document.location.href='../mycart.php';
          </script>";
  }

  
  

?>



