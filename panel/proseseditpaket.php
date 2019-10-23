<?php
include '../koneksi.php';
include 'cek_session.php';

$query = mysqli_query($koneksi,"CALL editpaketByID('".$_POST['id_paket']."','".$_POST['nama_paket']."','".$_POST['harga']."')") or die(mysqli_error($koneksi));

if($_POST['mapel5'] AND $_POST['mapel4'] AND $_POST['mapel3'] AND $_POST['mapel2'] AND $_POST['mapel1']){
	$query = mysqli_query($koneksi,"CALL deletedetailpaketByIDPaket('".$_POST['id_paket']."')");
	$query = mysqli_query($koneksi,"CALL insertdetailpaket('".$_POST['id_paket']."','".$_POST['mapel1']."')");
	$query = mysqli_query($koneksi,"CALL insertdetailpaket('".$_POST['id_paket']."','".$_POST['mapel2']."')");
	$query = mysqli_query($koneksi,"CALL insertdetailpaket('".$_POST['id_paket']."','".$_POST['mapel3']."')");
	$query = mysqli_query($koneksi,"CALL insertdetailpaket('".$_POST['id_paket']."','".$_POST['mapel4']."')");
	$query = mysqli_query($koneksi,"CALL insertdetailpaket('".$_POST['id_paket']."','".$_POST['mapel5']."')");
}elseif($_POST['mapel4'] AND $_POST['mapel3'] AND $_POST['mapel2'] AND $_POST['mapel1']){
	$query = mysqli_query($koneksi,"CALL deletedetailpaketByIDPaket('".$_POST['id_paket']."')");
	$query = mysqli_query($koneksi,"CALL insertdetailpaket('".$_POST['id_paket']."','".$_POST['mapel1']."')");
	$query = mysqli_query($koneksi,"CALL insertdetailpaket('".$_POST['id_paket']."','".$_POST['mapel2']."')");
	$query = mysqli_query($koneksi,"CALL insertdetailpaket('".$_POST['id_paket']."','".$_POST['mapel3']."')");
	$query = mysqli_query($koneksi,"CALL insertdetailpaket('".$_POST['id_paket']."','".$_POST['mapel4']."')");
}elseif($_POST['mapel3'] AND $_POST['mapel2'] AND $_POST['mapel1']){
	$query = mysqli_query($koneksi,"CALL deletedetailpaketByIDPaket('".$_POST['id_paket']."')");
	$query = mysqli_query($koneksi,"CALL insertdetailpaket('".$_POST['id_paket']."','".$_POST['mapel1']."')");
	$query = mysqli_query($koneksi,"CALL insertdetailpaket('".$_POST['id_paket']."','".$_POST['mapel2']."')");
	$query = mysqli_query($koneksi,"CALL insertdetailpaket('".$_POST['id_paket']."','".$_POST['mapel3']."')");
}elseif($_POST['mapel2'] AND $_POST['mapel1']){
	$query = mysqli_query($koneksi,"CALL deletedetailpaketByIDPaket('".$_POST['id_paket']."')");
	$query = mysqli_query($koneksi,"CALL insertdetailpaket('".$_POST['id_paket']."','".$_POST['mapel1']."')");
	$query = mysqli_query($koneksi,"CALL insertdetailpaket('".$_POST['id_paket']."','".$_POST['mapel2']."')");
}elseif(@$_POST['mapel1']){
	$query = mysqli_query($koneksi,"CALL deletedetailpaketByIDPaket('".$_POST['id_paket']."')");
	$query = mysqli_query($koneksi,"CALL insertdetailpaket('".$_POST['id_paket']."','".$_POST['mapel1']."')");
}




?>

<script language="javascript">
	alert("Data Berhasil di Ubah");
	document.location="tampilpaket.php";
</script>