<?php
// class untuk objek buku
class Buku
{
	var $judul_buku;
	var $pengarang;
	var $penerbit;
	var $tahun_terbit;

	// method tambah data
	function tambahData($judul_buku, $pengarang, $penerbit, $tahun_terbit)
	{
		$query = "INSERT INTO buku (judul_buku, pengarang, penerbit, tahun_terbit) values ('$judul_buku', '$pengarang', '$penerbit', '$tahun_terbit')";
		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query) or die(mysqli_error($GLOBALS["___mysqli_ston"]));
       
		if ($result){  
			echo "<script>alert('Data Berhasil Disimpan')</script>";  
			echo "<meta http-equiv='refresh' content='1 url=index.php'>";  
		}else{  
			echo "<script>alert('Data Gagal Disimpan')</script>";  
			echo "<meta http-equiv='refresh' content='1 url=input_data.php'>";  
		}
	}

	function tampilData()
	{
		$query = "select * from buku";
		$result = mysqli_query($GLOBALS["___mysqli_ston"], $query) or die(mysqli_error($GLOBALS["___mysqli_ston"]));
		return $result;
	}

	function editData($id_buku) { //function edit data
        $query = "select * from buku where id_buku='$id_buku'";
        $result = mysqli_query($GLOBALS["___mysqli_ston"], $query) or die(mysqli_error($GLOBALS["___mysqli_ston"]));
        return $result;
    }

    function queryEdit($id_buku, $judul_buku, $pengarang, $penerbit, $tahun_terbit) { //function proses edit data
        $query = "UPDATE buku SET judul_buku='$judul_buku', pengarang='$pengarang',penerbit='$penerbit' WHERE id_buku='$id_buku'";
        $result = mysqli_query($GLOBALS["___mysqli_ston"], $query) or die(mysqli_error($GLOBALS["___mysqli_ston"]));
        if ($result){  
			echo "<script>alert('Data Berhasil Disimpan')</script>";  
			echo "<meta http-equiv='refresh' content='1 url=index.php'>";  
		}else{  
			echo "<script>alert('Data Gagal Disimpan')</script>";  
			echo "<meta http-equiv='refresh' content='1 url=input_data.php'>";  
		}
    }

	function hapusData($id_buku)
	{
		$query = "DELETE FROM buku WHERE id_buku ='$id_buku'";
        $result = mysqli_query($GLOBALS["___mysqli_ston"], $query) or die(mysqli_error($GLOBALS["___mysqli_ston"]));
        if ($result)
		{
			header('location: index.php');
		}
		else 
		{
			die ("Data gagal dihapus");
		}
	}
}
?>