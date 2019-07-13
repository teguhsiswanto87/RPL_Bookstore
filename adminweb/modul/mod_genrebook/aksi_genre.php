<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])) {
	echo "You Must to login ";
}else{
	include "../../../config/koneksi.php" ;
	include "../../../config/library.php" ;
// GET MODULE & ACT
	$module 	= $_GET['module'];
	$act 	 	= $_GET['act'];

// INPUT GENRE
if ($module=='genre' AND $act=='input' ) {
	$genre		= $_POST['genre'];
	$link		= $_POST['link'];
	$input 	= "INSERT INTO genre_book(genre,link)VALUES('$genre','$link')";
	mysqli_query($konek,$input);
	header("location:../../media.php?module=".$module);
}

// UPDATE GENRE
elseif ($module=='genre' AND $act=='edit' ) {
	$id			= $_POST['id'];
	$genre		= $_POST['genre'];
	$link		= $_POST['link'];
	$active		= $_POST['active'];

	$update 	= "UPDATE genre_book SET genre	='$genre', link ='$link', active='$active' WHERE id_genre	='$id' ";
	mysqli_query($konek, $update);
	header("location:../../media.php?module=".$module);
}

// HAPUS GENRE
elseif ($module=='genre' AND $act=='hapus' ) {
	mysqli_query($konek, "DELETE FROM genre_book WHERE id_genre='$_GET[id]' ");
	header("location:../../media.php?module=".$module);
}


} ?>