<?php
error_reporting(0);
include 'cek_session.php';
include '../koneksi.php';
$id = 1;

$query = mysqli_query($koneksi,"CALL tampilpaket()");
foreach ($query as $row) {
	if("P".$id == $row['id_paket']){
	$id = $id + 1;
	}
}


  mysqli_free_result($koneksi);
  mysqli_next_result($koneksi);

$query = mysqli_query($koneksi,"CALL insertpaket('P$id','".$_POST['nama_paket']."','".$_POST['harga']."')") or die(mysqli_error($koneksi));

if($_POST['mapel5'] AND $_POST['mapel4'] AND $_POST['mapel3'] AND $_POST['mapel2'] AND $_POST['mapel1']){
	$query = mysqli_query($koneksi,"CALL insertdetailpaket('P$id','".$_POST['mapel1']."')") or die(mysqli_error($koneksi));
	$query = mysqli_query($koneksi,"CALL insertdetailpaket('P$id','".$_POST['mapel2']."')") or die(mysqli_error($koneksi));
	$query = mysqli_query($koneksi,"CALL insertdetailpaket('P$id','".$_POST['mapel3']."')") or die(mysqli_error($koneksi));
	$query = mysqli_query($koneksi,"CALL insertdetailpaket('P$id','".$_POST['mapel4']."')") or die(mysqli_error($koneksi));
	$query = mysqli_query($koneksi,"CALL insertdetailpaket('P$id','".$_POST['mapel5']."')") or die(mysqli_error($koneksi));
}elseif($_POST['mapel4'] AND $_POST['mapel3'] AND $_POST['mapel2'] AND $_POST['mapel1']){
	$query = mysqli_query($koneksi,"CALL insertdetailpaket('P$id','".$_POST['mapel1']."')") or die(mysqli_error($koneksi));
	$query = mysqli_query($koneksi,"CALL insertdetailpaket('P$id','".$_POST['mapel2']."')") or die(mysqli_error($koneksi));
	$query = mysqli_query($koneksi,"CALL insertdetailpaket('P$id','".$_POST['mapel3']."')") or die(mysqli_error($koneksi));
		$query = mysqli_query($koneksi,"CALL insertdetailpaket('P$id','".$_POST['mapel4']."')") or die(mysqli_error($koneksi));
}elseif($_POST['mapel3'] AND $_POST['mapel2'] AND $_POST['mapel1']){
	$query = mysqli_query($koneksi,"CALL insertdetailpaket('P$id','".$_POST['mapel1']."')") or die(mysqli_error($koneksi));
	$query = mysqli_query($koneksi,"CALL insertdetailpaket('P$id','".$_POST['mapel2']."')") or die(mysqli_error($koneksi));
	$query = mysqli_query($koneksi,"CALL insertdetailpaket('P$id','".$_POST['mapel3']."')") or die(mysqli_error($koneksi));
}elseif( $_POST['mapel2'] AND $_POST['mapel1']){
	$query = mysqli_query($koneksi,"CALL insertdetailpaket('P$id','".$_POST['mapel1']."')") or die(mysqli_error($koneksi));
	$query = mysqli_query($koneksi,"CALL insertdetailpaket('P$id','".$_POST['mapel2']."')") or die(mysqli_error($koneksi));
}elseif($_POST['mapel1']){
	$query = mysqli_query($koneksi,"CALL insertdetailpaket('P$id','".$_POST['mapel1']."')") or die(mysqli_error($koneksi));
}




?>

<script language="javascript">
	alert("Data Berhasil di Tambah");
	document.location="tampilpaket.php";
</script>