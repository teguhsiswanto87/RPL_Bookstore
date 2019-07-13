<html>
<head>
	<title>Indomart</title>

	<link rel="stylesheet" type="text/css" href="../assets/foundation-5/css/foundation-index.css">
	<link rel="stylesheet" type="text/css" href="../assets/foundation-icons/foundation-icons.css">
	<script src="../assets/foundation-5/js/vendor/modernizr.js"></script>

	
</head>
<body>
<?php session_start();
	include "../config/koneksi.php";  
 	include "../config/library.php"; 

			 	//ambil datanya
			$input_cek = $_POST['input_cek'];//ini no_faktur
			$ambil2="SELECT SUM(subtotal) AS sub, nama, akali,status FROM orders WHERE no_faktur='$input_cek' AND status=1  "; 
							$jukuk=mysqli_query($konek,$ambil2);
							$itung = mysqli_fetch_array($jukuk);
 	//jika belum dibayar
		if ($itung['akali']==0 AND $itung['status']==1 ) {
			 	//buat kode bukti pembayaran
				$kode=mt_rand(100000000,999999999);
				mysqli_query($konek, "UPDATE orders SET akali='$kode' WHERE no_faktur='$input_cek' ");
				//ambil kode yg udah updet
				$ea=mysqli_fetch_array(mysqli_query($konek, "SELECT akali FROM orders WHERE no_faktur='$input_cek' "));
 				$input_tunai = $_POST['input_tunai'];

				$kembali=$input_tunai-$itung['sub'];

	echo "<div class=\"row\">
			<div class=\"columns medium-5 panel medium-centered text-right\">
			<img src=\"../images/logo_indomaret.png\">
				<kbd class=\"left\">Atas Nama : <b>$itung[nama] </b> </kbd> <br>
				<kbd class=\"left\">No.Faktur : <b>$input_cek </b> </kbd> <br>

				HARGA TOTAL : ".number_format($itung['sub'])."  <br>
				TUNAI : ".number_format($input_tunai)."  <br>
				----------------------------------- <br>
				KEMBALI : ".number_format($kembali)."  <br><br>
				<p class=\"lead text-justify\">Kode : $ea[akali]</p>
				<p class=\"text-center\">Masukkan Kode ini ke Bokstore sebagai Bukti pembayaran</p>
			</div>
		</div>";

		}elseif ($itung['akali']!=0 AND $itung['status']!=1) {
			echo "<div class=\"columns medium-5 panel medium-centered\">
				Data ini Sebelumnya Sudah Dibayar dengan Kode Bukti Pembayaran <p class=\"lead\">$itung[akali]</p>
				<p>Masukkan kode ini ke Bookstore</p>
				<a class=\"button small warning\" href=\"index.php\">&laquo; Kembali</a>
			</div>";
		}

		echo "<a href=\"index.php\" class=\"button small\">&laquo; Kembali</a>";
?>
</body>
<script src="../assets/foundation-5/js/vendor/jquery.js"></script>
<script src="../assets/foundation-5/js/foundation.min.js"></script>
<script>
	$(document).foundation();
</script>
</body>
</html>