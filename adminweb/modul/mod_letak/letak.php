<?php
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])) {
	echo "You Must to login ";
}else{
// ACTION
$aksi	= "modul/mod_letak/aksi_letak.php";
$act	= isset($_GET['act']) ? $_GET['act'] : '' ;
// THE CONTENTS
	switch ($act) {
		default:
			// VIEW TABLE Of MODULE
			echo "<div class=\"columns medium-8 panel\">
				<div class=\"columns large-6 panel\">
					<h4>Province</h4>
					<div class=\"table-full-width\">
						<table class=\"table-hover\">
							<thead>
								<tr>
									<th>No</th>
									<th>Name</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>";
									$no=1;
									$query	= "SELECT * FROM provinsi ORDER BY nama_provinsi";
									$hasil	= mysqli_query($konek, $query);
									while ($r=mysqli_fetch_array($hasil)) {
										echo "<tr>
												<td>$no</td>
												<td>$r[nama_provinsi]</td>
												<td><a class=\"delete-link\" href='$aksi?module=letak&act=hapus&id=$r[id_provinsi]'>Delete</a></td>
											</tr>";
									$no++;
									}
				echo "		</tbody>
						</table>
					</div>
				</div>

				<div class=\"columns large-6 panel\">
					<h4>City and Regency</h4>
					<div class=\"table-full-width\">
						<table class=\"table-hover\">
							<thead>
								<tr>
									<th>No</th>
									<th>Name</th>
									<th>id_prov</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								<tr>";
									$no=1;
									$query3	= "SELECT * FROM kota ORDER BY id_kota";
									$hasil3	= mysqli_query($konek, $query3);
									while ($o=mysqli_fetch_array($hasil3)) {
										echo "<tr>
												<td>$no</td>
												<td>$o[nama_kota]</td>";
												if ($o['id_provinsi'] > 0 ) {
													echo "<td>$o[id_provinsi]</td>";
												}else{
													echo "<td class=\"label warning\">$o[id_provinsi]</td>";
												}
										echo "		
												<td><a class=\"delete-link\" href='$aksi?module=kota&act=hapuskota&id=$o[id_kota]'>Delete</a></td>
											</tr>";
									$no++;
									}
				echo "			</tr>					
							</tbody>
						</table>
					</div>
			</div>

				</div>";
			// ADDING Province
			echo "<div class=\"columns medium-4 \">
					<div class=\"columns large-12 \">
						<div class=\"panel\">
						<h4>Add Province</h4>
							<form action=\"$aksi?module=letak&act=input\" method=\"POST\" >
								<label>Province Name
									<input type=\"text\" name=\"nama_provinsi\" required>
								</label>
									<input type=\"submit\" value=\"Input\" class=\"button tiny\">
							</form>
						</div>
					</div>


					<div class=\"columns large-12 \">
						<div class=\"panel\">
						<h4>Add City, Regency</h4>
							<form action=\"$aksi?module=letak&act=inputkota\" method=\"POST\" >
								<label>City Name <input type=\"text\" name=\"nama_kota\" required> </label>
						<select name=\"id_provinsi\"> 
							<option>-- Pilih Provinsi --</option>";

						$query2="SELECT * FROM provinsi ORDER BY nama_provinsi";
						$hasil2=mysqli_query($konek, $query2);
						while ($p=mysqli_fetch_array($hasil2)) {
							echo "<option value=\"$p[id_provinsi]\">$p[nama_provinsi]</option>";
						}
						

			echo "
						</select>
									<input type=\"submit\" value=\"Input\" class=\"button tiny\">
							</form>
					</div>
				</div>
			</div>";

			break;
		
	}
}

?>