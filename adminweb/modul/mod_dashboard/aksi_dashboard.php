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

// UPDATE STSTUS
if ($module=='dash' AND $act=='up' ) {
	$hasil 	= mysqli_query($konek, "SELECT * FROM orders WHERE no_faktur='$_GET[id]' ");
		while ($r= mysqli_fetch_array($hasil)) {
			$aja=mysqli_query($konek,"UPDATE orders SET status=3 WHERE no_faktur='$_GET[id]' ");

			}
	header("location:../../media.php?module=".$module);
}
elseif ($module=='dash' AND $act=='down' ) {
	$hasil 	= mysqli_query($konek, "SELECT * FROM orders WHERE no_faktur='$_GET[id]' ");
		while ($r= mysqli_fetch_array($hasil)) {
			$aja=mysqli_query($konek,"UPDATE orders SET status=2 WHERE no_faktur='$_GET[id]' ");

			}
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


} ?>