<?php
	session_start();
if(@$_SESSION['user']){
	
}else{
?>
	<script language="javascript">
	alert("Maaf Anda Tidak Bisa Mengakses Halaman Ini");
	document.location="index.php";
	</script>
<?php
}
?>