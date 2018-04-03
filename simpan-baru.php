<?php

include "koneksi.php";
$koneksiObj=new Koneksi();
$koneksi= $koneksiObj->ambilKoneksi();

if($koneksi->connect_error) {
	die("Koneksi Gagal : " . $koneksi->connect_error);
}else{
	echo "Koneksi ke basis data sukses!";
}

$query = "insert into mahasiswa(nim, nama, jurusan)
values('".$_POST['nim']. "','" .
$_POST['nama']."','" .
$_POST['jurusan']."')";

//echo "<br><br>".$query;
if($koneksi->query($query)==true){
	echo "<br>Data dengan nama ".$_POST["nama"]." sudah tersimpan".
	'<a href="main.php">klik disini</a>';

}else {
	echo "error : ".$query." -> ".$koneksi->error;
}
$koneksi->close();
?>
