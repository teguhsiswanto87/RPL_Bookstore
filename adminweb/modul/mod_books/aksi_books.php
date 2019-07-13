<?php
session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])) {
	echo "You Must to login ";
}else{
	include "../../../config/koneksi.php" ;
	include "../../../config/library.php" ;
	include "../../../config/fungsi_thumbnail_book.php" ;
// GET BOOK & ACT
	$module 	= $_GET['module'];
	$act 	 	= $_GET['act'];

// INPUT BOOK
if ($module=='books' AND $act=='input' ) {
	$genre		= $_POST['genre'];
	$book_name	= $_POST['book_name'];
	$book_price	= $_POST['book_price'];
	$stock		= $_POST['stock'];
	$diskon		= $_POST['diskon'];
	$author		= $_POST['author'];
	$lokasi_file	= $_FILES['fupload']['tmp_name'];
	$nama_file		= $_FILES['fupload']['name'];
	//random image name
	$acak		= rand(1,99);
	$nama_foto	= $acak.$nama_file;
	// if image is none
	if (empty($lokasi_file)) {
		$input 	= "INSERT INTO books(id_genre, book_name, book_price, stock, diskon, author, tanggal)
					VALUES('$genre', '$book_name', '$book_price', '$stock', '$diskon', '$author', '$tgl_sekarang')";
		mysqli_query($konek,$input);
	}else{
		UploadImage($nama_foto);
		$input 	= "INSERT INTO books(id_genre, book_name, book_price, stock, diskon, author, tanggal, gambar)
					VALUES('$genre', '$book_name', '$book_price', '$stock', '$diskon', '$author', '$tgl_sekarang','$nama_foto')";
		mysqli_query($konek,$input);
	}

	header("location:../../media.php?module=".$module);
}

// UPDATE BOOK
elseif ($module=='books' AND $act=='edit' ) {
	$id			= $_POST['id'];
	$book_name	= $_POST['book_name'];
	$genre		= $_POST['genre'];
	$book_price	= $_POST['book_price'];
	$diskon		= $_POST['diskon'];
	$author		= $_POST['author'];
	$bestseller	= $_POST['bestseller'];
	$lokasi_file = $_FILES['fupload']['tmp_name'];
    $nama_file   = $_FILES['fupload']['name'];
    //random image name
	$acak		= rand(1,99);
	$nama_gambar	= $acak.$nama_file;

	if (empty($lokasi_file)) {
		$update 	= "UPDATE books SET book_name	='$book_name',
										id_genre 	='$genre',
										book_price 	='$book_price',
										diskon	 	='$diskon',
										author  	='$author',
										bestseller  ='$bestseller'
									WHERE book_id	='$id' ";
		mysqli_query($konek, $update);
	}else{
		UploadImage($nama_gambar);
		$update 	= "UPDATE books SET book_name	='$book_name',
										id_genre 	='$genre',
										book_price 	='$book_price',
										diskon	 	='$diskon',
										author  	='$author',
										bestseller  ='$bestseller',
										gambar 		='$nama_gambar'
									WHERE book_id	='$id' ";
		mysqli_query($konek, $update);
	}
	header("location:../../media.php?module=".$module);
}

// DELETE BOOK
elseif ($module='books' AND $act='hapus' ) {
	$query 	= "SELECT * FROM books WHERE book_id='$_GET[id]' ";
	$hasil 	= mysqli_query($konek, $query);
	$r 		= mysqli_fetch_array($hasil);

	if ($r['gambar']!=='') {
		$namafile = $r['gambar'];
		// delete image in folder 'books_image'
		unlink("../../../books_image/$namafile");
		// delete file in database
		mysqli_query($konek, "DELETE FROM books WHERE book_id='$_GET[id]' ");
	}else{
		mysqli_query($konek, "DELETE FROM books WHERE book_id='$_GET[id]' ");
	}
	header("location:../../media.php?module=".$module);
}

} ?>