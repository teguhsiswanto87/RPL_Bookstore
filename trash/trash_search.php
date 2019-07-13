<?php
$aksi	= "modul/mod_cart/aksi_cart.php";

							  $input_cari = @$_POST['input_cari']; 
							  $cari = @$_POST['cari'];

							   // jika tombol cari di klik
							   if($cari) {
							    // jika kotak pencarian tidak sama dengan kosong
							    if($input_cari != "") {
								    	// query mysql untuk mencari berdasarkan nama buku
							    		$no=1;
								    	$sql = mysqli_query($konek, "SELECT * FROM books WHERE book_name LIKE '%$input_cari%' ");   
								    } else {echo "salah";}

							    // mengecek data
							   $cek = mysqli_num_rows($sql);
							   // jika data kurang dari 1
							   if($cek < 1) {
							   	echo "<tr>
								      <td colspan=\"7\" align=\"center\" style=\"padding:10px;\"> Data Tidak Ditemukan</td>
								     </tr> ";

							   } else {
// mengulangi data agar tidak hanya 1 yang tampil
							   while($ser = mysqli_fetch_array($sql)) {
							   		echo "
								<div class=\"columns panel medium-3 hover\">";
								echo "
									<ul style=\" height:420;\" class=\"pricing-table\">
										<img src=\"books_image/$ser[gambar]\">
										<li class=\"title\">$ser[book_name]</li>"; 

									$harga_normal = $ser['book_price'];
									$diskon = $ser['diskon'];
									$harga_diskon = number_format($harga_normal-($harga_normal*$diskon/100),0,",",".");
									$format_harga = number_format($harga_normal,0,",",".");
								echo "
										<li class=\"price\">Rp $harga_diskon</li>
										<li class=\"harga-palsu\">Rp $format_harga</li>
										<li class=\"diskon label radius secondary\"> -$diskon% </li>
										<li class=\"beli\">
											<form method=\"POST\" action=\"$aksi?buku=all&act=input\">
												<input type=\"hidden\" name=\"book_id\" value=\"$ser[book_id]\">
												<input type=\"hidden\" name=\"qty\" value=\"1\">
												<input type=\"hidden\" name=\"subtotal\" value=\"$ser[book_price]\">
												<input type=\"hidden\" name=\"diskon\" value=\"$ser[diskon]\">
												<input type=\"submit\" name=\"submit\" value=\"Beli\" class=\"button warning tiny radius\">
											</form>
										</li>
									</ul>
									</div> "; 
								$no++;
							}
						}
					}
?>					