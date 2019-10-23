<?php
error_reporting(0);
include 'cek_session.php';
include '../koneksi.php';
$id = 1;

$query = mysqli_query($koneksi,"CALL tampilmapel()");
foreach ($query as $row) {
	if("MP0".$id == $row['id_pelajaran']){
	$id = $id + 1;
	}
}


  mysqli_free_result($koneksi);
  mysqli_next_result($koneksi);

$query = mysqli_query($koneksi,"CALL insertmapel('MP0$id','".$_POST['nama_mapel']."')") or die(mysqli_error($koneksi));
?>
<script language="javascript">
	alert("Data Berhasil di Tambah");
	document.location="tampilmapel.php";
</script>