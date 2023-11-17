<?php
  include('koneksi.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <title>CRUD BUKU</title>
    <style type="text/css">
      * {
        font-family: "Trebuchet MS";
      }
      h1 {
        text-transform: uppercase;
        color: salmon;
        font-size: 50px;

      }
    table {
      border: solid 1px #DDEEEE;
      border-collapse: collapse;
      border-spacing: 0;
      width: 80;
      margin: 10px auto 10px auto;
    }

    table thead th {
        background-color: #DDEFEF;
        border: solid 1px #DDEEEE;
        color: #336B6B;
        padding: 10px;
        text-align: center;
        text-shadow: 1px 1px 1px #fff;
        text-decoration: none;
        font-size: 20px;
    }
    table tbody td {
        border: solid 1px #DDEEEE;
        color: #333;
        padding: 30px;
        text-shadow: 1px 1px 1px #fff;
        text-align: center;
        
    }
    a {
          background-color: salmon;
          color: #fff;
          padding: 10px;
          text-decoration: none;
          border-radius: 0.5rem;
    }

    a:hover {
            background-color: peru;
            color: #fff;
        }

    td a {
        display: block;
        margin: 5px auto;
        }

    .action-buttons {
        display: flex;
        justify-content: space-around;
        align-items: center;
        width: 100%;
        height: 100%;
}

    .edit-button,
    .delete-button {
        margin-right: 5px;
}


    </style>
  </head>
  <body>
    <center><h1>Data Buku</h1><center>
    <center><a href="tambah_produk.php">+ &nbsp; Tambah Produk</a><center>
    <br/>
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Gambar</th>
          <th>Judul Buku</th>
          <th>Nama Penulis</th>
          <th>Tahun Terbit</th>
          <th>Penerbit</th>
          <th>Jenis Buku</th>
          <th>Harga</th>
          <th>Action</th>
        </tr>
    </thead>
    <tbody>
      <?php
      $query = "SELECT * FROM produk_buku ORDER BY id_buku ASC";
      $result = mysqli_query($koneksi, $query);
      if(!$result){
        die ("Query Error: ".mysqli_errno($koneksi).
           " - ".mysqli_error($koneksi));
      }

      $no = 1;
      while($row = mysqli_fetch_assoc($result))
      {
      ?>
       <tr>
          <td><?php echo $no; ?></td>
          <td style="text-align: center;"><img src="gambar/<?php echo $row['gambar_buku']; ?>" style="width: 100px;"></td>
          <td><?php echo $row['judul_buku']; ?></td>
          <td><?php echo $row['penulis_buku']; ?></td>
          <td><?php echo $row['tahun_buku']; ?></td>
          <td><?php echo $row['penerbit_buku']; ?></td>
          <td><?php echo $row['jenis_buku']; ?></td>
          <td>Rp <?php echo number_format($row['harga_buku'],0,',','.'); ?></td>
          
          <td> 
              <a href="edit_produk.php?id=<?php echo $row['id_buku']; ?>">Edit</a>
              <a href="proses_hapus.php?id=<?php echo $row['id_buku']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a> 
          </td>
      </tr>
         
      <?php
        $no++;
      }
      ?>
    </tbody>
    </table>
  </body>
</html>