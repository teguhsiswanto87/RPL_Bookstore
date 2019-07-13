<!DOCTYPE html>
<html>
<head>
	<title>BooksStore | Login Administrator</title>
	<link rel="stylesheet" type="text/css" href="../assets/foundation-5/css/foundation.css">
	<link rel="stylesheet" type="text/css" href="../assets/foundation-icons/foundation-icons.css">
	<script src="../assets/foundation-5/js/vendor/modernizr.js"></script>
</head>
<body>
<div class="row">
	<div class="columns medium-4 small-centered panel callout">
		<h4>Login AdminWeb</h4>
		<form action="cek_login.php" method="POST">
			<label>Username
				<input type="text" name="username" id="username">
			</label>
			<label>Password
				<input type="Password" name="password" id="password">
			</label>
			<input type="submit" value="Login" class="button small radius">
		</form>
	</div>
</div>


<script src="../assets/foundation-5/js/vendor/jquery.js"></script>
<script src="../assets/foundation-5/js/foundation.min.js"></script>
<script>
	$(document).foundation();
</script>
</body>
</html>