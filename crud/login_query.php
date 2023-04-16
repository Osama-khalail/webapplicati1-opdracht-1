<?php
session_start();

require_once './database/conn.php';





// als form login is ingevuld
if (isset($_POST['login']) && $_POST['username'] != "" || $_POST['password'] != "") {
	// dan wil ik checken of het klopt
	$username = $_POST['username'];
	$password = $_POST['password'];
	$sql = "SELECT * FROM `member` WHERE `username`=? AND `password`=? ";
	$query = $conn->prepare($sql);
	$query->execute(array($username, $password));
	$row = $query->rowCount();
	$fetch = $query->fetch();

	// alks het klopt dan wil iets..
	if ($row > 0 &&$username == "SuperAdmin" && $password == "SuperAdmin" ) {
		$_SESSION['user'] = $fetch['mem_id'];
		// als user = superadmin 
		header("Location: /adminplaner2/index.php");
		exit();
			// dan redirect naar special page
			// anders index
			// anders doe ik ....
	} else {
		header("location: index.php");
		echo "
				<script>alert('Invalid username or password')</script>
				<script>window.location = 'index.php'</script>
				";
	}

} else {
	echo "
		<script>alert('Please complete the required field!')</script>
		<script>window.location = 'index.php'</script>
	";
}

if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	// Check if the user is a SuperAdmin
	if ($username == "SuperAdmin" && $password == "SuperAdmin") {
		header("Location: /adminplaner2/index.php");
		exit();
	} else {
		header("Location: index.php");
		exit();
	}
}
?>