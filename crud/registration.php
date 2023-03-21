<!DOCTYPE html>
<html lang="en">
	<head>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" href="css/registration.css">
	</head>
<body>

		<div class="col-md-8">
			<form class="login-box" action="register_query.php" method="POST">	
				<h4 class="text-success">Register here...</h4>
			
				<div class="form-group">
					<label>Firstname</label>
					<input type="text" class="form-control" name="firstname" />
				</div>
				<div class="form-group">
					<label>Lastname</label>
					<input type="text" class="form-control" name="lastname" />
				</div>
				<div class="form-group">
					<label>Username</label>
					<input type="text" class="form-control" name="username" />
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" class="form-control" name="password" />
				</div>
				<br />
				<div class="form-group">
					<button class="btn btn-primary form-control login-text" name="register">Register</button>
				</div>
				<a class="Registration-text" href="index.php">Login</a>
			</form>
		</div>
	</div>
</body>
</html>




