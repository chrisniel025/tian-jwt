<?php

    session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login with JWT</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<h1 class="page-header text-center">JSON Web Token (JWT)</h1>
	<div class="row">
		<div class="col-sm-4 col-sm-offset-4 panel panel-default" style="padding:20px;">
			<form method="POST" action="./php/login.php">
				<p class="text-center" style="font-size:25px;"><b>Login</b></p>
				<hr>
				<div class="form-group">
					<label for="username">Email:</label>
					<input type="email" name="uemail" id="uemail" class="form-control" placeholder="Email Address">
				</div>
				<div class="form-group">
					<label for="password">Password:</label>
					<input type="password" name="upass" id="upass" class="form-control" placeholder="Password">
				</div>
				<button type="submit" name="Submit" class="btn btn-primary"><span class="glyphicon glyphicon-log-in"></span> Login</button>
			</form>
			<?php
				if(isset($_SESSION['error'])){
					?>
					<div class="alert alert-danger text-center" style="margin-top:20px;">
						<?php echo $_SESSION['error']; ?>
					</div>
					<?php

					unset($_SESSION['error']);
				}
			?>
		</div>
	</div>
</div>
</body>
</html>