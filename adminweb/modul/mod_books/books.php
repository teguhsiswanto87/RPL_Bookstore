<?php
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])) {
	echo "You Must to login ";
}else{
// ACTION
$aksi	= "modul/mod_books/aksi_books.php";
$act	= isset($_GET['act']) ? $_GET['act'] : '' ;
// THE CONTENTS
	switch ($act) {
		default:
			// VIEW TABLE Of BOOKs
			echo "<div class=\"columns medium-12 panel\">
					<h4>Books Management
						<a href=\"#\" data-reveal-id=\"add\" class=\"button tiny right\">Add Book</a>
					</h4>
					<div class=\"table-full-width\">
						<table class=\"table-hover display\" id=\"tabelku\">
							<thead>
								<tr>
									<th>No</th>
									<th>Book Title</th>
									<th>Genre</th>
									<th>Author</th>
									<th>Price (Rp)</th>
									<th>Stock</th>
									<th>Disc</th>
									<th>bs</th>
									<th>img</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>";
									$no=1;
									$query	= "SELECT * FROM books ORDER BY book_id DESC";
									$hasil	= mysqli_query($konek, $query);
									while ($r=mysqli_fetch_array($hasil)) {
										echo "<tr>
												<td>$no</td>
												<td>$r[book_name]</td>
												<td>$r[id_genre]</td>
												<td>$r[author]</td>
												<td>$r[book_price]</td>";
												if ($r['stock']==0) {
													echo "<td><label class=\"label alert\"> $r[stock] </label></td>";
												}elseif ($r['stock']<20) {
													echo "<td><label class=\"label warning\"> $r[stock] </label></td>";
												}else{
													echo "<td>$r[stock] </td>";
												}
										echo"	<td>$r[diskon]</td>";

												if ($r['bestseller']=='Y') {
													echo "<td class=\"label success\">$r[bestseller]</td>";
												}else{
													echo "<td>$r[bestseller]</td>";
												}

													if ($r['gambar']=='') {
														echo "<td></td>";
													}else{
														echo "<td><i class=\"fi-check\" style=\"color:#4CAF50;\"></i></td>";
													}
											echo "
												<td> <a class=\"label secondary\" href=\"?module=books&act=edit&id=$r[book_id]\">EDIT</a> 
													<a href='$aksi?module=books&act=hapus&id=$r[book_id]' class='delete-link'>
														<i class=\"fi-x\" style=\"color:#900;\"></i>
													</a>
													</td>
											</tr>";
									$no++;
									}
				echo "		</tbody>
						</table>
					</div>
				</div>";

			// ADDING BOOK with Reveal-Modal
			echo "<div class=\"reveal-modal small\" id=\"add\" data-reveal>
					<div class=\"columns large-12 medium-centered\">
						<h4>Add Books</h4>
						<form action=\"$aksi?module=books&act=input\" method=\"POST\" enctype=\"multipart/form-data\">
							<label>Book Title
								<input type=\"text\" name=\"book_name\" required>
							</label>
							<label>Genre 
								<select name=\"genre\">
									<option value=\"0\" selected>- Select Genre -</option>";
									$query = "SELECT * FROM genre_book WHERE active='Y' AND genre!='all' ";
									$tampil = mysqli_query($konek, $query);
									while ($r=mysqli_fetch_array($tampil)) {
										echo "
										<option value='$r[id_genre]'>$r[id_genre] $r[genre] </option> "; 
										}
					echo "				
								</select> 
							</label>
							<label>Price
								<input type=\"number\" name=\"book_price\" required>
							</label>
							<label>Stock
								<input type=\"number\" name=\"stock\" required>
							</label>
							<label>Discount (%)
								<input type=\"number\" name=\"diskon\" required>
							</label>
							<label>Author
								<input type=\"text\" name=\"author\" required>
							</label>
							<label>Product Image <i>(.jpg)</i>
								<input type=\"file\" name=\"fupload\" required>
							</label>
								<input type=\"submit\" value=\"Input\" class=\"button tiny\">
						</form>
					</div>
				</div>";

			break;

		case 'edit':
			$query 	= "SELECT * FROM books WHERE book_id='$_GET[id]' ";
			$hasil 	= mysqli_query($konek, $query);
			$r 		= mysqli_fetch_array($hasil);
			echo "<div class=\"columns medium-5 panel\">
					<h4>Update Book</h4>
					<form action=\"$aksi?module=books&act=edit\" method=\"POST\" enctype=\"multipart/form-data\">
						<input type=\"hidden\" name=\"id\" value=\"$r[book_id]\">
						<label>Book Name
							<input type=\"text\" name=\"book_name\" value=\"$r[book_name]\">
						</label>
						<label>Genre
							<select name=\"genre\">";
								$query2 = "SELECT * FROM genre_book ";
								$tampil = mysqli_query($konek, $query2);
								while ($w=mysqli_fetch_array($tampil)) {
										if ($r['id_genre']==$w['id_genre']) {
											echo "<option value=\"$w[id_genre]\" selected> $w[genre] </option> "; 
										}else{
											echo "<option value=\"$w[id_genre]\"> $w[genre] </option> "; 
										}
									}
				echo "		</select>
						</label>
						<label>Book Price
							<input type=\"number\" name=\"book_price\" value=\"$r[book_price]\">
						</label>
						<label>Discount (%)
							<input type=\"number\" name=\"diskon\" value=\"$r[diskon]\">
						</label>
						<label>Author
							<input type=\"text\" name=\"author\" value=\"$r[author]\">
						</label>
						<label>Bestseller ";
							if ($r['bestseller']=='Y') {
								echo "<input type=\"radio\" name=\"bestseller\" value=\"Y\" checked> Y 
									<input type=\"radio\" name=\"bestseller\" value=\"N\"> N";
							}else{
								echo "<input type=\"radio\" name=\"bestseller\" value=\"Y\"> Y 
									<input type=\"radio\" name=\"bestseller\" value=\"N\" checked> N";
							}
				echo "
						</label>";
						if ($r['gambar']!='') {
							echo "<img src=\"../books_image/$r[gambar]\"> ";
						}else{
							echo "Product Image is none !";
						}
				echo "
						<label>Change Product Image <small class=\"label info\"> If Image not change then empty it</small>
							<input type=\"file\" name=\"fupload\" value=\"$r[gambar]\">
						</label>
							<a class=\"button tiny warning\" onclick='self.history.back()'><i class=\"fi-arrow-left\"></i>&nbsp;Cancel</a>
							<input type=\"submit\" value=\"Update\" class=\"button tiny right\">
					</form>
				</div>";
			break;
	
				// GENERAL BOOKS
		case 'general':
			echo "<div class=\"columns medium-9 panel\">
					<h4>General Books</h4>
					<div class=\"table-full-width\">
						<table class=\"table-hover\">
							<thead>
								<tr>
									<th>No</th>
									<th>Book Title</th>
									<th>Genre</th>
									<th>Author</th>
									<th>Price (Rp)</th>
									<th>Date Input</th>
									<th>Bestseller</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								<tr>";
									$no=1;
									$query	= "SELECT * FROM books WHERE id_genre=8 ";
									$hasil	= mysqli_query($konek, $query);
									while ($r=mysqli_fetch_array($hasil)) {
										echo "<tr>
												<td>$no</td>
												<td>$r[book_name]</td>
												<td>$r[id_genre]</td>
												<td>$r[author]</td>
												<td>$r[book_price]</td>
												<td>$r[tanggal]</td>
												<td>$r[bestseller]</td>
												<td> <a class=\"label secondary\" href=\"?module=books&act=edit&id=$r[book_id]\">EDIT</a> 
													</td>
											</tr>";
									$no++;
									}
				echo "			</tr>					
							</tbody>
						</table>
					</div>
				</div>";
			// ADDING BOOK
			echo "<div class=\"columns medium-3 \">
					<div class=\"panel\">
						<h4>Add Books</h4>
						<form action=\"$aksi?module=books&act=input\" method=\"POST\" >
							<label>Book Title
								<input type=\"text\" name=\"book_name\" required>
							</label>
							<label>Genre 
								<select name=\"genre\">
									<option value=\"0\" selected>- Select Genre -</option>";
									$query = "SELECT * FROM genre_book ";
									$tampil = mysqli_query($konek, $query);
									while ($r=mysqli_fetch_array($tampil)) {
										echo "
										<option value='$r[id_genre]'>$r[id_genre]&nbsp;$r[genre] </option> "; 
										}
					echo "				
								</select> 
							</label>
							<label>Price
								<input type=\"text\" name=\"book_price\" required>
							</label>
							<label>Author
								<input type=\"text\" name=\"author\" required>
							</label>
								<input type=\"submit\" value=\"Input\" class=\"button tiny\">
						</form>
					</div>
				</div>";

				break;	
	}

}?>