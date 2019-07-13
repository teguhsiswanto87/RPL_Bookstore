<link rel="stylesheet" type="text/css" href="assets/foundation-5/css/foundation-index.css">
<?php
include "config/koneksi.php";
// Get variable email & password
$email	= $_POST['email'];
$password	= md5($_POST['password']);
// check in database
$query	= "SELECT * FROM member WHERE email='$email' AND password='$password' ";
$login	= mysqli_query($konek, $query);
$ketemu	= mysqli_num_rows($login);
$data 	= mysqli_fetch_array($login);
// if user find in database
if ($ketemu>0) {
	session_start();
	// make session variable
	$_SESSION['emailmember']=$data['email'];
	$_SESSION['passmember']=$data['password'];
	$_SESSION['id_member']=$data['member_id'];
	$_SESSION['namamember']=$data['nama'];
	$_SESSION['alamatmember']=$data['alamat'];
	$_SESSION['id_kotamember']=$data['id_kota'];
	$_SESSION['phonemember']=$data['phone'];
	// always UPDATE id_session
	$sid_lama=session_id();
	session_regenerate_id();
	$sid_baru=session_id();
	mysqli_query($konek, "UPDATE member SET id_session='$sid_baru' WHERE email='$email' ");

	$_SESSION['session_idL']=$sid_baru;
	$_SESSION['session_id']=substr($sid_baru,0,12);


	// doing redirect
	header("location:media.php?buku=all");
}else{
	echo "<div class=\"columns medium-4 medium-centered panel\">
			<blockquote>
			<p>Email atau Password salah</p>
			</blockquote>
			<input type='button' value='&laquo; Kembali' class=\"button tiny warning left\" onclick=\"self.history.back()\"> <br>
		</div>";

}

?>