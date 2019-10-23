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
  <title>Edit Paket</title>

  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

  </head>
<body id="LoginForm">
<form method="POST" action="prosestambahmapel.php">
<CENTER>
  <h2>Tambah Mapel</h2>
  <table class="table" style="width:800px;margin-top: 20px;">
  	<tr>
  		<td style="vertical-align: middle;"><b>Nama Mapel</b></td>
  		<td style="vertical-align: middle;">:</td>
  		<td style="vertical-align: middle;"><input type="text" name="nama_mapel" class="form-control" required /></td>
  </table>
  <input type="submit" value="TAMBAH" class="btn btn-primary" />
</CENTER>
</form>
</body>
</html>
