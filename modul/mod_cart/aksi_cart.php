<?php
include "../../config/koneksi.php";
include "../../config/library.php";

session_start(); 
if (empty($_SESSION['emailmember']) AND empty($_SESSION['passmember'])) {
	
//dapatkan modul
$act = $_GET['act'];
$module = $_GET['module'];

	/*BELUM LOGIN, MASIH PENGUNJUNG BIASA */

		//hapus isi keranjang belanja YANG SUDAH LAMA
		$lama = 1;
		mysqli_query($konek, "DELETE FROM carts WHERE DATEDIFF(CURDATE(), tanggal) > $lama ");

		// Input daftar keranjang buku
		if ($act=='input') {
			$buku = $_GET['buku'];
				$num = mysqli_num_rows(mysqli_query($konek, "SELECT * FROM carts WHERE book_id= '$_POST[book_id]' AND no_faktur='$_SESSION[session_id]' "));

				if ($num>0) {
					mysqli_query($konek, "UPDATE carts SET qty=qty+$_POST[qty], subtotal=qty*$_POST[subtotal], 
						total=subtotal*((100-$_POST[diskon])/100)
						WHERE no_faktur='$_SESSION[session_id]' AND book_id='$_POST[book_id]'  ");
				}else{
					mysqli_query($konek, "INSERT INTO carts (no_faktur, qty, book_id, subtotal, total,tanggal) 
								VALUES('$_SESSION[session_id]' ,  '$_POST[qty]' , '$_POST[book_id]' , '$_POST[subtotal]', 
								$_POST[qty]*($_POST[subtotal]*((100-$_POST[diskon])/100)), '$tanggal' ) ");
				}
			header("location:../../home.php?buku=".$buku);
		}

}else{

//dapatkan modul
$act = $_GET['act'];
$module = $_GET['module'];


//hapus isi keranjang belanja YANG SUDAH LAMA
$lama = 1;
mysqli_query($konek, "DELETE FROM carts WHERE DATEDIFF(CURDATE(), tanggal) > $lama ");

// Input daftar keranjang buku
if ($act=='input') {
	$buku = $_GET['buku'];
		$num = mysqli_num_rows(mysqli_query($konek, "SELECT * FROM carts WHERE book_id= '$_POST[book_id]' AND no_faktur='$_SESSION[session_id]' "));

		if ($num>0) {
			mysqli_query($konek, "UPDATE carts SET qty=qty+$_POST[qty], subtotal=qty*$_POST[subtotal], 
				total=subtotal*((100-$_POST[diskon])/100)
				WHERE no_faktur='$_SESSION[session_id]' AND book_id='$_POST[book_id]'  ");
		}else{
			mysqli_query($konek, "INSERT INTO carts (no_faktur, qty, book_id, subtotal, total,tanggal) 
						VALUES('$_SESSION[session_id]' ,  '$_POST[qty]' , '$_POST[book_id]' , '$_POST[subtotal]', 
						$_POST[qty]*($_POST[subtotal]*((100-$_POST[diskon])/100)), '$tanggal' ) ");
		}
	header("location:../../media.php?buku=".$buku);
}

// Hapus daftar keranjang buku
elseif ($module=='cart' AND $act=='hapus') {
	mysqli_query($konek, "DELETE FROM carts WHERE book_id='$_GET[id]' ");
	header("location:cart.php");
}

//update jumlah pembelian
elseif ($module=='cart' AND $act=='update') {
	$num = mysqli_num_rows(mysqli_query($konek, "SELECT * FROM carts WHERE book_id= '$_POST[book_id]' AND no_faktur='$_SESSION[session_id]' "));

		if ($num>0) {
			mysqli_query($konek, "UPDATE carts SET qty=$_POST[qty], subtotal=$_POST[qty]*$_POST[book_price], 
				total=subtotal*((100-$_POST[diskon])/100)
				WHERE no_faktur='$_SESSION[session_id]' AND book_id='$_POST[book_id]'  ");
		}else{
			echo "salah";
		}
	header("location:cart.php");
}

else{
	echo "salah";
}



} ?>