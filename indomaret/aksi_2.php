<?php
$tunai 		 = @$_POST['tunai'];
		 		if($tunai) {
			 		$input_tunai = @$_POST['input_tunai'];

			 		$kembali=$input_tunai;
			 		$tes=$itung['subtotal'];
			 		echo "<tr>
							<th colspan=\"2\"> <input type=\"number\" name=\"kembali\" value=\"$kembali\" placeholder=\"$kembali\"> </th>
							<th colspan=\"2\"> <input type=\"number\" name=\"kembali\" value=\"$tes\"> </th>
						</tr>";
			 	}else{
							$tunai 		 = @$_POST['tunai'];
			 			if($tunai) {
					 		$input_tunai = @$_POST['input_tunai'];

					 		$kembali=$input_tunai;
			 				@$kembali=$input_tunai-$itung['sub'];
					 		$tes=$itung['subtotal'];
					 		echo "<tr>
									<th colspan=\"2\"> <input type=\"number\" name=\"kembali\" value=\"$kembali\" placeholder=\"$kembali\"> </th>
									<th colspan=\"2\"> <input type=\"number\" name=\"kembali\" value=\"$tes\"> </th>
								</tr>";
					 	}
			 		}
?>