<?php
include "../../../../config/koneksi.php" ;
$q = strtolower($_GET["q"]);
if (!$q) return;

$sql = mysqli_query($konek, "SELECT * FROM books where book_name LIKE '%$q%'");
while($r = mysqli_fetch_array($sql)) {
$book_name = $r['book_name'];
	echo "$book_name \n";
}
?>
