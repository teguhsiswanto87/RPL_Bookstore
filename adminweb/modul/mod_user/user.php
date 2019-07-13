<?php
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])) {
	echo "You Must to login ";
}else{
// ACTION
$aksi	= "modul/mod_user/aksi_user.php";
$act	= isset($_GET['act']) ? $_GET['act'] : '' ;
// THE CONTENTS
	switch ($act) {
		default:
			// VIEW TABLE Of USERS
			echo "<div class=\"columns large-8 panel\">
					<h4>Users Management</h4>
					<div class=\"table-full-width\">
						<table class=\"table-hover\">
							<thead>
								<tr>
									<th>No</th>
									<th>Full Name</th>
									<th>Email</th>
									<th>Address</th>
									<th>Level</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								<tr>";
									$no=1;
									$query	= "SELECT * FROM users ORDER BY level ";
									$hasil	= mysqli_query($konek, $query);
									while ($r=mysqli_fetch_array($hasil)) {
										echo "<tr>
												<td>$no</td>
												<td>$r[nama_lengkap]</td>
												<td>$r[email]</td>
												<td>$r[alamat]</td>
												<td>$r[level]</td>
												<td> <a class=\"label secondary\" href=\"?module=user&act=edit&id=$r[username]\">EDIT</a> 
													</td>
											</tr>";
									$no++;
									}
				echo "			</tr>					
							</tbody>
						</table>
					</div>
				</div>";
			// ADDING USERS
			echo "<div class=\"columns large-4 medium-6\">
					<div class=\"panel\">
						<h4>Add User</h4>
						<form action=\"$aksi?module=user&act=input\" method=\"POST\" data-abide>
							<label>Username
								<input type=\"text\" name=\"username\" pattern=\"alpha_numeric\" required>
							</label>
							<label>Fullname
								<input type=\"text\" name=\"nama_lengkap\" required>
							</label>
							<label>Email
								<input type=\"email\" name=\"email\" required>
							</label>
							<label>Address
								<textarea name=\"alamat\"></textarea>
							</label>
							<label>Password
								<input type=\"password\" name=\"password\" id=\"password\" required>
							</label>
							<label>Repeat Password
								<input type=\"password\" data-equalto=\"password\" required>
								<small class=\"error\">'password' must like a 'repeat password'</small>
							</label>

								<input type=\"submit\" value=\"Input\" class=\"button tiny\">
						</form>
					</div>
				</div>";

			break;

		case 'edit':
			$query 	= "SELECT * FROM users WHERE username='$_GET[id]' ";
			$hasil 	= mysqli_query($konek, $query);
			$r 		= mysqli_fetch_array($hasil);
			echo "<div class=\"columns medium-5 panel\">
					<h4>Update User</h4>
					<form action=\"$aksi?module=user&act=edit\" method=\"POST\" >
						<input type=\"hidden\" name=\"id\" value=\"$r[username]\">
						<label>*)Username
							<input type=\"text\" name=\"username\" value=\"$r[username]\" disabled>
						</label>
						<label>**)Password
							<input type=\"password\" name=\"password\">
						</label>
						<label>Fullname
							<input type=\"text\" name=\"nama_lengkap\" value=\"$r[nama_lengkap]\">
						</label>
						<label>Address
							<textarea name=\"alamat\">$r[alamat]</textarea>
						</label>
						<label class=\"label info\">Important</label>
						<blockquote>
							*) username can't be changed <br>
							**)If the password isn't changed then empty it 
						</blockquote>
							<a class=\"button tiny warning\" onclick='self.history.back()'><i class=\"fi-arrow-left\"></i>&nbsp;Cancel</a>
							<input type=\"submit\" value=\"Update\" class=\"button tiny right\">
					</form>
				</div>";
			break;
		
	}
}

?>