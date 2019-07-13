<?php
include "../config/koneksi.php";

if ($_SESSION['leveluser']=='admin') {
	$query	= "SELECT * FROM modul ORDER BY urutan ";
	$hasil	= mysqli_query($konek, $query);
	while ($r=mysqli_fetch_array($hasil)) {
		echo "<li><a href=\"$r[link]\"><i class=\"fi-$r[icon]\"></i>&nbsp;$r[nama_modul] </a></li>";
	}
}else{
	echo "You is't  Admin";
}

?>