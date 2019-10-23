<!DOCTYPE html>
<html lang="en">
<head>
	<title>Detail Bimbel</title>
</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/util.css">
<body>
<?php
include 'koneksi.php';
	$query = mysqli_query($koneksi, "SELECT * FROM bimbel , detail_bimbel , detail_paket , mata_pelajaran , paket WHERE bimbel.id_bimbel = detail_bimbel.id_bimbel and detail_paket.id_paket = detail_bimbel.id_paket and detail_paket.id_pelajaran = mata_pelajaran.id_pelajaran and detail_paket.id_paket = paket.id_paket and bimbel.id_bimbel  = '$_GET[id]' GROUP BY bimbel.nama_bimbel");
	foreach ($query as $row){
		$id = $row['id_bimbel'];
		$nama_bimbel = $row['nama_bimbel'];
		$alamat = $row['alamat'];
		$telpon = $row['telpon'];
		$website = $row['website'];
		$latitude = $row['latitude'];
		$longitude = $row['longitude'];

	}
?>

<div class="container-login100" style="background-image: url('img/bg-01.jpg');">
<div class="text-center" style="margin-top: 1%"></div>

	<div style="background : rgb(255, 255, 255, 0.8);padding-top: 1%; padding-left: 5%; padding-right: 5%; padding-bottom: 1%; margin-top: 2%; margin-left: 20%; margin-right: 20%;">
	<center>
	<h2>Detail <?php echo $nama_bimbel;?></h2>
	<br>
	<img src='http://localhost/bimbelonline/tambah/foto/<?= $id?>.jpg' style='width:200px;height:200px' alt='img' class='img-circle'>
	<br>
		<table class="table" style="font-size: 18px;">
			<tr>
				<td>Nama Bimbel</td>
				<td>:</td>
				<td><?php echo $nama_bimbel;?></td>
			</tr>
			<tr>
				<td>Alamat Bimbel</td>
				<td>:</td>
				<td><?php echo $alamat;?></td>
			</tr>
			<tr>
				<td>No Telpon</td>
				<td>:</td>
				<td><?php echo $telpon;?></td>
			</tr>
			<tr>
				<td>Website</td>
				<td>:</td>
				<td><a href="http://<?php echo $website;?>" target="_blank"><font size="4px"><?php echo $website;?></font></a></td>
			</tr>
</table>
<h2>Paket Mata Pelajaran</h2>
			<?php
$no = 1;
$query = mysqli_query($koneksi, "SELECT * FROM bimbel , detail_bimbel , detail_paket ,  paket WHERE bimbel.id_bimbel = detail_bimbel.id_bimbel and detail_paket.id_paket = detail_bimbel.id_paket and detail_paket.id_paket = paket.id_paket and bimbel.id_bimbel  = '$_GET[id]' GROUP BY paket.nama_paket order by paket.nama_paket asc");
	foreach ($query as $row){

			?>
			  <div class="panel-body">	
				<div class="panel-group" id="accordion">
				 <div class="panel panel-default">
					<div class="panel-heading">
					  <h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $no;?>"><font size="5px">
						Paket <?= $row['nama_paket']?> Rp. <?= $row['harga']?>,-</font></a>
					  </h4>
					</div>
					<div id="collapse<?php echo $no;?>" class="panel-collapse collapse">
					  <div class="panel-body">
					  <font size="5px">
					<?php
						$query = mysqli_query($koneksi, "SELECT * FROM bimbel , detail_bimbel , detail_paket , mata_pelajaran , paket WHERE bimbel.id_bimbel = detail_bimbel.id_bimbel and detail_paket.id_paket = detail_bimbel.id_paket and detail_paket.id_pelajaran = mata_pelajaran.id_pelajaran and detail_paket.id_paket = paket.id_paket and paket.nama_paket  = '$row[nama_paket]' and bimbel.id_bimbel  = '$_GET[id]' order by paket.nama_paket asc");
						foreach ($query as $row){
							echo $row['nama_pelajaran']."<br>";
						}
					?>
					</font>
					  </div>
					</div>
				  </div>
				</div>
			 </div>
<?php $no++;
	}?>
	</center>
	
		
	</div>
	</div>
</div>
</html>
