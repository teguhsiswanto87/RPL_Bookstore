<!-- Sweet -->
<script src="../../assets/sweetalert/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="../../assets/sweetalert/sweetalert.css">

<script src="../../assets/foundation-5/js/vendor/jquery.js"></script>
<script src="../../assets/foundation-5/js/foundation.min.js"></script>
<script>
	$(document).foundation();
	   $("#provinsi").change(function(){
   
        // variabel dari nilai combo box provinsi
        var id_provinsi = $("#provinsi").val();
       
        // tampilkan image load
        $("#imgLoad").show("");
       
        // mengirim dan mengambil data
        $.ajax({
            type: "POST",
            dataType: "html",
            url: "cari_kota.php",
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
    //Edit confirm
    jQuery(document).ready(function($){
            $('.edit-link').on('click',function(){
                var getLink = $(this).attr('href');
                swal({
                        title: 'Peringatan!',
                        text: 'Edit Data Tersebut?',
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