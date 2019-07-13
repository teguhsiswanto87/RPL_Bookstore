<?php
session_start(); 
if (empty($_SESSION['emailmember']) AND empty($_SESSION['passmember'])) {
	echo "Login dulu mas bro !";
}else{

include "../../config/koneksi.php";
include "../../config/library.php";

//$module = $_GET['buku']; gajadi
$aksi	= "modul/mod_cart/aksi_cart.php";
$act	= isset($_GET['act']) ? $_GET['act'] : '' ;

 include "../aset_konek/atas.php";
?>
<?php
	$cek = mysqli_query($konek, "SELECT * FROM member WHERE id_session='$_SESSION[session_idL]' ");
	$hcek=mysqli_fetch_array($cek);
if ($hcek['alamat']=='' OR $hcek['id_kota']==0 OR $hcek['phone']=='' OR $hcek['kode_pos']==0) {
	}else{echo "<h3>Data Pesanan</h3>";}
?>
<div class="columns medium-1"></div>
	<div class="columns medium-11">
		<div class="table-full-width">
			<table class="table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>Gambar Produk</th>
						<th>Nama Produk</th>
						<th width="25px">Jumlah</th>
						<th>Harga Normal</th>
						<th>Diskon</th>
						<th class="text-center">Total</th>
						<th>Harga Diskon 1 buku</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					
<?php
// tampilkan data belanja
$sql = mysqli_query($konek, "SELECT B.book_price, B.diskon, A.cart_id, A.no_faktur, A.qty, A.book_id, A.subtotal, A.total, B.book_name, B.gambar, B.stock FROM carts A INNER JOIN books B ON A.book_id=B.book_id WHERE A.no_faktur='$_SESSION[session_id]' ");
$nums = mysqli_num_rows($sql);
$no=1;
while ($data=mysqli_fetch_array($sql)) {
			$total = format_rupiah($data['subtotal']*((100-$data['diskon'])/100));
			$price = format_rupiah($data['book_price']);
			$subtotalf = format_rupiah($data['subtotal']);
			$onebuku = format_rupiah($data['total']/$data['qty']);
		echo "<tr>
				<td> $no </td>
				<td> <img src='../../books_image/$data[gambar]' class='cart-image'> </td>
				<td> $data[book_name] </td>
				<td> <form method=\"POST\" action=\"aksi_cart.php?module=cart&act=update\">
					<input type='hidden' name='book_id' value='$data[book_id]' > 
					<input type='number' name='qty' value='$data[qty]' min='1' max='$data[stock]'> 
					<input type='hidden' name='book_price' value='$data[book_price]' > 
					<input type='hidden' name='subtotal' value='$data[subtotal]' > 
					<input type='hidden' name='diskon' value='$data[diskon]' > 
				</td>
				<td> $price X $data[qty] =  $subtotalf </td>
				<td> $data[diskon]%</td>
				<td><p class='lead right'> $total </p></td>
				<td> <p class='lead right'> $onebuku </p></td>
				<td class='text-center'> 
					<a href=\"aksi_cart.php?module=cart&act=hapus&id=$data[book_id]\" class=\"delete-link\"> 
						<i class='fi-x'></i> Hapus </a> <br><br>
					<input type='submit' value='Update' class='button tiny success round'>
					</form>
				 </td>
			</tr>";
			$no++;
		}
//header("location:media.php?buku=".$module);
?>
				</tbody>
				<tfoot>
					<tr>
						<th colspan="4"></th>
						<th> <b class="right"> + </b> <hr> </th>
						<th></th>
						<th> <b class="right"> + </b> <hr> </th>
					</tr>
					<tr>
						<th colspan="4"></th>
						<th>
							<?php
							$ambil="SELECT SUM(subtotal) AS sub, SUM(total) AS tot FROM carts WHERE no_faktur='$_SESSION[session_id]'  "; 
								$jukuk=mysqli_query($konek,$ambil);
								$itung = mysqli_fetch_array($jukuk);
									//$totali = $itung['subtotal']*((100-$itung['diskon'])/100);
									  echo "<p class='text-center'>Rp. " . format_rupiah($itung['sub']) . "</p>"; 
							?>
						</th>
						<th></th>
						<th style="border-bottom: 2px solid #ff9900;"><?php echo "<p class='lead right'>Rp. " . format_rupiah($itung['tot']) . "</p>";  ?></th>
						<th class="right"> 
							<?php 
								if ($hcek['alamat']=='' OR $hcek['id_kota']==0 OR $hcek['phone']=='' OR $hcek['kode_pos']==0 ) {
									echo "<input type='submit' value='Lanjutkan' class='button small warning' data-reveal-id='bayar'>"; 
								}else{
									echo "<div data-magellan-expedition=\"fixed\">
											<dl class=\"sub-nav\">
												<dd data-magellan-arrival=\"lanjut\">
													<a href=\"#lanjut\" class=\"button success\"> Lanjutkan</a>
												</dd>
											</dl>
										</div>
										<input type='button' class=\"button tiny secondary right\" value='Belanja Lagi ?' onclick=window.location.href='../../media.php?buku=all' >";
								}
							?> 
						</th>
						<div id="bayar" class="reveal-modal small" data-reveal>
							<?php include "../mod_bayar/bayar.php";?>
						</div>
					</tr>
				</tfoot>
			</table>
		</div>
		
	<?php
		$queryd=mysqli_query($konek, "SELECT A.member_id, A.nama, A.jenis_kelamin, A.alamat, A.kode_pos, A.id_kota, A.phone, A.email, B.nama_provinsi, C.nama_kota 
			FROM member A INNER JOIN provinsi B INNER JOIN kota C ON A.id_kota=C.id_kota AND B.id_provinsi=C.id_provinsi WHERE
				A.id_session='$_SESSION[session_idL]' ");
		$d=mysqli_fetch_array($queryd);

	if ($hcek['alamat']=='' OR $hcek['id_kota']==0 OR $hcek['phone']=='' OR $hcek['kode_pos']==0) {
			#ganok
	}else{
		echo "
		<a name=\"lanjut\"></a>
		<h3  data-magellan-destination=\"lanjut\">Data Member</h3>
				<div class=\"columns large-6 panel text-center\">
					<table>
						<tbody>
							<tr>
								<th>Nama</th>
								<td>: $d[nama]</td>
							</tr>
							<tr>
								<th>Jenis Kelamin</th>
								<td>: $d[jenis_kelamin]</td>
							</tr>
							<tr>
								<th>Alamat</th>
								<td>: $d[alamat]</td>
							</tr>
							<tr>
								<th>Kode Pos</th>
								<td>: $d[kode_pos]</td>
							</tr>
							<tr>
								<th>Provinsi</th>
								<td>: $d[nama_provinsi]</td>
							</tr>
							<tr>
								<th>Kota</th>
								<td>: $d[nama_kota]</td>
							</tr>
							<tr>
								<th>E-mail</th>
								<td>: $d[email]</td>
							</tr>
							<tr>
								<th>Telepon</th>
								<td>: $d[phone]</td>
							</tr>
						<tbody>
					</table>
					<a href=\"../mod_member/media_member.php?module=member\" class=\"button radius\"> <i class=\"fi-pencil\"></i> Edit Jika terdapat kesalahan </a>

				</div>";
			if ($nums==0) {
				echo "<div class=\"columns medium-6 \">
					<div class=\"alert-box warning\" data-alert>
						Anda Belum Memilih Barang
						<a class=\"close\">&times;</a>
					</div>
				</div>";
			}else{	
				echo "
					<div class=\"row\">
						<div class=\"columns medium-2 small-centered\">
							<form method=\"POST\" action=\"aksi_order.php?act=submit\">	
								<input type=\"submit\" class=\"button success\" value=\"Simpan dan Selesai\">
							</form>
						</div>
					</div>
				";
			}
	} ?>

		<br>
		<br>

	</div><!-- tutup medium 11 -->

<?php 
include "../aset_konek/bawah.php";
} ?>