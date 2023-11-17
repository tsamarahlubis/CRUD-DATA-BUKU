<?php
include 'koneksi.php';

  $gambar_buku   = $_FILES ['gambar_buku']['name'];
  $judul_buku    = $_POST['judul_buku'];
  $penulis_buku  = $_POST['penulis_buku'];
  $tahun_buku    = $_POST['tahun_buku'];
  $penerbit_buku = $_POST['penerbit_buku'];
  $jenis_buku    = $_POST['jenis_buku'];
  $harga_buku    = $_POST['harga_buku'];

if($gambar_buku != "") {
  $ekstensi_diperbolehkan = array('png','jpg'); 
  $x = explode('.', $gambar_buku);
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['gambar_buku']['tmp_name'];   
  $angka_acak     = rand(1,999);
  $nama_gambar_baru = $angka_acak.'-'.$gambar_buku;
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
                move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru);
                  $query = "INSERT INTO produk_buku (gambar_buku, judul_buku, penulis_buku, tahun_buku, penerbit_buku, jenis_buku, harga_buku) VALUES ('$nama_gambar_baru', '$judul_buku', '$penulis_buku', '$tahun_buku', '$penerbit_buku', '$jenis_buku', '$harga_buku')";
                  $result = mysqli_query($koneksi, $query);
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                           " - ".mysqli_error($koneksi));
                  } else {
                    echo "<script>alert('Data berhasil ditambah.');window.location='index.php';</script>";
                  }

            } else {     
                echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='tambah_produk.php';</script>";
            }
} else {
   $query = "INSERT INTO produk (gambar_buku, judul_buku, penulis_buku, tahun_buku, penerbit_buku, jenis_buku, harga_buku) VALUES ('$nama_gambar_baru', '$judul_buku', '$penulis_buku', '$tahun_buku', '$penerbit_buku', '$jenis_buku', '$harga_buku', null)";
                  $result = mysqli_query($koneksi, $query);
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                           " - ".mysqli_error($koneksi));
                  } else {
                    echo "<script>alert('Data berhasil ditambah.');window.location='index.php';</script>";
                  }
}
