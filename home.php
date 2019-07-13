<?php session_start(); $_SESSION['session_id']=substr(session_id(),0,12); 
	include "config/koneksi.php";  
	include "config/library.php";
	?>

<html>
<head>
	<title>BooksStoreOnline - Toko Buku Online</title>

	<link rel="icon" href="images/logo_icon.png">
	<link rel="stylesheet" type="text/css" href="assets/foundation-5/css/foundation-index.css">
	<link rel="stylesheet" type="text/css" href="assets/foundation-icons/foundation-icons.css">
	<script src="assets/foundation-5/js/vendor/modernizr.js"></script>

	<!-- AUTOCOMPLETE -->
 	<!-- <script type="text/javascript" src="assets/js/jquery-1.4.js"></script> -->
	<link rel="stylesheet" type="text/css" href="assets/css/jquery.ui.css">

	<script type="text/javascript" language="javascript">
	$(document).ready(function(){
		$("#cari").autocomplete({
		source: "assets/js/data.php"
		});
	});
	</script>
</head>
<body>
<?php 
	$ambil="SELECT SUM(qty) AS jumlah FROM carts WHERE no_faktur='$_SESSION[session_id]'  "; 
	$jukuk=mysqli_query($konek,$ambil);
	$row = mysqli_fetch_array($jukuk); 
?>
<!-- HEADER -->
<div class="header-link-bar">
	<nav class="top-nav">
		<ul class="top-nav top-nav_list inline-list">
			<li class="right" data-reveal-id="modal">Login | Daftar</li>
			<li class="has-dropdown right">
				<a href="#" data-dropdown="drop" class="dropdown" style="color: currentColor;"> Lacak Pesanan </a>
					<ul id="drop" class="f-dropdown text-center initial" data-dropdown-content>
						<?php include "config/koneksi.php"; 
				$ada=mysqli_num_rows(mysqli_query($konek,"SELECT * FROM orders WHERE no_faktur='$_SESSION[session_id]' AND status='1' "));
						?>
						<span> Ada <b><?php echo "$ada"; ?></b> order belum dibayar</span>
						<li><a data-reveal-id="modal"> <i class="fi-pencil"></i> Detail Order </a></li>
				</ul>
			</li>
			<li class="right"> <a data-reveal-id="care">Customer Care</a></li>
		</ul>
	</nav>
</div>
	<div class="contain-to-grid sticky hide-for-small">
		<nav class="top-bar" data-topbar role="navigation">
			<ul class="title-area">
				<li class="name"><a href="#"><img src="images/logo.png"></a></li>
				<li class="toggle-topbar menu-icon"><a><span>Menu</span></a></li>
			</ul>
			<section class="top-bar-section">
				<ul>
					<li class="has-form"> 
						 <form action="?buku=search" method="POST">
							<div class="row collapse">
								<div class=" large-6 medium-6 columns">
									<input type="search" placeholder="Cari buku berdasarkan" class="header-search" id="cari" 
									name="input_cari" required> 
								</div>
								<div class="large-4 medium-4  columns">
									<select name="kate_cari" class="kate_cari">
										<option value="book_name"> Judul Buku </option>
										<option value="author"> Nama Pengarang </option>
									</select>
								</div>
								<div class=" large-2 medium-2 columns">
									<input type="submit" value="Cari" class="button warning" name="cari" class="tombol-cari"> 
								</div>
							</div>
						</form>
					</li>

					<li class="right"><a>Gratis pengiriman</a></li>
					<li class="right">
						<a href=""  data-options="align:bottom;" data-dropdown="cart-view" >
							<img src="images/cart.png"><?php  echo "<b>" . number_format($row['jumlah']) . "</b>";?>
								<div id="cart-view" class="f-dropdown small" data-dropdown-content style="color: #000;">
									<h6 class="text-center">Keranjang Belanja</h6>
									<?php
										echo "<table class=\"table-hover\">";
										$waw = mysqli_query($konek, "SELECT B.book_price, B.diskon, A.cart_id, A.no_faktur, A.qty, A.book_id, A.subtotal, B.book_name FROM 
											carts A INNER JOIN books B ON A.book_id=B.book_id WHERE A.no_faktur='$_SESSION[session_id]' ");
										$no=1;
										while ($ambil=mysqli_fetch_array($waw)) {
											echo "<tr>
												<td>$ambil[book_name]</td>
												<td>$ambil[qty]</td>
											</tr>";
										}
										$no++;
											echo "</table>";

									?>
								</div> <!-- tutupe konten dropdown -->
						</a>
					</li>
				</ul>
			</section>
			
		</nav>
	</div>

<div class="category-link-bar hide-for-small">
	<nav class="top-nav">
		<ul class="top-nav top-nav_list category-nav">
			<?php include "menu.php"; ?>

		</ul>
	</nav>
</div>
<!-- OFF CANVAS -->
	<div class="off-canvas-wrap hide-for-medium hide-for-large" data-offcanvas>
		<div class="inner-wrap">
			<nav class="tab-bar">
				<section class="left-small">
					<a class="left-off-canvas-toggle menu-icon">
						<span></span>
					</a>
				</section>
				<section class="middle tab-bar-section">
					<h1 class="title"><img src="images/logo.png"> </h1>
				</section>
			</nav>
			<aside class="left-off-canvas-menu">
				<ul class="off-canvas-list">
					<li><label> Kategori </label></li>
					<?php include "menu.php"; ?>
				</ul>
			</aside>
			<section class="main-section">
				<!-- CONTENT -->
				<content class="columns medium-9 large-10 panel hide-for-large" style="min-height:660px;">
					<?php include "content.php"; ?>
					
						<div style="clear:both;"></div>
						<!-- FOOTER here -->
						<footer>
						</footer>
				</content>

			</section>
			<a class="exit-off-canvas"></a>
		</div>
	</div><!-- 3 baris ke atas tutupnya OFF CANVAS -->

			<!-- REVEAL MODAL login atau daftar -->
<div id="modal" class="reveal-modal small" data-reveal>
		<?php include "modul/mod_member/member.php";?>
</div>
<div id="care" class="reveal-modal small" data-reveal>
	<a class="close-reveal-modal">&#215;</a>
	<h4>Ini Panduan Belanja</h4>
</div>
	<br>
<!-- CONTENT -->
	<!-- Books List -->
<div class="hide-for-small">
	<div class="columns large-1 left panel callout hide-for-small hide-for-medium">
	</div>
		<?php include "content.php"; ?>

</div>

<!-- FOOTER -->
  <div class="columns large-12 footer">
    <div class="small-12 medium-3 large-4 columns">
      <i class="fi-laptop"></i>
      <p>Bookstore adalah sistem informasi yang mengelola penjualan buku secara online yang berbasis web. Website ini
      menjual buku dengan diskon seumur hidup dan memiliki tampilan website User Friendly. <cite>(menurut kami)</cite> </p>
    </div>
    <div class="small-12 medium-3 large-4 columns">
      <i class="fi-html5"></i>
      <p>Website Bookstore ini merupakan pemenuhan dari tugas akhir kejuruhan (TA) yang dapat dipertanggungjawabkan sebagai salah satu syarat kelulusan di SMK Negeri 2 Kota Bandung</p>
    </div>
    <div class="small-6 medium-3 large-2 columns">
      <h4>Work With Us</h4>
      <ul class="footer-links">
        <li><a href="#">Agung Rizky Maulana</a></li>
        <li><a href="#">Kandy SUpriadi</a></li>
        <li><a href="#">Teguh Siswanto</a></li>
        <li><a href="#">Kawan-kawan XII RPL</a></li>
      <ul>
    </div>
    <div class="small-6 medium-3 large-2 columns">
      <h4>Follow Us</h4>
      <ul class="footer-links">
        <li><a href="#">GitHub</a></li>
        <li><a href="#">Facebook</a></li>
        <li><a href="#">Twitter</a></li>
        <li><a href="#">Instagram</a></li>
        <li><a href="#">Dribbble</a></li>
      <ul>
    </div>
  </div>



<script src="assets/foundation-5/js/vendor/jquery.js"></script>
<script src="assets/foundation-5/js/foundation.min.js"></script>
<script>
	$(document).foundation();
</script>
</body>
</html>