<?php
    include "../../../config/koneksi.php";
   	
   	$no=1;
    $query="SELECT * FROM kota where id_provinsi='".$_POST["id_provinsi"]."' ORDER BY nama_kota";
    $hasil=mysqli_query($konek, $query);
    while($r=mysqli_fetch_array($hasil)){
  		echo "
        <option value=\"$r[id_kota] \"> $r[nama_kota] </option><br>
  		"; 
  	$no++;
    }
    ?>