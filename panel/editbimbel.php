<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" href="css/style.css">
<?php
include '../koneksi.php';
include 'cek_session.php';
?>
<html>
  <head>
  <title>Edit Bimbel</title>

  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

  </head>
<body id="LoginForm">
<?php
	$query = mysqli_query($koneksi, "SELECT * FROM bimbel where id_bimbel  = '$_GET[id_bimbel]'");
	$d = mysqli_fetch_array($query);
?>
<form method="POST" action="proseseditbimbel.php" enctype="multipart/form-data">
<CENTER>
  <h2>Edit Bimbel</h2>
 <img src='http://localhost/bimbelonline/tambah/foto/<?= $d['id_bimbel']?>.jpg' style='width:200px;height:200px' alt='img' class='img-circle'>
 <br>
 <input type="file" name="foto" />
 <input type="text" value="<?= $d['id_bimbel']?>" name="id_bimbel" hidden />
  <table class="table" style="width:800px;margin-top: 20px;">
  	<tr>
  		<td style="vertical-align: middle;"><b>Nama Bimbel</b></td>
  		<td style="vertical-align: middle;">:</td>
  		<td style="vertical-align: middle;"><input type="text" name="nama_bimbel" value="<?= $d['nama_bimbel']?>" class="form-control" required /></td>
  	</tr>
  	 <tr>
  		<td style="vertical-align: middle;"><b>Alamat Bimbel</b></td>
  		<td style="vertical-align: middle;">:</td>
  		<td style="vertical-align: middle;"><textarea rows="3" type="text"  name="alamat" class="form-control" required ><?= $d['alamat']?></textarea></td>
  	</tr>
  	<tr>
  		<td style="vertical-align: middle;"><b>No Telpon</b></td>
  		<td style="vertical-align: middle;">:</td>
  		<td style="vertical-align: middle;"><input type="text" value="<?= $d['telpon']?>" name="telpon" class="form-control" required /></td>
  	</tr>
   	<tr>
  		<td style="vertical-align: middle;"><b>Website</b></td>
  		<td style="vertical-align: middle;">:</td>
  		<td style="vertical-align: middle;"><input type="text" value="<?= $d['website']?>" name="website" class="form-control" required /></td>
  	</tr>
  	<tr>
  		<td style="vertical-align: middle;"><b>Latitude</b></td>
  		<td style="vertical-align: middle;">:</td>
  		<td style="vertical-align: middle;"><input type="text" value="<?= $d['latitude']?>" name="latitude" class="form-control" required /></td>
  	</tr>
   	<tr>
  		<td style="vertical-align: middle;"><b>Longitude</b></td>
  		<td style="vertical-align: middle;">:</td>
  		<td style="vertical-align: middle;"><input type="text" value="<?= $d['longitude']?>" name="longitude" class="form-control" required /></td>
  	</tr>
   	<tr>
  		<td style="vertical-align: middle;"><b>PAKET 1</b></td>
  		<td style="vertical-align: middle;">:</td>
  		<td style="vertical-align: middle;">
  			<select name="paket1" class="form-control">
  				<option value=""></option>
          <?php
            mysqli_next_result($koneksi);
            $query = mysqli_query($koneksi,"CALL tampilpaketByidLIMIT('$_GET[id_bimbel]',0,1)");
            foreach ($query as $row) {
              $namapaket1 = $row['nama_paket'];
            }
            mysqli_next_result($koneksi);
            $query = mysqli_query($koneksi,"CALL tampilpaket()");
            foreach ($query as $row) {
          ?>
          <option value="<?= $row['id_paket'] ?>" <?php if($row['nama_paket'] == $namapaket1){echo "selected";}?>><?= $row['nama_paket'] ?></option>
          <?php }?>
  			</select>
  		</td>
  	</tr>
  	<tr>
  		<td style="vertical-align: middle;"><b>PAKET 2</b></td>
  		<td style="vertical-align: middle;">:</td>
  		<td style="vertical-align: middle;">
  			<select name="paket2" class="form-control">
  				<option value=""></option>
  				<?php
            mysqli_next_result($koneksi);
            $query = mysqli_query($koneksi,"CALL tampilpaketByidLIMIT('$_GET[id_bimbel]',1,1)");
            foreach ($query as $row) {
              $namapaket2 = $row['nama_paket'];
            }
            mysqli_next_result($koneksi);
  					$query = mysqli_query($koneksi,"CALL tampilpaket()");
  					foreach ($query as $row) {
  				?>
  				<option value="<?= $row['id_paket'] ?>" <?php if($row['nama_paket'] == @$namapaket2){echo "selected";}?>><?= $row['nama_paket'] ?></option>
  				<?php }?>
  			</select>
  		</td>
  	</tr>
  	<tr>
  		<td style="vertical-align: middle;"><b>PAKET 3</b></td>
  		<td style="vertical-align: middle;">:</td>
  		<td style="vertical-align: middle;">
  			<select name="paket3" class="form-control">
  				<option value=""></option>
          <?php
            mysqli_next_result($koneksi);
            $query = mysqli_query($koneksi,"CALL tampilpaketByidLIMIT('$_GET[id_bimbel]',2,1)");
            foreach ($query as $row) {
              $namapaket3 = $row['nama_paket'];
            }
            mysqli_next_result($koneksi);
            $query = mysqli_query($koneksi,"CALL tampilpaket()");
            foreach ($query as $row) {
          ?>
          <option value="<?= $row['id_paket'] ?>" <?php if($row['nama_paket'] == @$namapaket3){echo "selected";}?>><?= $row['nama_paket'] ?></option>
          <?php }?>
  			</select>
  		</td>
  	</tr>
  </table>
  <input type="submit" value="SAVE" class="btn btn-primary" />
</CENTER>
</form>
</body>
</html>
