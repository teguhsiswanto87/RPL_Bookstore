<?php
include "config/koneksi.php";
$lama = 1;
$hasil=mysqli_query($konek, "DELETE FROM carts WHERE DATEDIFF(CURDATE(), tanggal) > $lama ");
if ($hasil) {
	echo "berhasil";
}else{
	echo "salah";
}
?>