<?php
include 'cek_session.php';
include '../koneksi.php';

$query = mysqli_query($koneksi,"CALL deletemapel('".$_GET['id_mapel']."')") or die(mysqli_error($koneksi));

?>

<script language="javascript">
	alert("Data Berhasil di Hapus");
	document.location="tampilmapel.php";
</script>