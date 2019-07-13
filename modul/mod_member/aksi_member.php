<?php
session_start(); 
if (empty($_SESSION['emailmember']) AND empty($_SESSION['passmember'])) {

	include "../../config/koneksi.php" ;
	$act	=$_GET['act'];
	$module	=$_GET['module'];
	// daftar jika sudah pilih barang ke CART
	if ($module=='member' AND $act=='input') {
		# code...
		$nama		= $_POST['nama'];
		$email		= $_POST['email'];
		$password	= md5($_POST['password']);
		$jk			= $_POST['jk'];

		$input 	= "INSERT INTO member(nama, email, password, jenis_kelamin)
							VALUES('$nama','$email', '$password', '$jk')";
		mysqli_query($konek,$input);
		header("location:../../home.php?buku=all");
	}

}else{
	include "../../config/koneksi.php" ;

$act	=$_GET['act'];
$module	=$_GET['module'];
//$buku=$_GET['buku'];

// daftar
if ($module=='member' AND $act=='input') {
	# code...
	$nama		= $_POST['nama'];
	$email		= $_POST['email'];
	$password	= md5($_POST['password']);
	$jk			= $_POST['jk'];

	$input 	= "INSERT INTO member(nama, email, password, jenis_kelamin)
						VALUES('$nama','$email', '$password', '$jk')";
	mysqli_query($konek,$input);
	header("location:../../?buku=all");
}
// update kelola data
elseif ($module=='member' AND $act=='update') {
	$id 		= $_POST['id'];
	$nama		= $_POST['nama'];
	$alamat		= $_POST['alamat'];
	$kota		= $_POST['kota'];
	$kode_pos	= $_POST['kode_pos'];
	$phone		= $_POST['phone'];

	if (empty($kota)) {
		$update = "UPDATE member SET nama='$nama',
								 alamat='$alamat',
								 kode_pos='$kode_pos',
								 phone='$phone'
							WHERE member_id='$id' ";
		mysqli_query($konek,$update);
	}else{
		$update = "UPDATE member SET nama='$nama',
								 alamat='$alamat',
								id_kota='$kota',
								 kode_pos='$kode_pos',
								 phone='$phone'
							WHERE member_id='$id' ";
		mysqli_query($konek,$update);
	}
	header("location:media_member.php?module=".$module);
}
// update PASSWORD kelola data
elseif ($module=='member' AND $act=='ganpas') {
	$id 		= $_POST['id'];
	$passbar		= md5($_POST['passbar']);
	$update = "UPDATE member SET password='$passbar'WHERE member_id='$id' ";
	mysqli_query($konek,$update);
	header("location:media_member.php?module=".$module);
}


} ?>
