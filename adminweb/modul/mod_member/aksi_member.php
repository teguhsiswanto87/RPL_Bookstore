<?php
session_start();
if (empty($_SESSION['namamember']) AND empty($_SESSION['passmember'])) {
	echo "You Must to login ";
}else{
	include "../../../config/koneksi.php" ;
	include "../../../config/library.php" ;
// GET MEMBER & ACT
	$module 	= $_GET['module'];
	$act 	 	= $_GET['act'];

// INPUT MEMBER
if ($module=='member' AND $act=='input') {

	$nama		= $_POST['nama'];
	$jk			= $_POST['jk'];
	$alamat		= $_POST['alamat'];
	$kode_pos	= $_POST['kode_pos'];
	$kota		= $_POST['kota'];
	$phone		= $_POST['phone'];
	$email		= $_POST['email'];
	$password	= md5($_POST['password']);

	$input 	= "INSERT INTO member(nama, jenis_kelamin, alamat, kode_pos, id_kota, phone, email, password)
						VALUES('$nama','$jk', '$alamat', '$kode_pos', '$kota', '$phone', '$email', '$password' )";
	mysqli_query($konek,$input);
	header("location:../../media.php?module=".$module);
}

// UPDATE MEMBER
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
	header("location:../../media.php?module=".$module);
}

// HAPUS MEMBER
elseif ($module=='member' AND $act=='hapus') {
	mysqli_query($konek, "DELETE FROM member WHERE member_id='$_GET[id]' ");
	header("location:../../media.php?module=".$module);
	
}



} ?>