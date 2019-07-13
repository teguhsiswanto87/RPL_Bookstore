<?php session_start(); 
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])) {
	echo "You Must to login ";
}else{
?>
<!DOCTYPE html>
<html>
<head>
	<title>Adminweb | BooksStoreOnline - Toko Buku Online</title>
	<style type="text/css">
		/*@import "DataTables-1.10.11/media/css/jquery.dataTables_themeroller.css";*/
		@import "DataTables-1.10.11/media/css/dataTables.foundation.min.css";
	</style>
	<!-- Sweet -->
	<script src="../assets/sweetalert/sweetalert.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../assets/sweetalert/sweetalert.css">

	<link rel="stylesheet" type="text/css" href="../assets/foundation-5/css/foundation.css">
	<link rel="stylesheet" type="text/css" href="../assets/foundation-icons/foundation-icons.css">
	<script src="../assets/foundation-5/js/vendor/modernizr.js"></script>

  
	<!-- dataTables -->
	<script src="DataTables-1.10.11/media/js/jquery.js"></script>
	<script src="DataTables-1.10.11/media/js/jquery.dataTables.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			oTable = $('#tabelku').dataTable({
				"bJQueryUI": true,
				"sPaginationType": "full_numbers",
				 "oLanguage": {
						      "sLengthMenu": "Tampilan _MENU_ data",
						      "sSearch": "Cari: ", 
						      "sZeroRecords": "Tidak ditemukan data yang sesuai",
						      "sInfo": "_START_ sampai _END_ dari _TOTAL_ data",
						      "sInfoEmpty": "0 hingga 0 dari 0 entri",
						      "sInfoFiltered": "(penyaringan dari _MAX_ entri keseluruhan)",
						      "oPaginate": {
						          "sFirst": " First ",
						          "sLast": " Last ", 
						          "sPrevious": " &laquo; Prev ", 
						          "sNext": " Next &raquo "
					       }
				      }
			});
		});
	</script>

</head>
<body>
<!-- OFF CANVAS -->
<div class="off-canvas-wrap" data-offcanvas>
	<div class="inner-wrap">
		<nav class="tab-bar show-for-small">
			<section class="left-small">
				<a class="left-off-canvas-toggle menu-icon"><span></span></a>
			</section>
			<section class="middle tab-bar-section">

				<a href="#"><img src="../images/logo.png"></a>
			</section>
		</nav>


	<!-- TOP BAR -->
	<div class="contain-to-grid sticky hide-for-small">
		<nav class="top-bar " data-topbar role="navigation">
			<ul class="title-area">
				<li class="name"><a href="#"><img src="../images/logo.png"></a></li>
				<li class="toggle-topbar menu-icon"><a><span>Menu</span></a></li>
			</ul>
			<section class="top-bar-section">
				<ul>
					<?php include"header.php"; ?>
					<li class="has-form"><a class="button secondary radius tiny" href="#"><?php echo "$_SESSION[namauser]";?></a></li>

					<li class="has-form right"><a href="logout.php" class="button alert">LogOut</a></li>
					<li class="divider right"></li>
					<li class="right"><a href="#"><?php echo "$r[level]";?></a></li>
					<li class="divider right"></li>
					<li class="has-form right"><a href="#"><?php echo "$r[nama_lengkap]";?></a></li>
				</ul>
			</section>
			
		</nav>
	</div>

	<!-- MENU OFF_CANVAS-->
	<aside class="left-off-canvas-menu" >
		<ul class="off-canvas-list">
			<li><label>Adminweb</label></li>
			<?php include "menu.php"; ?>
			<li><a class="off-canvas-submenu-call">Genre of Books <span class="right"> + </span></a></li>
				<ul class="off-canvas-submenu">
					<?php include "submenu_genre.php"; ?>
				</ul>			
		</ul>
	</aside>

	<section class="main-section">
		<!-- MENU SIDE BAR here -->
		<aside class="columns medium-3 large-2 panel press hide-for-small">
			<!-- SIDE NAV -->
				<ul class="side-nav">
					<li class="heading text-center">AdminWeb</li>
					<?php include "menu.php"; ?>
					<li><a class="side-nav-submenu-call">Genre of Books <span class="right"> + </span></a></li>
						<ul class="side-nav-submenu no-bullet">
							<?php include "submenu_genre.php"; ?>
						</ul>			
				</ul>
		</aside>

		<!-- CONTENT here -->
		<content class="columns medium-9 large-10 panel callout" style="min-height:600px;">
			<?php include "content.php"; ?>
			
				<div style="clear:both;"></div>
				<!-- FOOTER here -->
				<footer><hr>
					<p align="center">Copyright &copy; 2016 by Teguh Siswanto. Design of Zurb-Foundation</p>
				</footer>
		</content>
	</section>
		<a class="exit-off-canvas"></a>
	</div>
</div>


<!-- <script src="../assets/foundation-5/js/vendor/jquery.js"></script> -->
<script src="../assets/foundation-5/js/foundation.min.js"></script>
<script>
	$(document).foundation();
	// cari kota
	   $("#provinsi").change(function(){
   
        // variabel dari nilai combo box provinsi
        var id_provinsi = $("#provinsi").val();
       
        // tampilkan image load
        $("#imgLoad").show("");
       
        // mengirim dan mengambil data
        $.ajax({
            type: "POST",
            dataType: "html",
            url: "modul/mod_member/cari_kota.php",
            data: "id_provinsi="+id_provinsi,
            success: function(msg){
               
                // jika tidak ada data
                if(msg == ''){
                    alert('Tidak ada data Kota');
                }
               
                // jika dapat mengambil data,, tampilkan di combo box kota
                else{
                    $("#kota").html(msg);                                                     
                }
               
                // hilangkan image load
                $("#imgLoad").hide();
            }
        });    
    });


	//Hapus confirm
    jQuery(document).ready(function($){
            $('.delete-link').on('click',function(){
                var getLink = $(this).attr('href');
                swal({
                        title: 'Peringatan!',
                        text: 'Hapus Buku Tersebut dari keranjang belanja?',
                        html: true,
                        confirmButtonColor: '#d9534f',
                        showCancelButton: true,
                        },function(){
                        window.location.href = getLink
                    });
                return false;
            });
        });
</script>
</body>
</html>
<?php } ?>