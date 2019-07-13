<?php
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])) {
	echo "You Must to login ";
}else{
// ACTION
$aksi	= "modul/mod_dashboard/aksi_dashboard.php";
$act	= isset($_GET['act']) ? $_GET['act'] : '' ;
// THE CONTENTS
	switch ($act) {
		default:
			echo "<div class=\"columns medium-12 panel\">
					<h4>Laporan Pesanan</h4>
					<div class=\"table-full-width\">

				<ul class=\"tabs\" data-tab>
					<li class=\"tab-title active\"> <a href=\"#panel1\">Sedang Dikirim</a></li>
					<li class=\"tab-title\"><a href=\"#panel2\">Terkirim</a></li>
				</ul>";
			// VIEW TABLE Of MODULE
			echo "<div class=\"tabs-content\">
					<div class=\"content active\" id=\"panel1\">

						<table class=\"table-hover\">
							<thead>
								<tr>
									<th>No</th>
									<th>Tanggal</th>
									<th>No.faktur</th>

									<th>Nama</th>
									<th>Alamat</th>
									<th>Kota</th>
									<th>Kode Pos</th>
									<th>Phone</th>
									<th>Buku_id</th>
									<th>Jumlah</th>
									<th>Ekspedisi</th>
									<th>Status</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<tr>";
									$no=1;
									$query	= "SELECT * FROM orders WHERE status=2 ORDER BY tanggal DESC  ";
									$hasil	= mysqli_query($konek, $query);
									while ($r=mysqli_fetch_array($hasil)) {
										$tgl=tgl_indo($r['tanggal']);
										echo "<tr>
												<td>$no</td>
												<td>$tgl</td>
												<td>$r[no_faktur]</td>

												<td>$r[nama]</td>
												<td>$r[alamat]</td>
												<td>$r[nama_kota]</td>
												<td>$r[kode_pos]</td>
												<td>$r[phone]</td>
												<td>$r[book_id]</td>
												<td>$r[qty]</td>
												<td>$r[ekspedisi]</td>
												<td>";
													if ($r['status']=='1') {
														echo "<label class=\"alert label\">Belum Dibayar</label>";
													}elseif ($r['status']=='2') {
														echo "<label class=\"label\">Sedang Dikirim</label>";
													}elseif ($r['status']=='3') {
														echo "<label class=\"label success\">Barang Terkirim</label>";
													}
													
										echo "</td>
												<td><a href=\"$aksi?module=dash&act=up&id=$r[no_faktur]\">Up</a> |
												<a href=\"$aksi?module=dash&act=down&id=$r[no_faktur]\">Down</a></td>
											</tr>";
									$no++;
									}
				echo "			</tr>					
							</tbody>
						</table>
					</div> 

						<div class=\"content\" id=\"panel2\">
							<table class=\"table-hover\">
							<thead>
								<tr>
									<th>No</th>
									<th>Tanggal</th>
									<th>No.faktur</th>

									<th>Nama</th>
									<th>Alamat</th>
									<th>Kota</th>
									<th>Kode Pos</th>
									<th>Phone</th>
									<th>Buku_id</th>
									<th>Jumlah</th>
									<th>Ekspedisi</th>
									<th>Status</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<tr>";
									$no=1;
									$query	= "SELECT * FROM orders WHERE status=3 ORDER BY tanggal DESC  ";
									$hasil	= mysqli_query($konek, $query);
									while ($r=mysqli_fetch_array($hasil)) {
										$tgl=tgl_indo($r['tanggal']);
										echo "<tr>
												<td>$no</td>
												<td>$tgl</td>
												<td>$r[no_faktur]</td>

												<td>$r[nama]</td>
												<td>$r[alamat]</td>
												<td>$r[nama_kota]</td>
												<td>$r[kode_pos]</td>
												<td>$r[phone]</td>
												<td>$r[book_id]</td>
												<td>$r[qty]</td>
												<td>$r[ekspedisi]</td>
												<td>";
													if ($r['status']=='1') {
														echo "<label class=\"alert label\">Belum Dibayar</label>";
													}elseif ($r['status']=='2') {
														echo "<label class=\"label\">Sedang Dikirim</label>";
													}elseif ($r['status']=='3') {
														echo "<label class=\"label success\">Barang Terkirim</label>";
													}
													
										echo "</td>
												<td><a href=\"$aksi?module=dash&act=up&id=$r[no_faktur]\">Up</a> |
												<a href=\"$aksi?module=dash&act=down&id=$r[no_faktur]\">Down</a></td>
											</tr>";
									$no++;
									}
				echo "			</tr>					
							</tbody>
						</table>
						</div>

					 </div>

					</div>
				</div>";
			break;

		case 'edit':
			$query 	= "SELECT * FROM modul WHERE id_modul='$_GET[id]' ";
			$hasil 	= mysqli_query($konek, $query);
			$r 		= mysqli_fetch_array($hasil);
			echo "<div class=\"columns medium-4 panel\">
					<h4>Update Module</h4>
					<form action=\"$aksi?module=modul&act=edit\" method=\"POST\" >
						<input type=\"hidden\" name=\"id\" value=\"$r[id_modul]\">
						<label>Nama Modul
							<input type=\"text\" name=\"nama_modul\" value=\"$r[nama_modul]\">
						</label>
						<label>Link
							<input type=\"text\" name=\"link\" value=\"$r[link]\">
						</label>
						<label>Icon
							<input type=\"text\" name=\"icon\" value=\"$r[icon]\">
						</label>
						<label>Sort
							<input type=\"number\" name=\"urutan\" value=\"$r[urutan]\">
						</label>
							<a class=\"button tiny warning\" onclick='self.history.back()'><i class=\"fi-arrow-left\"></i>&nbsp;Cancel</a>
							<input type=\"submit\" value=\"Update\" class=\"button tiny right\">
					</form>
				</div>";
			break;
		
	}
}

?>