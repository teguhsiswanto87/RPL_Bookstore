<?php 
session_start(); 
if (empty($_SESSION['emailmember']) AND empty($_SESSION['passmember'])) {
	include "modul/mod_member/harus_daftarlogin.php";
}else{
	include "config/koneksi.php"; 
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
<!-- HEADER -->
<div class="header-link-bar">
	<nav class="top-nav">
		<ul class="top-nav top-nav_list inline-list">
			<li class="right" style="color: #f08a24;">Partner Kami</li>
			<li class="has-dropdown right">
			    <a href="#" data-dropdown="drop1" class="dropdown" data-options="align:bottom;" 
			    	style="color: currentColor;"><?php echo "$_SESSION[emailmember]"; ?> 
			    </a>
					<ul id="drop1" class="f-dropdown text-center initial" data-dropdown-content >
						<span> <?php echo "$_SESSION[namamember]"; ?> </span>
						<li><a href="logout.php" class="label alert"> Logout </a></li>
						<li><a href="modul/mod_member/media_member.php?module=member"> <i class="fi-pencil"></i> Kelola Data </a></li>
				</ul>
			</li>
			<li class="has-dropdown right">
				<a href="#" data-dropdown="drop" class="dropdown" style="color: currentColor;"> Lacak Pesanan </a>
					<ul id="drop" class="f-dropdown text-center initial" data-dropdown-content>
						<?php
			$ada=mysqli_num_rows(mysqli_query($konek,"SELECT * FROM orders WHERE member_id='$_SESSION[id_member]' AND status='1' "));
						?>
						<span> Ada <b><?php echo "$ada"; ?></b> order belum dibayar</span>
						<li><a href="modul/mod_cart/order.php"> <i class="fi-pencil"></i> Detail Order </a></li>
				</ul>
			</li>
			<li class="right"> <a data-reveal-id="care">Customer Care</a></li>
		</ul>
	</nav>
</div>
	<div class="contain-to-grid sticky">
		<nav class="top-bar" data-topbar role="navigation">
			<ul class="title-area">
				<li class="name"><a><img src="images/logo.png"></a></li>
				<li class="toggle-topbar menu-icon"><a><span>Menu</span></a></li>
			</ul>
			<section class="top-bar-section">
				<ul>
					<li class="has-form"> 
						 <form action="?buku=search" method="POST">
							<div class="row collapse">
								<div class="large-6 medium-6 small-6 columns">
									<input type="search" placeholder="Cari buku berdasarkan" class="header-search" id="cari" 
									name="input_cari" required> 
								</div>
								<div class="large-4 medium-4 small-4 columns">
									<select name="kate_cari" class="kate_cari">
										<option value="book_name"> Judul Buku </option>
										<option value="author"> Nama Pengarang </option>
									</select>
								</div>
								<div class="large-2 medium-2 small-2 columns">
									<input type="submit" value="Cari" class="button warning" name="cari"> 
								</div>
							</div>
						</form>
					</li>

					<li class="right hide-for-small"><a href=""> Gratis Pengiriman </a></li>
					<li class="right">
						<a href="modul/mod_cart/cart.php">
							<!-- Ambil jumlah buku pada cart -->
							<?php 
								$ambil="SELECT SUM(qty) AS jumlah FROM carts WHERE no_faktur='$_SESSION[session_id]'  "; 
								$jukuk=mysqli_query($konek,$ambil);
								$row = mysqli_fetch_array($jukuk); 
							?>
							<img src="images/cart.png"><?php  echo "<b>" . number_format($row['jumlah']) . "</b>";?>
						</a> <!-- TUTUPNYA AHREF KERANJANG BELANJA -->
					</li>
				</ul>
			</section>
			
		</nav>
	</div>

<!-- menu kategori buku -->	
<div class="category-link-bar">
	<nav class="top-nav">
		<ul class="top-nav top-nav_list category-nav">
			<?php include "menu.php"; ?>
		</ul>
	</nav>
</div>

<!-- login atau daftar member -->
<div id="modal" class="reveal-modal small" data-reveal>
		<?php include "modul/mod_member/member.php";?>
</div>
	<br>

<!-- CONTENT -->
	<!-- Books List -->
<div class="">
	<div class="columns large-1 left panel callout hide-for-medium hide-for-small">
	</div>
		<?php include "content.php";?>
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
<?php } ?>