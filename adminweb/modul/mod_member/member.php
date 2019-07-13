<?php
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])) {
	echo "You Must to login ";
}else{
// ACTION
$aksi	= "modul/mod_member/aksi_member.php";
$act	= isset($_GET['act']) ? $_GET['act'] : '' ;
// THE CONTENTS
	switch ($act) {
		default:
			// VIEW TABLE Of USERS
			echo "<div class=\"columns large-12 panel\">
					<h4>Members Management 
						<a href=\"#\" data-reveal-id=\"add\" class=\"button tiny right\">Add Member</a> 
					</h4>
					<div class=\"table-full-width\">
						<table class=\"table-hover\">
							<thead>
								<tr>
									<th>No</th>
									<th>Name</th>
									<th>Gender</th>
									<th>Address</th>
									<th>ZIP Code</th>
									<th>City</th>
									<th>Phone</th>
									<th>Email</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								<tr>";
									$no=1;
									$query	= "SELECT * FROM member M INNER JOIN kota K ON M.id_kota=K.id_kota ORDER BY member_id DESC";
									$hasil	= mysqli_query($konek, $query);
									while ($r=mysqli_fetch_array($hasil)) {
										echo "<tr>
												<td>$no</td>
												<td>$r[nama]</td>
												<td>$r[jenis_kelamin]</td>
												<td>$r[alamat]</td>
												<td>$r[kode_pos]</td>
												<td>$r[nama_kota]</td>
												<td>$r[phone]</td>
												<td>$r[email]</td>
												<td> 
												<a class=\"label secondary\" href=\"?module=member&act=edit&id=$r[member_id]\">EDIT</a> 
												<a class=\"delete-link\" href=\"$aksi?module=member&act=hapus&id=$r[member_id]\"><i class=\"fi-x\" 
													style=\"color:#900;\"></i></a> 
													</td>
											</tr>";
									$no++;
									}
				echo "			</tr>					
							</tbody>
						</table>
					</div>
				</div>";

				// ADDING BOOK with Reveal-Modal
			echo "<div class=\"reveal-modal\" id=\"add\" data-reveal>
					<a class=\"close-reveal-modal\">&#215;</a>
					<div class=\"columns large-12 medium-centered\">
						<h4>Add Member</h4>
						<form action=\"$aksi?module=member&act=input\" method=\"POST\" data-abide>
							<div class=\"row\">
							<div class=\"columns medium-6\">
								Name<input type=\"text\" name=\"nama\" placeholder=\"Name\" required>
								E-mail<input type=\"email\" name=\"email\" placeholder=\"Email*\" required>
								Address<textarea name=\"alamat\" placeholder=\"Your Address\" rows=\"4\"></textarea>
							</div>

							<div class=\"columns medium-6\">
								<div class=\"row\">
									<div class=\"columns large-10\">
										Province<select name=\"provinsi\" id=\"provinsi\"> 
											<option>-- Choose Province --</option>";

										$query2="SELECT * FROM provinsi ORDER BY nama_provinsi";
										$hasil2=mysqli_query($konek, $query2);
										while ($p=mysqli_fetch_array($hasil2)) {
											echo "<option value=\"$p[id_provinsi]\">$p[nama_provinsi]</option>";
										}
									

								echo "	</select> </div>
											<div class=\"columns large-2\"><img src=\"modul/mod_member/loading.gif\"  id=\"imgLoad\" 
												style=\"display:none\"></div>
											</div>
										<div class=\"row\">
											<div class=\"columns large-6\"> From the City<select name=\"kota\" id=\"kota\"> </select></div>
											<div class=\"columns large-6\"> Zip Code<input type=\"number\" name=\"kode_pos\" placeholder=\"ZIP Code\"> 
											</div>
										</div>
										<div class=\"alert-box alert radius\" data-alert>*Email can't change again furthermore <a class=\"close\">&times;</a>
										</div>
										Telp<input type=\"number\" name=\"phone\" placeholder=\"Telephone Number\">
							</div>
							</div>

							<div class=\"columns medium-4\">
										Password<input type=\"password\" name=\"password\" placeholder=\"Password: minimal 5 characters\" id=\"sandi\" minlength=\"5\" required>
											<small class=\"error\">Repeat Password must equal with Password</small>
										Repeat Password<input type=\"password\" placeholder=\"Repeat Password\" data-equalto=\"sandi\" minlength=\"5\" >
											<small class=\"error\">Repeat Password must equal with Password</small>
							</div>

							<div class=\"columns medium-2\">
									<h6>Gender</h6>
										<label><input type=\"radio\" name=\"jk\" value=\"L\" required>&nbsp;Male</label>
										<label><input type=\"radio\" name=\"jk\" value=\"P\" required>&nbsp;Female</label>
							</div>
								
							<div class=\"columns medium-6\">
										<small class=\"alert center\"> * if send button not respond then Repeat Password must equal with Password </small>
										<input type=\"submit\" value=\"Send\" class=\"button small expand radius\">
							</div>

						</form>
					</div>
				</div>";

			break;

		case 'edit':
			$query 	= "SELECT * FROM member WHERE member_id='$_GET[id]' ";
			$hasil 	= mysqli_query($konek, $query);
			$r 		= mysqli_fetch_array($hasil);
			echo "<div class=\"columns medium-6 panel\">
					<h4>Update Member</h4>
					<form action=\"$aksi?module=member&act=update\" method=\"POST\">
						<input type=\"hidden\" name=\"id\" value=\"$r[member_id]\" >
						Name<input type=\"text\" name=\"nama\" value=\"$r[nama]\" >
						E-mail<input type=\"email\" name=\"email\" value=\"$r[email]\" disabled>
						Address<input type=\"text\" name=\"alamat\" value=\"$r[alamat]\">
							
						<div class=\"row\">
							<div class=\"columns large-10\">
							Province<select name=\"provinsi\" id=\"provinsi\"> 
								<option>-- Pilih Provinsi --</option>";

							$query2="SELECT * FROM provinsi ORDER BY nama_provinsi";
							$hasil2=mysqli_query($konek, $query2);
							while ($p=mysqli_fetch_array($hasil2)) {
								echo "<option value=\"$p[id_provinsi]\">$p[nama_provinsi]</option>";
							}
							

				echo "
							</select> </div>
							<div class=\"columns large-2\"><img src=\"modul/mod_member/loading.gif\"  id=\"imgLoad\" 
								style=\"display:none\"></div>
						</div>
						<div class=\"row\">
							<div class=\"columns large-6\"> From the City<select name=\"kota\" id=\"kota\"> </select></div>
							<div class=\"columns large-6\"> Zip Code<input type=\"number\" name=\"kode_pos\" value=\"$r[kode_pos]\"> </div>
						</div>
			<div class=\"alert-box warning radius\" data-alert>If <b>the City</b> not changed then empty it
							<a class=\"close\">&times;</a></div>
						Telp<input type=\"number\" name=\"phone\" value=\"$r[phone]\">
						<br>
						<a class=\"button tiny warning\" onclick='self.history.back()'><i class=\"fi-arrow-left\"></i>&nbsp;Cancel</a>
							<input type=\"submit\" value=\"Update\" class=\"button tiny right\">
				</form>

				</div>";
			break;
		
	}
}

?>
