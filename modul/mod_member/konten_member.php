<?php
include "../../config/koneksi.php" ;

if ($_GET['module']=='member') {
		include "member_data.php";
}

else{
	echo "Modul tidak tersedia";
}


 ?>