<?php
include 'cek_session.php';
include '../koneksi.php';

$query = mysqli_query($koneksi,"CALL deletepaket('".$_GET['id_paket']."')") or die(mysqli_error($koneksi));

?>

<script language="javascript">
	alert("Data Berhasil di Hapus");
	document.location="tampilpaket.php";
</script>