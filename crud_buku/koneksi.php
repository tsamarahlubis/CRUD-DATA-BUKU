<?php
  $host = "localhost"; 
  $user = "root";
  $pass = "";
  $nama_db = "crud_buku"; //nama database
  $koneksi = mysqli_connect($host,$user,$pass,$nama_db);

  if(!$koneksi){ 
    die ("Koneksi dengan database gagal: ".mysqli_connect_error());
  } 
?>
