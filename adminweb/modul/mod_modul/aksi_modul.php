<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])) {
	echo "You Must to login ";
}else{
	include "../../../config/koneksi.php" ;
// GET MODULE & ACT
	$module 	= $_GET['module'];
	$act 	 	= $_GET['act'];

// INPUT MODULE
if ($module=='modul' AND $act=='input' ) {
	// find the last sort
	$query= mysqli_query($konek, "SELECT urutan FROM modul ORDER BY urutan DESC LIMIT 1");
	$r=mysqli_fetch_array($query);

	$urutan		= $r['urutan']+1;
	$nama_modul	= $_POST['nama_modul'];
	$link	= $_POST['link'];
	$icon	= $_POST['icon'];

	$input 	= "INSERT INTO modul(nama_modul, link, icon,urutan)VALUES('$nama_modul','$link','$icon','$urutan')";
	mysqli_query($konek,$input);
	header("location:../../media.php?module=".$module);
}

// UPDATE MODULE
elseif ($module=='modul' AND $act=='edit' ) {
	$id			= $_POST['id'];
	$nama_modul	= $_POST['nama_modul'];
	$link		= $_POST['link'];
	$icon		= $_POST['icon'];
	$urutan		= $_POST['urutan'];

	$update 	= "UPDATE modul SET nama_modul	='$nama_modul',
										link 	='$link',
										icon 	='$icon',
										urutan 	='$urutan'
								WHERE id_modul	='$id' ";
	mysqli_query($konek, $update);
	header("location:../../media.php?module=".$module);
}


} ?>