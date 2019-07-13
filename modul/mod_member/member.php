<?php
echo "
<ul class=\"tabs\" data-tab>
		<li class=\"tab-title\"><a href=\"#login\">Login</a></li>
		<li class=\"tab-title active\"><a href=\"#daftar\">Daftar</a></li>
	</ul>
	<div class=\"tabs-content\">
		<div class=\"content\" id=\"login\">
			<form action=\"cek_login.php\" method=\"POST\" data-abide>
				<input type=\"email\" name=\"email\" placeholder=\"Alamat Email\">
				<input type=\"password\" name=\"password\" placeholder=\"password\">
				<input type=\"submit\" name=\"\" value=\"Login\" class=\"button small expand radius\">
			</form>
		</div>

		<div class=\"content active\" id=\"daftar\">
			<form action=\"modul/mod_member/aksi_member.php?module=member&act=input\" method=\"POST\" data-abide>
				<input type=\"text\" name=\"nama\" placeholder=\"Nama\">
				<input type=\"email\" name=\"email\" placeholder=\"Email*\">
				<input type=\"password\" name=\"password\" placeholder=\"Password minimal 5 karakter\" id=\"sandi\" minlength=\"5\" required>
					<small class=\"error\">Ulangi Password harus sama dengan Password</small>
				<input type=\"password\" placeholder=\"Ulangi Password\" data-equalto=\"sandi\" minlength=\"5\" >
					<small class=\"error\">Ulangi Password harus sama dengan Password</small>
				<label><input type=\"radio\" name=\"jk\" value=\"L\">&nbsp;Pria</label>
				<label><input type=\"radio\" name=\"jk\" value=\"P\" checked>&nbsp;Wanita</label>
					
				<input type=\"submit\" value=\"Kirim\" class=\"button small expand radius\">
			</form>
				<small class=\"alert center\"> * Jika tombol Kirim tak merespon maka Ulangi Password HARUS SAMA dengan Password
		</div>
		
	</div>
	</small>
	<a class=\"close-reveal-modal\">&#215;</a>
";

?>