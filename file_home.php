<?php
session_start();

if (!isset($_SESSION['username'])) {
	$_SESSION['msg'] = "You must log in first";
	header('location: sign-in.php');
}

/*if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['username']);
	header("location: sign-in.php");
}
*/
?>
<!DOCTYPE html>
<html>

<head>
	<title>Home</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="styles/styleYola.css?v=<?php echo time(); ?>">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>






</head>

<body>

	<header>
		<div class="navbar">
			<div class="logo">
				<a href="">Tubbies</a>
			</div>
			<div class="user-profile">
				<!-- logged in user information -->
				<?php if (isset($_SESSION['username'])) : ?>
					<p>
						<a href="">
							<strong><?php echo $_SESSION['username']; ?></strong>
							<!--Need to change image to profile pic of account-->
							<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3364143/download+%281%29.png" alt="profile pic" style="width:42px;height:42px;">
						</a>
						<a href="index.php?logout='1'" style="color: red;">logout</a>
					</p>
				<?php endif ?>
			</div>
		</div>
	</header>


</body>

</html>