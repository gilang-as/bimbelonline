<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" href="css/style.css">
<?php
error_reporting(0);
include 'cek_session.php';
include '../koneksi.php';
?>
<html>
  <head>
  <title>Tampil Mapel</title>

  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

  </head>
<body id="LoginForm">
<CENTER>
  <h2>Daftar Mapel</h2>
</CENTER>

<form method="get" action="">
<div class="form-inline">
  <input type="text" name="kuncicari" class="form-control" style="width: 200px;" placeholder="Nama Mapel" />
  <input type="submit" value="CARI" style="margin-left: 10px;" class="btn btn-primary" />
  <a href="tambahmapel.php" style="margin-left: 10px;" class="btn btn-info">Tambah</a>
</div>
<br>
<table class="table table-hover table-striped">
  <tr class="bg-primary">
    <th class="text-center">NO</th>
    <th class="text-center">ID Mapel</th>
    <th class="text-center">Nama Mapel</th>
    <th class="text-center">Aksi</th>
  </tr>
  <?php
      $batas = 10;
      @$hal = @$_GET[hal];
      if (empty(@$hal)) {
        $posisi = 0;
        $hal = 1;
      }else{
        $posisi = ($hal-1) * $batas;
      }
    ?>
    <?php
    if(@$_GET[kuncicari]){
      $tampil = mysqli_query($koneksi, "CALL tampilmapelByNama('%".$_GET['kuncicari']."%')") or die(mysqli_error($koneksi));
        mysqli_free_result($koneksi);
        mysqli_next_result($koneksi);
      $sql = mysqli_query($koneksi,"CALL tampilmapel()");
          $jmldat = mysqli_num_rows($tampil);
          $no = $posisi + 1;
      }else{
      $tampil = mysqli_query($koneksi, "CALL tampilmapelByLimit($posisi,$batas)");
        mysqli_free_result($koneksi);
        mysqli_next_result($koneksi);
      $sql = mysqli_query($koneksi,"CALL tampilmapel()");
          $jmldat = mysqli_num_rows($sql);
          $no = $posisi + 1;
      }
    while ($d = mysqli_fetch_array($tampil)) {
    ?>
    <tr class="bg-info">
      <td class="text-center" style="vertical-align: middle;"><?= $no ?></td>
      <td class="text-center" style="vertical-align: middle;"><?= $d['id_pelajaran'] ?></td>
      <td class="text-center" style="vertical-align: middle;"><?= $d['nama_pelajaran'] ?></td>
      <td class="text-center" style="vertical-align: middle;">
      <a class="btn btn-danger btn-sm" href="proseshapusmapel.php?id_mapel=<?php echo $d['id_pelajaran']?>">HAPUS</a>
      </td>
    </tr>
    <?php
      $no++;
    }
    ?>
</table>
    <tr>
      <td colspan="12" align="right"><div align="right" class="style5">JUMLAH DATA : <?php echo $jmldat ?> data</div></td>
    </tr>

    <center>

    <?php
      $jmlhal = ceil($jmldat/$batas);
      $url = "tampilmapel.php";
    if ($hal>1) {
      $previous=$hal-1;
      echo "<a class='btn btn-warning' href=$url?hal=1><< First&nbsp;</a>  <a class='btn btn-info' href=$url?hal=$previous>&nbsp; < Prev &nbsp;</a>  ";
    }else {
      echo "<< First  < Prev ";
    }
    if ($hal <$jmlhal) {
      $next = $hal+1;
      echo "<a class='btn btn-info'  href=$url?hal=$next> Next > &nbsp;</a>  <a class='btn btn-warning' href=$url?hal=$jmlhal> Last >> </a>";
    }else {
      echo "  Next >  Last >>";
      }
    ?>
  </cente
</form>
</body>
</html>
