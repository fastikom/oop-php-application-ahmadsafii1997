<?php

include "config.php"; //memanggil koneksi
include "class_buku.php"; //memanggil class anggota
$buku = new Config(); //koneksi
$buku->koneksi(); // eksekusi koneksi
$dataBuku = new Buku(); //anggota
//$id_buku = $_GET['id_buku'];
if (isset($_GET['aksi']) == "hapus") {    //eksekusi anggota
    $dataBuku->hapusData($_GET['id_buku']);
}
?>