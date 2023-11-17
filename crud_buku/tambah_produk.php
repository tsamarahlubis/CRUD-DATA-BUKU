<?php
  include('koneksi.php');
  
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
      border-radius: 1rem;
    }

    </style>
  </head>
  <body>
      <center>
        <h1>Tambah Produk</h1>
      <center>
      <form method="POST" action="proses_tambah.php" enctype="multipart/form-data" >
      <section class="base">
      <label>Gambar</label>
         <input type="file" name="gambar_buku" required="" />
        </div>
        <div>
          <label>Judul Buku</label>
          <input type="text" name="judul_buku" autofocus="" required="" />
        </div>

        <div>
          <label>Nama Penulis</label>
         <input type="text" name="penulis_buku" />
        </div>

        <div>
          <label>Tahun Terbit</label>
         <input type="text" name="tahun_buku" required="" />
        </div>

        <div>
          <label>Penerbit</label>
         <input type="text" name="penerbit_buku" required="" />
        </div>

        <div>
          <label>Jenis Buku</label>
         <input type="text" name="jenis_buku" required="" />
        </div>

        <div>
          <label>Harga</label>
         <input type="text" name="harga_buku" required="" />
        </div>

        <div>
         <button type="submit">Simpan Produk</button>
        </div>

        </section>
      </form>
  </body>
</html>
