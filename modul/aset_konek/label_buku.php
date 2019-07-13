<?php

if ($r['tanggal']==date('Y-m-d')) {
		echo "
			<div class=\"callout-card info\">
			        <div class=\"card-label\">
		           <div class=\"label-text\">NEW </div>
		         </div> 
			</div>";
	}elseif ($r['bestseller']=='Y') {
		echo "
			<div class=\"callout-card primary\">
	          <div class=\"card-label\">
	            <div class=\"label-text\">BEST </div>
	          </div>
			</div>";
	}
?>