<?php
include "config/koneksi.php" ;

// ALL
if ($_GET['buku']=='all') {
		include "modul/mod_all/all.php";
}
// GENERAL
elseif ($_GET['buku']=='general') {
		include "modul/mod_general/general.php";
}
// COMPUTER PROGRAMMING
elseif ($_GET['buku']=='comgram') {
		include "modul/mod_comgram/comgram.php";
}
// ISLAM-FALSAFAH
elseif ($_GET['buku']=='islamfalsafah') {
		include "modul/mod_islamfalsafah/islam-falsafah.php";
}
// SOSIAL-BUDAYA
elseif ($_GET['buku']=='sosbud') {
		include "modul/mod_sosbud/sosbud.php";
}
// NOVEL
elseif ($_GET['buku']=='novel') {
		include "modul/mod_novel/novel.php";
}
// KAMUS
elseif ($_GET['buku']=='kamus') {
		include "modul/mod_kamus/kamus.php";
}
// PENGEMBANGAN DIRI
elseif ($_GET['buku']=='pdiri') {
		include "modul/mod_pdiri/pdiri.php";
}
// BIOGRAFI
elseif ($_GET['buku']=='biografi') {
		include "modul/mod_biografi/biografi.php";
}
// INSPIRASI
elseif ($_GET['buku']=='inspirasi') {
		include "modul/mod_inspirasi/inspirasi.php";
}
// KOMIK
elseif ($_GET['buku']=='komik') {
		include "modul/mod_komik/komik.php";
}
// EDUKASI
elseif ($_GET['buku']=='edukasi') {
		include "modul/mod_edukasi/edukasi.php";
}

// pencarian input search
elseif ($_GET['buku']=='search') {
		include "modul/mod_search/aksi_search.php";
}



else{
		include "modul/mod_all/all.php";
}


 ?>