<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="css/login.css"/>
	<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
	<link rel="stylesheet" href="css/login1.css">
	
</head>
<body>
	<div  class="col-md-6 well">

		<div class="col-md-2"></div>
		<div class="col-md-8">
			<?php if(isset($_SESSION['message'])): ?>
				<div class="alert alert-<?php echo $_SESSION['message']['alert'] ?> msg"><?php echo $_SESSION['message']['text'] ?></div>
			
			<?php 
				endif;
				// clearing the message
				unset($_SESSION['message']);
			?>
			<form class="login-box" class="big-div-login" action="login_query.php" method="POST">	
				<h4 class="text-success">Login here...</h4>
			
				<div class="form-group">
					<label>Username</label>
					<input type="text" class="form-control" name="username" required="" />
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" class="form-control" name="password" required="" />
				</div>
				<br />
				<div class="form-group">
					<button class="btn btn-primary form-control login-text" name="login">
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						 Login
				</button>
				</div>
				<a class="Registration-text"  href="registration.php">Registration</a>
			</form>
		</div>
	</div>
</body>
</html>