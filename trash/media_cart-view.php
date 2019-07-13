<a href="cart.php"  data-options="align:bottom;" data-dropdown="cart-view">
	<div id="cart-view" class="f-dropdown tiny" data-dropdown-content style="color: #000;">
		<h6 class="text-center">Keranjang Belanja</h6>
			<?php
				echo "<table class=\"table-hover\">";
				$waw = mysqli_query($konek, "SELECT B.book_price, B.diskon, A.cart_id, A.no_faktur, A.qty, A.book_id, A.subtotal, B.book_name FROM 
					carts A INNER JOIN books B ON A.book_id=B.book_id WHERE A.no_faktur='$_SESSION[session_id]' ");
					$no=1;
						while ($ambil=mysqli_fetch_array($waw)) {
							echo "<tr>
									<td>$ambil[book_name]</td>
									<td>$ambil[qty]</td>
								</tr>";
							}
							$no++;
							echo "<tr>
						<td colspan=\"2\"> <a href=\"cart.php\" class=\"label \"> Detail </a></td>
					</tr>
					</table>";

?>
	</div> <!-- tutupe konten dropdown -->