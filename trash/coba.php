<?php
 include "config/koneksi.php"; 
	$ambil="SELECT SUM(qty) AS jumlah FROM carts  "; 
	$jukuk=mysqli_query($konek,$ambil);
	$row = mysqli_fetch_array($jukuk); 
		 echo "Jumlah Barang : Rp. " . number_format($row['jumlah']) . "";

?>