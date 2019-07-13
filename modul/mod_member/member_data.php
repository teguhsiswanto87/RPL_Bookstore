<?php
//$module = $_GET['buku'];
$aksi	= "aksi_member.php";
$act	= isset($_GET['act']) ? $_GET['act'] : '' ;

 $query="SELECT * FROM member WHERE id_session='$_SESSION[session_idL]' ";
 $hasil=mysqli_query($konek, $query);
 $r=mysqli_fetch_array($hasil);

echo "
	<br>
	<div class=\"row panel\">
		<div class=\"columns medium-6\">
			<h4 class=\"text-center\">
				<input type='button' value='&laquo; Kembali' class=\"button tiny warning left\" onclick=\"self.history.back()\"> <br>
			Edit Data</h4>
			<form action=\"$aksi?module=member&act=update\" method=\"POST\">
					<input type=\"hidden\" name=\"id\" value=\"$r[member_id]\" >
					Nama<input type=\"text\" name=\"nama\" value=\"$r[nama]\" >
					E-mail<input type=\"email\" name=\"email\" value=\"$r[email]\" disabled>
					Alamat<input type=\"text\" name=\"alamat\" value=\"$r[alamat]\">
						
					<div class=\"row\">
						<div class=\"columns large-10\">
						Provinsi<select name=\"provinsi\" id=\"provinsi\"> 
							<option>-- Pilih Provinsi --</option>";

						$query2="SELECT * FROM provinsi ORDER BY nama_provinsi";
						$hasil2=mysqli_query($konek, $query2);
						while ($p=mysqli_fetch_array($hasil2)) {
							echo "<option value=\"$p[id_provinsi]\">$p[nama_provinsi]</option>";
						}
						

			echo "
						</select> </div>
						<div class=\"columns large-2\"><img src=\"loading.gif\"  id=\"imgLoad\" style=\"display:none\"></div>
					</div>
					<div class=\"row\">
						<div class=\"columns large-6\"> Kota<select name=\"kota\" id=\"kota\"> </select></div>
						<div class=\"columns large-6\"> Kode Pos<input type=\"number\" name=\"kode_pos\" value=\"$r[kode_pos]\"> </div>
					</div>
		<div class=\"alert-box warning radius\" data-alert>Jika <b>Kota</b> tidak diubah maka kosongkan saja <a class=\"close\">&times;</a></div>
					Telp<input type=\"number\" name=\"phone\" value=\"$r[phone]\">
					<br>
					<input type=\"submit\" value=\"Update\" class=\"button small expand radius\">
				</form>
		</div>
			<div class=\"columns medium-6\">
			";

		$queryd=mysqli_query($konek, "SELECT A.nama, A.jenis_kelamin, A.alamat, A.kode_pos, A.id_kota, A.phone, A.email, B.nama_provinsi, C.nama_kota 
			FROM member A INNER JOIN provinsi B INNER JOIN kota C ON A.id_kota=C.id_kota AND B.id_provinsi=C.id_provinsi WHERE
				A.id_session='$_SESSION[session_idL]' ");
		$d=mysqli_fetch_array($queryd);
			echo "<div class=\"columns large-12\">
					<fieldset>
					<legend>Informasi Anda</legend>
						<ul class=\"no-bullet\">
							<li> Nama : $d[nama] </li>
							<li> Jenis Kelamin : $d[jenis_kelamin] </li>
							<li> Alamat : $d[alamat] </li>
							<li> Kode Pos : $d[kode_pos] </li>
							<li> Provinsi : $d[nama_provinsi] </li>
							<li> Kota : $d[nama_kota] </li>
							<li> Telepon : $d[phone] </li>
							<li> E-mail : $d[email] </li>
						</ul>
					</fieldset>
				</div>";
				/*Ganti password*/
			echo "<div class=\"columns large-12\">
					<blockquote>
						<cite>Ganti Password</cite>
						<div class=\"content\" id=\"login\">
							<form action=\"$aksi?module=member&act=ganpas\" method=\"POST\" data-abide>
								<input type=\"hidden\" name=\"id\" value=\"$r[member_id]\" >
								<input type=\"password\" name=\"passbar\" placeholder=\"Password Baru\" id=\"sandi\" min=\"8\" required>
								<input type=\"password\" name=\"\" placeholder=\"Konfirmasi password Baru\" data-equalto=\"sandi\" min=\"8\">
									<small class=\"error\">Konfirmasi Password harus sama dengan Password</small>								
								<input type=\"submit\" value=\"Ubah Password\" class=\"button tiny right secondary radius\">
							</form>
						</div>
					</blockquote>
				</div>";


echo " </div>";
				
 ?>