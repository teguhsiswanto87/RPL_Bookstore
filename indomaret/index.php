<?php session_start(); $_SESSION['session_id']=substr(session_id(),0,12);
 include "../config/koneksi.php";  
 include "../config/library.php";  
 ?>
<html>
<head>
	<title>Indomart</title>

	<link rel="stylesheet" type="text/css" href="../assets/foundation-5/css/foundation-index.css">
	<link rel="stylesheet" type="text/css" href="../assets/foundation-icons/foundation-icons.css">
	<script src="../assets/foundation-5/js/vendor/modernizr.js"></script>

	
</head>
<body>

<!-- bayar dari indomaret -->
<div class="row">
	<div class="columns medium-5 medium-centered panel text-center">
		<img src="../images/logo_indomaret.png">
		<blockquote>
			<h4>Khusus Bookstore</h4>
		</blockquote>
		<form method="POST">
			<input type="text" name="input_cek" placeholder="Masukkan Kode Pemesanan atau No.Faktur">
			<input type="submit" name="cek" class="button small radius" value="Check" >
		</form>
	</div>
</div>
<?php 
			$cek = @$_POST['cek']; 
		if ($cek) {
			$input_cek = @$_POST['input_cek']; 

		 
		$sql = mysqli_query($konek, "SELECT * FROM orders WHERE no_faktur='$input_cek' AND status=1 ");   
		$t=mysqli_fetch_array($sql);
		$jumlah = mysqli_num_rows($sql);
		
	 // jika data kurang dari 1 atau tidak ditemukan
	 if($jumlah < 1) {
	 	echo "<script>alert('Data Tidak Ditemukan '); </script> ";

	 } else {
	 	echo "<script>alert('Berhasil Menemukan Data'); </script> ";
		echo "<div class=\"row\"><div class=\"columns large-7 small-centered\"> 
			<p> Atas Nama : <b>$t[nama] </b> </p> 
			<p> No.Faktur : <b>$t[no_faktur] </b> </p> ";
		echo "<table class=\"table-hover\">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Produk</th>
						<th width=\"25px\">Jumlah</th>
						<th>Harga</th>
						<th class=\"text-center\">Subtotal</th>

					</tr>
				</thead>
				<tbody>";
						// mengulangi data agar tidak hanya 1 yang tampil
							$no=1;
		$sql2 = mysqli_query($konek, "SELECT * FROM orders A INNER JOIN books B ON A.book_id=B.book_id WHERE no_faktur='$input_cek' AND status=1 ");   
						   while($data = mysqli_fetch_array($sql2)) {
						   	$harga=format_rupiah($data['book_price']*(100-$data['diskon'])/100);
						   	$total=format_rupiah($data['subtotal']);
							   	echo "<tr>
									<td> $no </td>
									<td> $data[book_name] </td>
									<td> $data[qty] </td>
									<td> $harga </td>
									<td class=\"right\"> $total </td>
								</tr>";
								$no++;
							}
		//ambil total semua harga							
		$ambil2="SELECT SUM(subtotal) AS sub,akali,status FROM orders WHERE no_faktur='$input_cek' AND status=1 "; 
						$jukuk=mysqli_query($konek,$ambil2);
						$itung = mysqli_fetch_array($jukuk);
							//$totali = $itung['subtotal']*((100-$itung['diskon'])/100
		echo "</tbody>
				<tfoot>
						
					<form method=\"POST\" action=\"aksi_cek.php\">";
				if ($itung['akali']==0 AND $itung['status']==1 ) {
						echo "<tr>
							<th colspan=\"4\"> <p class=\"right\">TOTAL :</p></th>
							<th colspan=\"1\"> <p class='right'> " . format_rupiah($itung['sub']) . "</p></th>
						</tr>
						<tr>
							<th colspan=\"3\"> <p class=\"right\">TUNAI :</p></th>
							<th colspan=\"2\"> <input type=\"number\" name=\"input_tunai\" 
								min=\"" . $itung['sub'] . "\" required> 
												<input type=\"hidden\" name=\"input_cek\" value=\"$input_cek\"> 
							</th>
						</tr>
						<tr>
							<th colspan=\"5\"> <input type=\"submit\" name=\"tunai\" value=\"Bayar\" class=\"button tiny right radius\"> 
							</th>
						</tr>";
					}elseif ($itung['akali']!=0 AND $itung['status']!=1 ) {
						echo "<tr>
								<th colspan=\"5\"> <div class=\"alert-box success round\" data-alert> TERNYATA SUDAH DIBAYAR 
								<a class=\"close\">&times</a> </div> </th>
												<input type=\"hidden\" name=\"input_cek\" value=\"$input_cek\"> 
							</tr>
							<tr>
								<th></th>
							<th colspan=\"5\"> <input type=\"submit\" name=\"tunai\" value=\"Check\" class=\"button success tiny right radius\"> 
							</th>

							</tr>";
					}

					echo "</form>";
				

		echo "</tfoot>

			</table>
		</div></div>";

		echo "
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		";
						}//tutup if jmlah
		}//tutup if cek
?>

</body>
<script src="../assets/foundation-5/js/vendor/jquery.js"></script>
<script src="../assets/foundation-5/js/foundation.min.js"></script>
<script>
	$(document).foundation();
</script>
</body>
</html>