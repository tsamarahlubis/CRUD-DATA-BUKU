 <?php
include 'koneksi.php';

  if (isset($_GET['id'])) {
    $id = ($_GET["id"]);

    $query = "SELECT * FROM produk_buku WHERE id_buku='$id'";
    $result = mysqli_query($koneksi, $query);
    if(!$result){
      die ("Query Error: ".mysqli_errno($koneksi).
         " - ".mysqli_error($koneksi));
    }
    $data = mysqli_fetch_assoc($result);
       if (!count($data)) {
          echo "<script>alert('Data tidak ditemukan pada database');window.location='index.php';</script>";
       }
  } else {
    echo "<script>alert('Masukkan data id.');window.location='index.php';</script>";
  }         
  ?>
<!DOCTYPE html>
<html>
  <head>
    <title>CRUD Produk dengan gambar</title>
    <style type="text/css">
      * {
        font-family: "Trebuchet MS";
      }
      h1 {
        text-transform: uppercase;
        color: salmon;
      }
    button {
          background-color: salmon;
          color: #fff;
          padding: 10px;
          text-decoration: none;
          font-size: 12px;
          border: 0px;
          margin-top: 20px;
          border-radius: 0.5rem;
    }
    label {
      margin-top: 10px;
      float: left;
      text-align: left;
      width: 100%;
    }
    input {
      padding: 6px;
      width: 100%;
      box-sizing: border-box;
      background: #f8f8f8;
      border: 2px solid #ccc;
      outline-color: salmon;
    }
    div {
      width: 100%;
      height: auto;
    }
    .base {
      width: 400px;
      height: auto;
      padding: 20px;
      margin-left: auto;
      margin-right: auto;
      background: #ededed;
      border-radius: 0.5rem;
    }
    </style>
  </head>
  <body>
      <center>
        <h1>Edit Produk <?php echo $data['judul_buku']; ?></h1>
      <center>
      <form method="POST" action="proses_edit.php" enctype="multipart/form-data" >
      <section class="base">
        <input name="id_buku" value="<?php echo $data['id_buku']; ?>"  hidden />
        <div>
        
      <div>
          <label>Gambar</label>
          <img src="gambar/<?php echo $data['gambar_buku']; ?>" style="width: 120px;float: left;margin-bottom: 5px;">
          <input type="file" name="gambar_buku" />
          <i style="float: left;font-size: 11px;color: red">Abaikan jika tidak merubah gambar produk</i>
        </div>
          <label>Judul Buku</label>
          <input type="text" name="judul_buku" value="<?php echo $data['judul_buku']; ?>" autofocus="" required="" />
        </div>

        <div>
          <label>Nama Penulis</label>
         <input type="text" name="penulis_buku" value="<?php echo $data['penulis_buku']; ?>" />
        </div>

        <div>
          <label>Tahun Terbit</label>
         <input type="text" name="tahun_buku" value="<?php echo $data['tahun_buku']; ?>" />
        </div>

        <div>
          <label>Penerbit</label>
         <input type="text" name="penerbit_buku" value="<?php echo $data['penerbit_buku']; ?>" />
        </div>

        <div>
          <label>Jenis</label>
         <input type="text" name="jenis_buku" value="<?php echo $data['jenis_buku']; ?>" />
        </div>

        <div>
          <label>Harga Buku</label>
         <input type="text" name="harga_buku" required=""value="<?php echo $data['harga_buku']; ?>" />
        </div>

        <div>
         <button type="submit">Simpan Perubahan</button>
        </div>
        
        </section>
      </form>
  </body>
</html>
