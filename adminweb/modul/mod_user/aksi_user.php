<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])) {
	echo "You Must to login ";
}else{
	include "../../../config/koneksi.php" ;
	include "../../../config/library.php" ;
// GET USER & ACT
	$module 	= $_GET['module'];
	$act 	 	= $_GET['act'];

// INPUT USER
if ($module=='user' AND $act=='input' ) {
	$username		= $_POST['username'];
	$password		= md5($_POST['password']);
	$nama_lengkap	= $_POST['nama_lengkap'];
	$email			= $_POST['email'];
	$alamat			= $_POST['alamat'];

	$input 	= "INSERT INTO users(username, password, nama_lengkap, email, alamat)
						VALUES('$username','$password', '$nama_lengkap', '$email', '$alamat')";
	mysqli_query($konek,$input);
	header("location:../../media.php?module=".$module);
}

// UPDATE USER
elseif ($module=='user' AND $act=='edit' ) {
	$id				= $_POST['id'];
	$nama_lengkap	= $_POST['nama_lengkap'];
	$alamat			= $_POST['alamat'];

	if (empty($_POST['password'])) {	
		$update 	= "UPDATE users SET nama_lengkap ='$nama_lengkap',
											alamat 	 ='$alamat'
									WHERE username ='$id' ";
		mysqli_query($konek, $update);
	}else{
		$password	= md5($_POST['password']);
		$update 	= "UPDATE users SET nama_lengkap='$nama_lengkap',
										alamat 	 	='$alamat',
										password 	='$password'
									WHERE username='$id' ";
		mysqli_query($konek, $update);
	}
	header("location:../../media.php?module=".$module);
}


} ?>