<?php
include "../config/koneksi.php";
// Get variable username & password
$username	= $_POST['username'];
$password	= md5($_POST['password']);
// check in database
$query	= "SELECT * FROM users WHERE username='$username' AND password='$password' ";
$login	= mysqli_query($konek, $query);
$ketemu	= mysqli_num_rows($login);
$data 	= mysqli_fetch_array($login);
// if user find in database
if ($ketemu>0) {
	session_start();
	// make session variable
	$_SESSION['namauser']=$data['username'];
	$_SESSION['passuser']=$data['password'];
	$_SESSION['leveluser']=$data['level'];
	// always UPDATE id_session
	$sid_lama=session_id();
	session_regenerate_id();
	$sid_baru=session_id();
	mysqli_query($konek, "UPDATE users SET id_session='$sid_baru' WHERE username='$username' ");
	// doing redirect
	header("location:media.php?module=dash");
}else{
	echo "username or password is wrong";
}

?>