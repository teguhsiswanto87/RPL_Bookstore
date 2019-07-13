<?php
include "config/koneksi.php";
include "config/library.php";
$hal	= "cart.tpl";
require('libs/Smarty.class.php');

//create smarty new object
$smarty = new Smarty;
//dapatkan
$module = $_GET['buku'];
// tampilkan data belanja
$sql = mysqli_query($konek, "SELECT B.book_price, B.diskon, A.cart_id, A.no_faktur, A.qty, A.book_id, A.subtotal, B.book_name FROM 
					carts A INNER JOIN books B ON A.book_id=B.book_id /*WHERE A.no_faktur='S_SESSION[session_id]'*/ ");
$nums = mysqli_num_rows($sql);
$no=1;
while ($data=mysqli_fetch_array($sql)) {
			$total = $data['subtotal']*$data['qty'];
			$price = format_rupiah($data['subtotal']);
			$priceAfterDiscount = format_rupiah($data['book_price'] - ($data['book_price'] * ($data['diskon'] / 100)) );
			$harga = $data['book_price'] - ($data['book_price'] * ($data['diskon'] / 100));
			$dtCart[] = array( 'cart_id' => $data['cart_id'] ,
							'no_faktur' => $data['no_faktur'],
							'qty' => $data['qty'],
							'book_id' => $data['book_id'],
							'subtotal' => $price,
							'price' => $harga,
							'harga' => format_rupiah($harga),
							'nums' => $nums,
							'book_name' => $data['book_name'],
							'no' => $no,
							'total' => $total
							);
							$no++;
}
$smarty-> assign("dataCart", $dtCart);
//$smarty-> display($hal);

header("location:index.php?buku=".$module);



?>