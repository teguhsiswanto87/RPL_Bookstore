<?php
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])) {
	echo "You Must to login ";
}else{

include "../config/koneksi.php" ;
include "../config/library.php" ;

// MODULE
if ($_GET['module']=='modul') {
	if ($_SESSION['leveluser']=='admin') {
		include "modul/mod_modul/modul.php";
	}
}
// BOOKs
elseif ($_GET['module']=='books') {
	if ($_SESSION['leveluser']=='admin') {
		include "modul/mod_books/books.php";
	}
}
// USERS
elseif ($_GET['module']=='user') {
	if ($_SESSION['leveluser']=='admin') {
		include "modul/mod_user/user.php";
	}
}
// MEMBER
elseif ($_GET['module']=='member') {
	if ($_SESSION['leveluser']=='admin') {
		include "modul/mod_member/member.php";
	}
}
// GENRE
elseif ($_GET['module']=='genre') {
	if ($_SESSION['leveluser']=='admin') {
		include "modul/mod_genrebook/genre.php";
	}
}
// DASHBOARD
elseif ($_GET['module']=='dash') {
	if ($_SESSION['leveluser']=='admin') {
		include "modul/mod_dashboard/dashboard.php";
	}
}
// LETAK PROVINSI & KOTA
elseif ($_GET['module']=='letak') {
	if ($_SESSION['leveluser']=='admin') {
		include "modul/mod_letak/letak.php";
	}
}elseif ($_GET['module']=='kota') {
	if ($_SESSION['leveluser']=='admin') {
		include "modul/mod_letak/letak.php";
	}
}


// if module is none
else{
	echo "Sabar, Sedang Dibuat";
}

} ?>