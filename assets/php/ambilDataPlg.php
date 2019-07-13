<?php
include "../../config/koneksi.php" ;
$id = $_GET['book_name'];
$sql = mysqli_query($konek, "SELECT * FROM books where book_name = '".$id."' LIMIT 1");
$row = mysqli_fetch_array($sql);
echo json_encode($row);

?>
