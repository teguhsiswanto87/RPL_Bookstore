<?php
	$aksi	= "modul/mod_cart/aksi_cart.php";
if (@$_POST['input_cari'] == "") {
	//biar pas kembalinya gak error nyariin 'input_search'-nya belum diisi karena otomatis ilang
	echo " <script> window.location='index.php?buku=all' </script> ";
}
		// jika tombol cari di klik
		 $cari 		 = @$_POST['cari'];
	 if($cari) {
		 $input_cari = @$_POST['input_cari']; 
		 $kate_cari  = @$_POST['kate_cari'];
		 
				$no=1;
				if ($kate_cari=='book_name') {
			 		$sql = mysqli_query($konek, "SELECT * FROM books WHERE book_name LIKE '%$input_cari%' ");   
				}elseif ($kate_cari=='author') {
			 		$sql = mysqli_query($konek, "SELECT * FROM books WHERE author LIKE '%$input_cari%' ");   
				}else{
			 		$sql = mysqli_query($konek, "SELECT * FROM books WHERE book_name LIKE '%$input_cari%' ");   
				}


	$cek = mysqli_num_rows($sql);
	 // jika data kurang dari 1
	 if($cek < 1) {
	 	echo "<script>alert('Data Tidak Ditemukan | BooksStore'); </script> ";
	 	//saat tak ditemukan langsung kembali saja
		echo " <script> window.self.history.back() </script> ";
	 } else {


	echo "<div class=\"columns large-11 right\"> 
			<h6> <i class=\"fi-magnifying-glass panel\"> Pencarian : $input_cari &raquo;</i>  </h6> ";
						// mengulangi data agar tidak hanya 1 yang tampil
						   while($r = mysqli_fetch_array($sql)) {
							   		echo "
								<div class=\"columns panel medium-3 hover\">";
								include "modul/aset_konek/label_buku.php";
								
								echo "
									<ul style=\" height:420;\" class=\"pricing-table\">
										<img src=\"books_image/$r[gambar]\">
										<li class=\"title\">$r[book_name]</li>"; 

									$harga_normal = $r['book_price'];
									$diskon = $r['diskon'];
									$harga_diskon = number_format($harga_normal-($harga_normal*$diskon/100),0,",",".");
									$format_harga = number_format($harga_normal,0,",",".");
								echo "
										<li class=\"bullet-item\"> $r[author] </li>
										<li class=\"price\">Rp $harga_diskon</li>
										<li class=\"harga-palsu\">Rp $format_harga</li>
										<li class=\"diskon label radius secondary\"> -$diskon% </li>
										<li class=\"beli\">
											<form method=\"POST\" action=\"$aksi?buku=all&act=input\">
												<input type=\"hidden\" name=\"book_id\" value=\"$r[book_id]\">
												<input type=\"hidden\" name=\"qty\" value=\"1\">
												<input type=\"hidden\" name=\"subtotal\" value=\"$r[book_price]\">
												<input type=\"hidden\" name=\"diskon\" value=\"$r[diskon]\">
												<input type=\"submit\" name=\"submit\" value=\"Beli\" class=\"button warning tiny radius\">
											</form>
										</li>
									</ul>
									</div>"; 
								$no++;
							}
		echo "</div>";
						}
					}else{
						echo " <script> window.self.history.back() </script> ";
					}
?>					
