<?php
include "../config/koneksi.php";

if ($_SESSION['leveluser']=='admin') {
	$query	= "SELECT * FROM genre_book ORDER BY genre ";
	$hasil	= mysqli_query($konek, $query);
	while ($r=mysqli_fetch_array($hasil)) {
		echo "<li><a href=\"$r[link]\">&nbsp;$r[genre] </a></li>";
	}
}else{
	echo "You is't  Admin";
}

?>