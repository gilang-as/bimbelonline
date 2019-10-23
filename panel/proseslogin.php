<?php
session_start();
include '../koneksi.php';

$query = mysqli_query($koneksi,"CALL cekuser('".$_POST['username']."','".$_POST['password']."')");

$result = mysqli_num_rows($query);

if($result){
	$_SESSION['user'] = $_POST['username'];
	echo "<script>document.location='home.php'</script>";
}else{
?>
	<script language="javascript">
	alert("Username / Password Salah !");
	document.location="index.php";
	</script>
<?php
}

?>