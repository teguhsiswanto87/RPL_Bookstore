 <link rel="stylesheet" type="text/css" href="jquery.autocomplete.css" />
 <script type="text/javascript" src="jquery-1.4.js"></script>
  <script type='text/javascript' src='jquery.autocomplete.js'></script>
  <script language="javascript">
$().ready(function() {	
		$("#book_name").autocomplete("proses_nama.php", { width: 358 });
    $("#book_name").result(function(event, data, formatted) {
	var book_name = document.getElementById("book_name").value;
	$.ajax({
		url : 'assets/php/ambilDataPlg.php?book_name='+book_name,
		dataType: 'json',
		data: "book_name="+formatted,
		success: function(data) {}
	});	
			
	});
  
  });
  </script>
<?php
	include "../../../../config/koneksi.php" ;
	error_reporting(0);
	$query=mysqli_query($konek, "SELECT * FROM books where book_id='".$_GET['book_id']."'"); 
		$r=mysqli_fetch_array($query);
echo"<form id='form' name='form' method='post' action=''>
  <table width='314' border='0' cellspacing='0' cellpadding='0'>
    <tr>
      <td width='80'>Nama</td>
      <td width='228'><label>
        <input type='text' name='book_name' id='book_name' value='$r[book_name]'/>
       <i>search</i>
      </label></td>
    </tr>
    <tr>
      <td>Alamat</td>
      <td><input type='text' name='alamat' id='alamat' value='$r[alamat]' /></td>
    </tr>
    <tr>
      <td>Tlp</td>
      <td><input type='text' name='tlp' id='tlp' value='$r[tlp]' /></td>
    </tr>
  </table>
</form>";
?>

