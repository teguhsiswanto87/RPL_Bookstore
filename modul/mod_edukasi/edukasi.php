<?php
//pengaalihan ke aksi
$aksi	= "modul/mod_cart/aksi_cart.php";

// Langkah 1. Tentukan batas,cek halaman & posisi data
$batas   = 20;
$halaman = @$_GET['halaman'];
if(empty($halaman)){
	$posisi  = 0;
	$halaman = 1;
}
else{ 
  $posisi  = ($halaman-1) * $batas; 
}

// Langkah 2. Sesuaikan query dengan posisi dan batas

echo " 
	<div class=\"columns large-11 right\">
		<h6> <i class=\"panel\"> Kategori &raquo; Edukasi &raquo;</i></h6>  
	";
						 
							$no=$posisi+1;
							$query = "SELECT * FROM books WHERE id_genre=11 LIMIT $posisi,$batas ";
							$tampil = mysqli_query($konek, $query);
							while ($r=mysqli_fetch_array($tampil)) {
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
										<li class=\"bullet-item\"> $r[author] ";
											if ($r['stock']>0) {
												echo"<span class=\"label round success right\">Stok $r[stock] </span> ";
											}else{
												echo"<span class=\"label round alert right\">Stok Habis </span> ";
											}

								echo "	</li>
										<li class=\"price\">Rp $harga_diskon</li>
										<li class=\"harga-palsu\">Rp $format_harga</li>
										<li class=\"diskon label radius secondary\"> -$diskon% </li>
										<li class=\"beli\">
											<form method=\"POST\" action=\"$aksi?buku=edukasi&act=input\">
												<input type=\"hidden\" name=\"book_id\" value=\"$r[book_id]\">
												<input type=\"hidden\" name=\"qty\" value=\"1\">
												<input type=\"hidden\" name=\"subtotal\" value=\"$r[book_price]\">
												<input type=\"hidden\" name=\"diskon\" value=\"$r[diskon]\">
												<input type=\"submit\" name=\"submit\" value=\"Beli\" class=\"button warning tiny radius\">
											</form>
										</li>
									</ul>
									</div> "; 
								$no++;
								}
// Langkah 3: Hitung total data dan halaman serta link 1,2,3 
$kueri2     = mysqli_query($konek, "SELECT * FROM books WHERE id_genre=11 ");
$jmldata    = mysqli_num_rows($kueri2);
$jmlhalaman = ceil($jmldata/$batas);

echo "<div class=\"columns large-12 text-center\"> Halaman : ";

for($i=1;$i<=$jmlhalaman;$i++)
if ($i != $halaman){
	echo " <a href=\"media.php?buku=edukasi&halaman=$i\" class=\"label radius text-center\">$i</a> | ";
}
else{ 
	echo " <b class=\"label warning radius\">$i</b> | "; 
}
echo "<p>Total Buku : <b>$jmldata</b> Buku</p>";
echo "</div> ";

//tutup columns yg besar(buku)	
echo "</div>";							
?>
