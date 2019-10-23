<?php
include 'cek_session.php';
include '../koneksi.php';

$query = mysqli_query($koneksi,"CALL hapusbimbel('".$_GET['id_bimbel']."')");

$myFile = "foto/".$_GET['id_bimbel'].".jpg";
			unlink($myFile) or die("Couldn't delete file");

?>

<script language="javascript">
	alert("Data Berhasil di Hapus");
	document.location="tampilbimbel.php";
</script>