<?php
session_start(); 
if (empty($_SESSION['emailmember']) AND empty($_SESSION['passmember'])) {
	echo "Login dulu mas bro !";
}else{

include "../../config/koneksi.php";
include "../../config/library.php";

include "../aset_konek/atas.php";
//konten
include "konten_member.php";
			
include "../aset_konek/bawah.php";
} ?>