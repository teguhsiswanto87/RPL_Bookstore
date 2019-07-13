<?php
session_start(); 
if (empty($_SESSION['emailmember']) AND empty($_SESSION['passmember'])) {
	echo "Login dulu mas bro !";
}else{
	include "../../config/koneksi.php";
	include "../../config/library.php";

// get value method
$act = $_GET['act'];

// simpan transaksi
if ($act == 'submit'){
	
	// ambil data cart
$sql = mysqli_query($konek, "SELECT * FROM carts A INNER JOIN books B ON A.book_id=B.book_id WHERE A.no_faktur = '$_SESSION[session_id]'");
	
	$profil = mysqli_fetch_array(mysqli_query($konek, "SELECT * FROM member WHERE member_id = '$_SESSION[id_member]'"));
	$kota = mysqli_fetch_array(mysqli_query($konek, "SELECT * FROM kota A INNER JOIN provinsi B ON A.id_provinsi=B.id_provinsi WHERE id_kota = '$profil[id_kota]'"));
	while ($data = mysqli_fetch_array($sql)){
		
		// copykan ke tabel order
		$hasil=mysqli_query($konek, "INSERT INTO orders (no_faktur,
											member_id,
											nama,
											alamat,
											nama_kota,
											kode_pos,
											phone,
											book_id,
											qty,
											subtotal,
											tanggal,
											status,
											ekspedisi,
											no_resi)
									VALUES(	'$_SESSION[session_id]',
											'$_SESSION[id_member]',
											'$profil[nama]',
											'$profil[alamat]',
											'$kota[nama_kota], $kota[nama_provinsi]',
											'$profil[kode_pos]',
											'$profil[phone]',
											'$data[book_id]',
											'$data[qty]',
											'$data[total]',
											'$tanggal',
											'1',
											'JNE',
											'')");
		
	}//tutup WHILE

		if ($hasil) {
			//hapus di CART tetapi dipindahkan di ORDERS
			mysqli_query($konek, "DELETE FROM carts WHERE no_faktur='$_SESSION[session_id]' ");
			header("location:../../media.php?buku=all");
		}else{
			echo "Salah";
		}
	
}//tutupe if

elseif ($act=='cekbukti') {
	$akali		=$_POST['akali'];
	$no_faktur	=$_POST['no_faktur'];
	$r=mysqli_fetch_array(mysqli_query($konek, "SELECT no_faktur,member_id,akali FROM orders WHERE member_id='$_SESSION[id_member]' 
			AND no_faktur='$no_faktur' "));
	if ($r['akali']==$akali) {
			//kurangi jumlah stock buku setelah dibeli
			$sql2 = mysqli_query($konek, "SELECT * FROM orders A INNER JOIN books B 
				ON A.book_id=B.book_id WHERE A.no_faktur='$no_faktur' AND A.member_id='$_SESSION[id_member]' AND A.status='1'  ");
			while ($data = mysqli_fetch_array($sql2)) {
				mysqli_query($konek,"UPDATE books SET stock=stock-$data[qty] WHERE book_id=$data[book_id] ");
			}
			//update status
			$u=mysqli_query($konek, "UPDATE orders SET status=2 WHERE member_id='$_SESSION[id_member]' AND akali='$akali' ");
			
		if ($u) {
			header("location:order.php");
		}else{
			echo "ada yang salah cek ini $data[status] $no_faktur";
		}
	}else{
		echo "<script>alert('No.Faktur atau Bukti Pembayaran Salah '); window.location='../mod_cart/order.php' </script>";
	}
}

} //tutup else ?>