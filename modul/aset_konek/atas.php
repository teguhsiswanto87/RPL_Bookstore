<!DOCTYPE html>
<html>
<head>
	<title>BookStore</title>

	<link rel="icon" href="../../images/logo_icon.png">
	<link rel="stylesheet" type="text/css" href="../../assets/foundation-5/css/foundation.css">
	<link rel="stylesheet" type="text/css" href="../../assets/foundation-icons/foundation-icons.css">
	<script src="../../assets/foundation-5/js/vendor/modernizr.js"></script>
</head>
<body>
<div class="header-link-bar">
	<nav class="top-nav">
		<ul class="top-nav top-nav_list">
			<li class="left">BookStore | Toko Buku Online</li>
			<li>Customer Care</li>
			<li class="has-dropdown">
				<a href="#" data-dropdown="drop" class="dropdown" style="color: currentColor;"> Lacak Pesanan </a>
					<ul id="drop" class="f-dropdown text-center initial" data-dropdown-content>
						<?php
			$ada=mysqli_num_rows(mysqli_query($konek,"SELECT * FROM orders WHERE member_id='$_SESSION[id_member]' AND status='1' "));
						?>
						<span> Ada <b><?php echo "$ada"; ?></b> order belum dibayar</span>
						<li><a href="../../modul/mod_cart/order.php"> <i class="fi-pencil"></i> Detail Order </a></li>
				</ul>
			</li>
			<li class="has-dropdown">
			    <a href="#" data-dropdown="drop1" class="dropdown" style="color: currentColor;"><?php echo "$_SESSION[emailmember]"; ?> </a>
					<ul id="drop1" class="f-dropdown text-center initial" data-dropdown-content>
						<span> <?php echo "$_SESSION[namamember]"; ?> </span>
						<li><a href="../../logout.php" class="label alert"> Logout </a></li>
						<li><a href="../mod_member/media_member.php?module=member"> <i class="fi-pencil"></i> Kelola Data </a></li>
				</ul>
			</li>
		</ul>
	</nav>
</div>