<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])) {
	echo "You Must to login ";
}else{
	include "../../../config/koneksi.php" ;
// GET MODULE & ACT
	$module 	= $_GET['module'];
	$act 	 	= $_GET['act'];

// INPUT letak provinsi
if ($module=='letak' AND $act=='input' ) {
	$nama_provinsi	= $_POST['nama_provinsi'];

	$input 	= "INSERT INTO provinsi(nama_provinsi)VALUES('$nama_provinsi')";
	mysqli_query($konek,$input);
	header("location:../../media.php?module=".$module);
}
// INPUT letak kota
elseif ($module=='letak' AND $act=='inputkota' ) {
	$nama_kota		= $_POST['nama_kota'];
	$id_provinsi	= $_POST['id_provinsi'];

	$input 	= "INSERT INTO kota(nama_kota, id_provinsi)VALUES('$nama_kota','$id_provinsi')";
	mysqli_query($konek,$input);
	header("location:../../media.php?module=".$module);
}

// DELETE letak
elseif ($module=='letak' AND $act=='hapus' ) {
	mysqli_query($konek, "DELETE FROM provinsi WHERE id_provinsi='$_GET[id]' ");
	header("location:../../media.php?module=".$module);
}
// DELETE letak kota
elseif ($module=='kota' AND $act=='hapuskota' ) {
	mysqli_query($konek, "DELETE FROM kota WHERE id_kota='$_GET[id]' ");
	header("location:../../media.php?module=".$module);
}




} ?>