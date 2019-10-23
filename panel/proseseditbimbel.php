<?php
include 'cek_session.php';
include '../koneksi.php';

$query = mysqli_query($koneksi,"CALL updatebimbel('".$_POST['nama_bimbel']."','".$_POST['alamat']."','".$_POST['telpon']."','".$_POST['latitude']."','".$_POST['longitude']."','".$_POST['id_bimbel']."','".$_POST['website']."')") or die(mysqli_error($koneksi));

if($_POST['paket1'] and $_POST['paket2'] and $_POST['paket3']){
	$query = mysqli_query($koneksi,"CALL deletedetailbimbel('".$_POST['id_bimbel']."')") or die(mysqli_error($koneksi));;
	$query = mysqli_query($koneksi,"CALL insertdetailbimbel('".$_POST['id_bimbel']."','".$_POST['paket1']."')") or die(mysqli_error($koneksi));
	$query = mysqli_query($koneksi,"CALL insertdetailbimbel('".$_POST['id_bimbel']."','".$_POST['paket2']."')") or die(mysqli_error($koneksi));
	$query = mysqli_query($koneksi,"CALL insertdetailbimbel('".$_POST['id_bimbel']."','".$_POST['paket3']."')") or die(mysqli_error($koneksi));
}elseif($_POST['paket1'] and $_POST['paket2']){
	$query = mysqli_query($koneksi,"CALL deletedetailbimbel('".$_POST['id_bimbel']."')") or die(mysqli_error($koneksi));;
	$query = mysqli_query($koneksi,"CALL insertdetailbimbel('".$_POST['id_bimbel']."','".$_POST['paket1']."')") or die(mysqli_error($koneksi));
	$query = mysqli_query($koneksi,"CALL insertdetailbimbel('".$_POST['id_bimbel']."','".$_POST['paket2']."')") or die(mysqli_error($koneksi));
}elseif($_POST['paket1']){
	$query = mysqli_query($koneksi,"CALL deletedetailbimbel('".$_POST['id_bimbel']."')") or die(mysqli_error($koneksi));
	$query = mysqli_query($koneksi,"CALL insertdetailbimbel('".$_POST['id_bimbel']."','".$_POST['paket1']."')") or die(mysqli_error($koneksi));
}


$id = $_POST['id_bimbel'];

$filename = $_FILES["foto"]["name"];
	$file_basename = substr($filename, 0, strripos($filename, '.')); // get file extention
	$file_ext = substr($filename, strripos($filename, '.')); // get file name
	$filesize = $_FILES["foto"]["size"];
	$allowed_file_types = array('.jpg');	

	if (in_array($file_ext,$allowed_file_types) && ($filesize < 2000000))
	{	

		// Rename file
		$newfilename = $id . $file_ext;	
		move_uploaded_file($_FILES["foto"]["tmp_name"], "foto/" . $newfilename);
			
	}
	elseif (empty($file_basename))
	{	
		// file selection error
		//echo "Please select a file to upload.";
	} 
	elseif ($filesize > 2000000)
	{	
		// file size error
		echo "<script>alert('File Foto Terlali Besar');window.location.href='tambahbimbel.php';</script>";
	}
	else
	{
		// file type error
		echo "Only these file typs are allowed for upload: " . implode(', ',$allowed_file_types);
		unlink($_FILES["foto"]["tmp_name"]);
		echo "<script>alert('Format Foto Harus JPG');window.location.href='tambahbimbel.php';</script>";
	}


?>

<script language="javascript">
	alert("Data Berhasil di Ubah");
	document.location="tampilbimbel.php";
</script>