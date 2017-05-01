<?php

include "config.php"; //memanggil koneksi
include "class_buku.php"; //memanggil class anggota
$buku = new Config(); //koneksi
$buku->koneksi(); // eksekusi koneksi
$dataBuku = new Buku(); //anggota
	if (isset($_POST['edit'])) {
        $id_buku = $_POST['id_buku'];
        $judul_buku = $_POST['judul_buku'];
        $pengarang = $_POST['pengarang'];
        $penerbit = $_POST['penerbit'];
        $tahun_terbit = $_POST['tahun_terbit'];
        $dataBuku->queryEdit($id_buku, $judul_buku, $pengarang, $penerbit, $tahun_terbit); //eksekusi edit anggota
	}
?>