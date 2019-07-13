<?php

//connect ke database
  mysql_connect("localhost","root","");
  mysql_select_db("bookstore");
//harus selalu gunakan variabel term saat memakai autocomplete,
//jika variable term tidak bisa, gunakan variabel q
$term = trim(strip_tags($_GET['term']));
  
$qstring = "SELECT * FROM books WHERE book_name LIKE '".$term."%'";
//query database untuk mengecek tabel anime
$result = mysql_query($qstring);
  
while ($row = mysql_fetch_array($result))
{
    $row['value']=htmlentities(stripslashes($row['book_name']));
    $row['book_id']=(int)$row['book_id'];
//buat array yang nantinya akan di konversi ke json
    $row_set[] = $row;
}
//data hasil query yang dikirim kembali dalam format json
echo json_encode($row_set);

/*// require connection.php
include "../../config/koneksi.php";
$q = strtolower($_GET['term']);
$query = mysqli_query($konek, "SELECT * FROM books where book_name like ‘%$q%’ order by book_id asc");
$num = mysqli_num_rows($query);
if($num > 0){
while ($row = mysqli_fetch_array($query)){
		$row_set[] = htmlentities(stripslashes($row[1]));
		}
	echo json_encode($row_set);
	}*/
?>