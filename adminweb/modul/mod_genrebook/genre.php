<?php
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])) {
	echo "You Must to login ";
}else{
// ACTION
$aksi	= "modul/mod_genrebook/aksi_genre.php";
$act	= isset($_GET['act']) ? $_GET['act'] : '' ;
// THE CONTENTS
	switch ($act) {
		default:
			// VIEW TABLE Of GENRE books
			echo "<div class=\"columns medium-8 panel\">
					<h4>Genre Books</h4>
					<div class=\"table-full-width\">
						<table class=\"table-hover\">
							<thead>
								<tr>
									<th>Code</th>
									<th>Genre</th>
									<th>Link</th>
									<th>Active</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								<tr>";
									$no=1;
									$query	= "SELECT * FROM genre_book";
									$hasil	= mysqli_query($konek, $query);
									while ($r=mysqli_fetch_array($hasil)) {
										echo "<tr>
												<td>$r[id_genre]</td>
												<td>$r[genre]</td>
												<td>$r[link]</td>";
												if ($r['active']=='Y') {
													echo "<td>$r[active]</td>";
												}else{
													echo "<td class=\"label warning\">$r[active]</td>";
												}
										echo "
												<td> 
									<a class=\"label secondary\" href=\"?module=genre&act=edit&id=$r[id_genre]\">EDIT</a>";
									if ($r['id_genre'] <= 12) {
										# code...
									}else{
										echo " | <a class=\"delete-link\" href=\"$aksi?module=genre&act=hapus&id=$r[id_genre]\">  
										<i class=\"fi-x\" style=\"color:#900;\" ></i></a>";
									}

									echo "  
												</td>
											</tr>";
									$no++;
									}
				echo "			</tr>					
							</tbody>
						</table>
					</div>
				</div>";
			// ADDING GENRE
			echo "<div class=\"columns medium-4 \">
					<div class=\"panel\">
						<h4>Add Genre Books</h4>
						<form action=\"$aksi?module=genre&act=input\" method=\"POST\" >
							<label>Genre name
								<input type=\"text\" name=\"genre\" required>
							</label>
							<label>Link
								<input type=\"text\" name=\"link\">
							</label>
								<input type=\"submit\" value=\"Input\" class=\"button tiny\">
						</form>
					</div>
				</div>";

			break;

		case 'edit':
			$query 	= "SELECT * FROM genre_book WHERE id_genre='$_GET[id]' ";
			$hasil 	= mysqli_query($konek, $query);
			$r 		= mysqli_fetch_array($hasil);
			echo "<div class=\"columns medium-4 panel\">
					<h4>Update Genre</h4>
					<form action=\"$aksi?module=genre&act=edit\" method=\"POST\" >
						<input type=\"hidden\" name=\"id\" value=\"$r[id_genre]\">
						<label>Genre
							<input type=\"text\" name=\"genre\" value=\"$r[genre]\">
						</label>
						<label>Link
							<input type=\"text\" name=\"link\" value=\"$r[link]\">
						</label>
						<label>";
						 if ($r['active']=='Y') {
						  	echo "Active : <input type='radio' name='active' value='Y' checked>Y 
						  			<input type='radio' name='active' value='N'>N <br>";
						  }else{
						  	echo "Active : <input type='radio' name='active' value='Y'>Y 
						  			<input type='radio' name='active' value='N' checked >N <br>";
	  }
			echo "
						</label>
							<a class=\"button tiny warning\" onclick='self.history.back()'><i class=\"fi-arrow-left\"></i>&nbsp;Cancel</a>
							<input type=\"submit\" value=\"Update\" class=\"button tiny right\">
					</form>
				</div>";
			break;
		
	}
}

?>