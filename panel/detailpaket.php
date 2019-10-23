<!DOCTYPE html>
<html lang="en">
<head>
	<title>Detail Paket</title>
</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="../css/main.css">
<link rel="stylesheet" href="../css/util.css">
<body>
<?php
include 'cek_session.php';
include '../koneksi.php';
	$query = mysqli_query($koneksi, "CALL tampilpaketByID('".$_GET['id_paket']."')");
	foreach ($query as $row){
		$id = $row['id_paket'];
		$nama_paket = $row['nama_paket'];
		$harga = $row['harga'];

	}
?>

<div class="container-login100" style="background-image: url('img/bg-01.jpg');">
<div class="text-center" style="margin-top: 1%"></div>

	<div style="background : rgb(255, 255, 255, 0.8);padding-top: 1%; padding-left: 5%; padding-right: 5%; padding-bottom: 1%; margin-top: 2%; margin-left: 20%; margin-right: 20%;">
	<center>
	<h2>Detail Paket <?php echo $nama_paket;?></h2>
		<table class="table" style="font-size: 18px;">
			<tr>
				<td>ID Paket</td>
				<td>:</td>
				<td><?php echo $id;?></td>
			</tr>
			<tr>
				<td>Nama Bimbel</td>
				<td>:</td>
				<td><?php echo $nama_paket;?></td>
			</tr>
			<tr>
				<td>Harga</td>
				<td>:</td>
				<td>Rp. <?php echo $harga;?>,-</td>
			</tr>
			<?php
			//mysqli_free_result($koneksi);
  			mysqli_next_result($koneksi);

  			$no = 1;
				$query = mysqli_query($koneksi, "CALL tampildetailpaketByIDPAKET('".$_GET['id_paket']."')");
				foreach ($query as $row){
			?>
			<tr>
				<td>Mapel <?= $no?></td>
				<td>:</td>
				<td><?= $row['nama_pelajaran'];?></td>
			</tr>
			<?php $no++; }?>
</table>
	</center>
	
		
	</div>
	</div>
</div>
</html>
