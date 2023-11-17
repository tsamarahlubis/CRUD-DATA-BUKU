<?php
include 'koneksi.php';

$id_buku       = $_POST['id_buku'];
$gambar_buku   = $_FILES['gambar_buku']['name'];
$judul_buku    = $_POST['judul_buku'];
$penulis_buku  = $_POST['penulis_buku'];
$tahun_buku    = $_POST['tahun_buku'];
$penerbit_buku = $_POST['penerbit_buku'];
$jenis_buku    = $_POST['jenis_buku'];
$harga_buku    = $_POST['harga_buku'];

if ($gambar_buku != "") {
    $ekstensi_diperbolehkan = array('png', 'jpg');
    $x = explode('.', $gambar_buku);
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['gambar_buku']['tmp_name'];
    $angka_acak = rand(1, 999);
    $nama_gambar_baru = $angka_acak . '-' . $gambar_buku;

    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        move_uploaded_file($file_tmp, 'gambar/' . $nama_gambar_baru);

        $query = "UPDATE produk_buku SET gambar_buku = '$nama_gambar_baru', judul_buku = '$judul_buku', penulis_buku = '$penulis_buku', tahun_buku = '$tahun_buku', penerbit_buku = '$penerbit_buku', jenis_buku = '$jenis_buku', harga_buku = '$harga_buku'";
        $query .= " WHERE id_buku = '$id_buku'";
        $result = mysqli_query($koneksi, $query);

        if (!$result) {
            die("Query gagal dijalankan: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
        } else {
            echo "<script>alert('Data berhasil diubah.');window.location='index.php';</script>";
        }
    } else {
        echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='edit_produk.php?id_buku=" . $id_buku . "';</script>";
    }
} else {
    $query = "UPDATE produk_buku SET judul_buku = '$judul_buku', penulis_buku = '$penulis_buku', tahun_buku = '$tahun_buku', penerbit_buku = '$penerbit_buku', jenis_buku = '$jenis_buku', harga_buku = '$harga_buku'";
    $query .= " WHERE id_buku = '$id_buku'";
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        die("Query gagal dijalankan: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
    } else {
        echo "<script>alert('Data berhasil diubah.');window.location='index.php';</script>";
    }
}
?>
