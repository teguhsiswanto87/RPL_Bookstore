<?php
$aksi	= "modul/mod_books/aksi_books.php";
$act	= isset($_GET['act']) ? $_GET['act'] : '' ;
// THE CONTENTS
	switch ($act) {
		default:
			// VIEW TABLE Of BOOKs
			echo " <div class=\"columns large-11 right\"> 
					<h6>Kamus &raquo;</h6>";
						 
							$no=0;
							$query = "SELECT * FROM books WHERE id_genre=5 ";
							$tampil = mysqli_query($konek, $query);
							while ($r=mysqli_fetch_array($tampil)) {
								echo "<div class=\"columns panel medium-3 hover\">
									<ul style=\"width:; height:420;\" class=\"pricing-table\">
										<img src=\"books_image/$r[gambar]\">
										<li class=\"title\">$r[book_name]</li>"; 
									$harga_normal = $r['book_price'];
									$diskon = $r['diskon'];
									$harga_diskon = number_format($harga_normal-($harga_normal*$diskon/100),0,",",".");
									$format_harga = number_format($harga_normal,0,",",".");
								echo "
										<li class=\"price\">Rp $harga_diskon</li>
										<li class=\"harga-palsu\">Rp $format_harga</li>
										<li class=\"diskon\"> -$diskon% </li>
										<form method=\"POST\" action=\"aksi_cart.php?buku=kamus\">
												<input type=\"hidden\" name=\"book_id\" value=\"$r[book_id]\">
												<input type=\"hidden\" name=\"qty\" value=\"1\">
												<input type=\"hidden\" name=\"subtotal\" value=\"$r[book_price]\">
												<input type=\"submit\" name=\"submit\" value=\"Beli\" class=\"button warning tiny radius\">
											</form>
									</ul>
									</div> "; 
								$no++;
								}
	
			echo "</div>";	

			break;

		
	}

?>