<?php

	$query = "SELECT * FROM member WHERE id_session='$_SESSION[session_idL]' ";
	$tampil = mysqli_query($konek, $query);
	$r=mysqli_fetch_array($tampil);
		if ($r['alamat']=='' OR $r['id_kota']==0 OR $r['phone']=='' OR $r['kode_pos']==0 ) {
			echo "<h4>Mohon lengkapi data Anda pada 'kelola data' <small> $r[email] > Kelola Data</small> </h4>";
			echo "<a href=\"../mod_member/media_member.php?module=member\" class=\"button radius\"> <i class=\"fi-pencil\"></i> Lengkapi Data </a>";
		}else{

		}
	

 ?>