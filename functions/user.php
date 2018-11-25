<?php

function query($query){
	global $db;
	$result = mysqli_query($db, $query);
	$rows = [];

	while ( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}

function productpelanggan($productpelanggan){
	global $db;
	$result = mysqli_query($db, $productpelanggan);
	$rows = [];

	while ( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}


function cart($cart){
	global $db;
	$result = mysqli_query($db, $cart);
	$rows = [];

	while ( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}


function tambah($data){
	global $db;
	// ambil data dari elemen table
      $nama_products = htmlspecialchars($data['nama_products']);
      $harga_products = htmlspecialchars($data['harga_products']);
      $deskripsi_products = htmlspecialchars($data['deskripsi_products']);

      // upload gambar
      $foto_products = upload();
		if ( !$foto_products ) {
		 	return false;
		 }
      

    // query insert data
      $query = "INSERT INTO products
                  VALUES
                  ('', '$nama_products', '$harga_products', '$deskripsi_products', '$foto_products')
              ";

      mysqli_query($db, $query);

      return mysqli_affected_rows($db);
}


function hapus($id_products){
	global $db;
	mysqli_query($db, "DELETE FROM products WHERE id_products = $id_products");

	return mysqli_affected_rows($db);
}


function ubah($data){
	global $db;

	$id_products = $data["id_products"];
	$nama_products = htmlspecialchars($data["nama_products"]);
	$harga_products = htmlspecialchars($data["harga_products"]);
	$deskripsi_products = htmlspecialchars($data["deskripsi_products"]);
	$fotoLama = htmlspecialchars($data["fotoLama"]);
	


	// cek apakah user pilih upload foto baru atau tdk
	if ( $_FILES['foto_products']['error'] === 4 ) {
		$foto_products = $fotoLama;
	} else{
		$foto_products = upload();
	}

	$query = "UPDATE products SET
				nama_products = '$nama_products',
				harga_products = '$harga_products',
				deskripsi_products = '$deskripsi_products',
				foto_products = '$foto_products'
			 WHERE id_products = $id_products
			";

	mysqli_query($db, $query);

	return mysqli_affected_rows($db);
}

function upload(){
	$namaFile = $_FILES['foto_products']['name'];
	$sizeFile = $_FILES['foto_products']['size'];
	$error = $_FILES['foto_products']['error'];
	$tmpName = $_FILES['foto_products']['tmp_name'];

	// cek klo gk ada gambar yg diupload
	if ( $error === 4 ) {
		echo "<script>alert('Upload Gambar Terlebih Dahulu');</script>";
		return false;
	}

	// cek apakah yg diupload gambar
	$ekstensiGambarValid = ['jpg', 'png', 'jpeg'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));

	if ( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
		echo "<script>
				alert('Ekstensi File Tidak Sesuai !');
			</script>";
		return false;
	}

	// cek ukuran file
	if ( $sizeFile > 2000000 ) {
		echo "<script>
				alert('Ukuran Gambar Terlalu Besar !');
			</script>";
		return false;
	}

	// lolos pengecekan, gambar siap di upload
	// generate nama baru gambar
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, 'view/images/' . $namaFileBaru);

	return $namaFileBaru;
}



function registrasi($data){
	global $db;

	$username = strtolower(stripcslashes($data["username"]));
	$password = mysqli_real_escape_string($db, $data["password"]);
	$konfirm_pass = mysqli_real_escape_string($db, $data["konfirm_pass"]);
	$level	  = $data["level"];

	// cek username sedah ada atau blm
	$result = mysqli_query($db, "SELECT username FROM users WHERE username = '$username'");

	if( mysqli_fetch_assoc($result) ){
		echo "<script>
				alert('Username Sudah Ada');
			</script>";
		return false;
	}

	// Cek Konfirmasi password
	if( $password !== $konfirm_pass ){
		echo "<script>
				alert('Konfirmasi Password Tidak Sesuai!');
			</script>";

		return false;
	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// tambahkan user baru ke database
	mysqli_query($db, "INSERT INTO users VALUES('', '$username', '$password', '$level')");

	return mysqli_affected_rows($db);


}





?>