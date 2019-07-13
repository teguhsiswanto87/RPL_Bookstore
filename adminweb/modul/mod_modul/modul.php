<?php
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])) {
	echo "You Must to login ";
}else{
// ACTION
$aksi	= "modul/mod_modul/aksi_modul.php";
$act	= isset($_GET['act']) ? $_GET['act'] : '' ;
// THE CONTENTS
	switch ($act) {
		default:
			// VIEW TABLE Of MODULE
			echo "<div class=\"columns medium-8 panel\">
					<h4>Module Management</h4>
					<div class=\"table-full-width\">
						<table class=\"table-hover\">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama</th>
									<th>Link</th>
									<th>Icon</th>
									<th>Sort</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								<tr>";
									$no=1;
									$query	= "SELECT * FROM modul ORDER BY urutan";
									$hasil	= mysqli_query($konek, $query);
									while ($r=mysqli_fetch_array($hasil)) {
										echo "<tr>
												<td>$no</td>
												<td>$r[nama_modul]</td>
												<td>$r[link]</td>
												<td>$r[icon]</td>
												<td>$r[urutan]</td>
												<td> <a class=\"label secondary\" href=\"?module=modul&act=edit&id=$r[id_modul]\">EDIT</a> </td>
											</tr>";
									$no++;
									}
				echo "			</tr>					
							</tbody>
						</table>
					</div>
				</div>";
			// ADDING MODULE
			echo "<div class=\"columns medium-4 \">
					<div class=\"panel\">
						<h4>Add Module</h4>
						<form action=\"$aksi?module=modul&act=input\" method=\"POST\" >
							<label>Module name
								<input type=\"text\" name=\"nama_modul\" required>
							</label>
							<label>Link
								<input type=\"text\" name=\"link\" >
							</label>
							<label>Icon
								<input type=\"text\" name=\"icon\" >
							</label>
								<input type=\"submit\" value=\"Input\" class=\"button tiny\">
						</form>
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