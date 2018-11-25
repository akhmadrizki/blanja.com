<?php
  require 'core/init.php';
  require 'view/header.php';

  // cek tombol udh ditekan apa blm
  if ( isset($_POST["kirim"]) ) {

      // cek apakah data berhasil ditambah atau tdk
      if ( tambah($_POST) > 0 ) {
      echo "
            <script>
              alert('data berhasil ditambah');
              document.location.href='admin.php';
            </script>
          ";
      } else{
        echo "
            <script>
              alert('data gagal ditambah');
              document.location.href='admin.php';
            </script>
          ";
      }
    
  }
  


?>
    
    <div class="container">
      <h2 class="text-center py-3">Tambah Product</h2>

      <form action="" method="post" enctype="multipart/form-data">
        <div class="form-grup">
          <label>Nama</label>
          <input type="text" class="form-control" name="nama_products" required>
        </div>
        <div class="form-grup">
          <label>Harga (Rp)</label>
          <input type="number" class="form-control" name="harga_products" required>
        </div>
        <div class="form-grup">
          <label>Deskripsi</label>
          <textarea class="form-control" name="deskripsi_products" rows="10" required></textarea>
        </div>
        <div class="form-grup">
          <label>Foto</label>
          <input type="file" class="form-control" name="foto_products">
          <p class="text-danger">Foto Max 2MB. Ekstensi file JPG/JPEG/PNG</p>
        </div>
        <button class="btn btn-primary my-2" name="kirim">Upload</button>
      </form>
    </div>

<?php require 'view/footer.php'; ?>