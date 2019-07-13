<?php
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])) {
	echo "You Must to login ";
}else{
include "../config/koneksi.php" ;
$hasil	= mysqli_query($konek, "SELECT * FROM users WHERE username='$_SESSION[namauser]' ");
$r 		= mysqli_fetch_array($hasil);

} ?>