<?php
session_start(); 
if (empty($_SESSION['emailmember']) AND empty($_SESSION['passmember'])) {
	echo "Login dulu mas bro !";
}else{

include "../../config/koneksi.php";
include "../../config/library.php";

//$module = $_GET['buku']; gajadi
$aksi	= "modul/mod_cart/aksi_order.php";
$act	= isset($_GET['act']) ? $_GET['act'] : '' ;

 include "../aset_konek/atas.php";
 //ambil dari tabel Orders
?>
<div class="columns medium-12">
	<table class="table-hover">
		<thead>
			<tr>
				<th>No</th>
				<th>Tanggal</th>
				<th>No Faktur</th>
				<th>Nama Buku</th>
				<th>Jumlah</th>
				<th>Status</th>
				<th>Ekspedisi</th>
				<th>No. Resi</th>

			</tr>
		</thead>
		<tbody>
<?php
	$no=1;
	$ambil=mysqli_query($konek, "SELECT *,O.tanggal FROM orders O INNER Join books B ON O.book_id=B.book_id WHERE member_id='$_SESSION[id_member]' /*ORDER BY O.tanggal DESC LIMIT 5*/ ");
	while ($r=mysqli_fetch_array($ambil)) {
		$tgl=tgl_indo($r['tanggal']);
		//$resi=mt_rand(1000000000,9999999999);

		echo "<tr>
				<td>$no</td>
				<td>$tgl</td>
				<td><p class=\"lead\">$r[no_faktur]</p></td>
				<td>$r[book_name]</td>
				<td>$r[qty]</td>
				<td>";
					if ($r['status']=='1') {
						echo "<label class=\"alert label\">Belum Dibayar</label>";
					}elseif ($r['status']=='2') {
						echo "<label class=\"label\">Sedang Dikirim</label>";
					}elseif ($r['status']=='3') {
						echo "<label class=\"label success\">Barang Terkirim</label>";
					}
					
			echo"</td>
				<td>$r[ekspedisi]</td>
				<td></td>
			</tr>";

	$no++;
	}
?>	
			</tbody>

	</table>
</div>

<?php
	$ambil=mysqli_query($konek, "SELECT * FROM orders WHERE member_id='$_SESSION[id_member]' AND status=1  ");
	$t=mysqli_fetch_array($ambil);
	$acak=str_shuffle($t['no_faktur']);
	echo "<div class=\"row\"><div class=\"columns medium-12 panel \">
			<div class=\"alert-box info columns medium-6\" data-alert>Pembayaran dilakukan di <b>Indomaret</b> membuktikan <b>No.Faktur</b> di bawah ini.<a class=\"close\">&times;</a> </div>
			<div class=\"alert-box warning columns medium-6\" data-alert>Jika dalam jangka <b>2 hari</b> tidak di bayar maka dianggap tidak jadi membeli<a class=\"close\">&times;</a> </div>
		<h4>No.faktur : <kbd> $t[no_faktur]<kdb> </h4>
		</div>
	</div>";

?>

<!-- bayar dari indomaret -->
<div class="columns medium-4 panel medium-offset-4 text-center">
	<blockquote>
		<div class="alert-box info" data-alert>
			Setelah melakukan pembayaran di Indomart segera masukkan kode bukti pembayaran(kode unik) untuk melakukan pengiriman barang 
			<cite> UUD Bookstore</cite>
			<a class="close">&times;</a>
		</div>
	</blockquote>
	<form method="POST" action="aksi_order.php?act=cekbukti">
		<input type="text" name="no_faktur" placeholder="Masukkan No.Faktur">
		<input type="text" name="akali" placeholder="Masukkan Kode Bukti Pembayaran">
		<input type="submit" name="submit" class="button small radius" value="Check">
	</form>
</div>


<?php 
include "../aset_konek/bawah.php";
} ?>