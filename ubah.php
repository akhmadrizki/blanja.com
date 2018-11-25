<?php
  require 'core/init.php';
  require 'view/header.php';

  // ambil data dri URL
  $id_products = $_GET["id_products"];

  // query data berdasarkan id
  $prod = query("SELECT * FROM products WHERE id_products = $id_products")[0];

  // cek tombol udh ditekan apa blm
  if ( isset($_POST["kirim"]) ) {



    // cek data berhasil diubah atau tdk
    if ( ubah($_POST) > 0 ) {
      echo "
            <script>
              alert('data berhasil diubah');
              document.location.href='admin.php';
            </script>
          ";
    } else{
      echo "
            <script>
              alert('data gagal diubah');
              document.location.href='admin.php';
            </script>
          ";
    }
    
  }


  



?>
    
    <div class="container">
      <h2 class="text-center py-3">Ubah Product</h2>

      <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_products" value="<?= $prod["id_products"]; ?>">
        <input type="hidden" name="fotoLama" value="<?= $prod["foto_products"]; ?>">
        <div class="form-grup">
          <label>Nama</label>
          <input type="text" class="form-control" name="nama_products" required value="<?= $prod["nama_products"]; ?>">
        </div>
        <div class="form-grup">
          <label>Harga (Rp)</label>
          <input type="number" class="form-control" name="harga_products" required value="<?= $prod["harga_products"]; ?>">
        </div>
        <div class="form-grup">
          <label>Deskripsi</label>
          <textarea class="form-control" name="deskripsi_products" rows="10" required>
            <?= $prod["deskripsi_products"]; ?>
          </textarea>
        </div><br>
        <div class="form-grup">
          <label>Gambar</label><br>
          <img src="view/images/<?= $prod['foto_products']; ?>" width="100">
        </div><br>
        <div class="form-grup">
          <input type="file" class="form-control" name="foto_products">
        </div>
        <button class="btn btn-primary my-2" name="kirim">Upload</button>
      </form>
    </div>

<?php require 'view/footer.php'; ?>