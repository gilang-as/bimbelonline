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
  <title>Tambah Paket</title>

  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

  </head>
<body id="LoginForm">
<form method="POST" action="prosestambahpaket.php">
<CENTER>
  <h2>Edit Paket</h2>
  <table class="table" style="width:800px;margin-top: 20px;">
  	<tr>
  		<td style="vertical-align: middle;"><b>Nama Paket</b></td>
  		<td style="vertical-align: middle;">:</td>
  		<td style="vertical-align: middle;"><input type="text" name="nama_paket" class="form-control" required /></td>
  	</tr>
  	 <tr>
  		<td style="vertical-align: middle;"><b>Harga</b></td>
  		<td style="vertical-align: middle;">:</td>
  		<td style="vertical-align: middle;"><input type="text" name="harga" class="form-control" required /></td>
  	</tr>
    <tr>
      <td style="vertical-align: middle;"><b>MAPEL 1</b></td>
      <td style="vertical-align: middle;">:</td>
      <td style="vertical-align: middle;">
        <select required name="mapel1" class="form-control">
          <option value=""></option>
          <?php
            
            mysqli_next_result($koneksi);
            $query = mysqli_query($koneksi,"CALL tampilmapel()") or die(mysqli_error($koneksi));
            foreach ($query as $row) {
          ?>
          <option value="<?= $row['id_pelajaran'] ?>"><?= $row['nama_pelajaran'] ?></option>
          <?php }?>
        </select>
      </td>
    </tr>
     <tr>
      <td style="vertical-align: middle;"><b>MAPEL 2</b></td>
      <td style="vertical-align: middle;">:</td>
      <td style="vertical-align: middle;">
        <select name="mapel2" class="form-control">
          <option value=""></option>
          <?php
            
            mysqli_next_result($koneksi);
            $query = mysqli_query($koneksi,"CALL tampilmapel()") or die(mysqli_error($koneksi));
            foreach ($query as $row) {
          ?>
          <option value="<?= $row['id_pelajaran'] ?>"><?= $row['nama_pelajaran'] ?></option>
          <?php }?>
        </select>
      </td>
    </tr>
     <tr>
      <td style="vertical-align: middle;"><b>MAPEL 3</b></td>
      <td style="vertical-align: middle;">:</td>
      <td style="vertical-align: middle;">
        <select name="mapel3" class="form-control">
          <option value=""></option>
          <?php
            
            mysqli_next_result($koneksi);
            $query = mysqli_query($koneksi,"CALL tampilmapel()") or die(mysqli_error($koneksi));
            foreach ($query as $row) {
          ?>
          <option value="<?= $row['id_pelajaran'] ?>"><?= $row['nama_pelajaran'] ?></option>
          <?php }?>
        </select>
      </td>
    </tr>
     <tr>
      <td style="vertical-align: middle;"><b>MAPEL 4</b></td>
      <td style="vertical-align: middle;">:</td>
      <td style="vertical-align: middle;">
        <select name="mapel4" class="form-control">
          <option value=""></option>
          <?php
            
            mysqli_next_result($koneksi);
            $query = mysqli_query($koneksi,"CALL tampilmapel()") or die(mysqli_error($koneksi));
            foreach ($query as $row) {
          ?>
          <option value="<?= $row['id_pelajaran'] ?>"><?= $row['nama_pelajaran'] ?></option>
          <?php }?>
        </select>
      </td>
    </tr>
     <tr>
      <td style="vertical-align: middle;"><b>MAPEL 5</b></td>
      <td style="vertical-align: middle;">:</td>
      <td style="vertical-align: middle;">
        <select name="mapel5" class="form-control">
          <option value=""></option>
          <?php
            
            mysqli_next_result($koneksi);
            $query = mysqli_query($koneksi,"CALL tampilmapel()") or die(mysqli_error($koneksi));
            foreach ($query as $row) {
          ?>
          <option value="<?= $row['id_pelajaran'] ?>"><?= $row['nama_pelajaran'] ?></option>
          <?php }?>
        </select>
      </td>
    </tr>
  </table>
  <input type="submit" value="TAMBAH" class="btn btn-primary" />
</CENTER>
</form>
</body>
</html>
