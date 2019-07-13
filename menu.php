<?php include "config/koneksi.php";
		$no=1;
		$query = "SELECT * FROM genre_book WHERE active='Y' ";
		$hasil = mysqli_query($konek, $query);
			while ($r=mysqli_fetch_array($hasil)) {
					echo "<li><a class=\"link-span\" href=\"$r[link]\">$r[genre]</a></li>";
				$no++;
				}
?>