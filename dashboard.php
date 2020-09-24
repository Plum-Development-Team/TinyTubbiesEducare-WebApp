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

	<!-- navbar -->
	<!-- <div id="header">
<nav class="navbar navbar-expand-lg ">
    <div class="container">
      <a class="navbar-brand" href="index.html" >
            <img class="logo" src="Resources/Logo.png" alt="" onclick="scrollto('index')">
          </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="line"></span> 
        <span class="line"></span> 
        <span class="line" style="margin-bottom: 0;"></span>
          </button>
      
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item" onclick="scrollto('services')">
            <strong><a class="nav-link" href="#services">Our Services</a></strong>
          </li>
          <li class="nav-item" onclick="scrollto('contact')">
            <strong><a class="nav-link" href="#contact">Contact Us</a></strong>
          </li>
          <li class="nav-item" onclick="scrollto('about')">
            <strong><a class="nav-link" href="#about">About Us</a></strong>
          </li>
          <li class="nav-item" >
           <strong> <a class="nav-link" href="signin.php" >Login</a></strong>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</div>
<br>
<br>
<br> -->


	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="#">Navbar</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">
				<li class="nav-item active">
					<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Features</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Pricing</a>
				</li>
				<li class="nav-item">
					<a class="nav-link disabled" href="#">Disabled</a>
				</li>
			</ul>
		</div>
	</nav>





	<div class="navbar">
		<div class="logo">
			<a href="dashboard.php"> <img src="Resources/Logo.png" alt=""></a>
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
					<a href="signin.php?logout='1'" style="color: red;">logout</a>
				</p>
			<?php endif ?>
		</div>
	</div>


	<div class="pos">

		<div class="container">
			<div id="st-box">
				<h1> Messages</h1><br>
				<hr>
				<label for="personal" style="font-size:25px;">Personal Messages</label>
				<a href="#" class="pMessages" id="pMessages" data-toggle="dropdown">
					<span class="label label-pill label-danger countP" style="border-radius:20px;"></span>
					<span class="glyphicon glyphicon-envelope" style="font-size:25px;"></span>
				</a> <br> <br>

				<label for="class" style="font-size:25px;">Class Messages</label>
				<a href="#" class="cMessages" id="cMessages" data-toggle="dropdown">
					<span class="label label-pill label-danger countG" style="border-radius:20px;"></span>
					<span class="glyphicon glyphicon-envelope" style="font-size:25px;"></span>
				</a> <br>
			</div>

			<div id="nd-box">
				<h1> Classes</h1><br>
				<hr>

				<!--
					<label for="personal" style="font-size:15px;">Grade</label>
					<a href="#" class="pMessages" id="pMessages" data-toggle="dropdown">
						<span class="label label-pill label-danger count" style="border-radius:20px;"></span>
						<span class="glyphicon glyphicon-envelope" style="font-size:25px;"></span>
					</a> <br>
					-->

				</form>
			</div>
			<div id="rd-box">
				<h1> To-do List</h1><br>
				<hr>

			</div>
		</div>

	</div>
</body>





</html>


<script>
	// Personal notification 
	$(document).ready(function() {
		function pMessages(view_personal = '') {
			$.ajax({
				url: "include/fetch.php",
				method: "POST",
				data: {
					view_personal: view_personal
				},
				dataType: "json",
				success: function(data) {
					$('.dropdown-menu').html(data.notification_personal);
					if (data.unseen_notification_personal > 0) {
						$('.countP').html(data.unseen_notification_personal);
					}
				}
			});
		}

		pMessages();
		$(document).on('click', '.pMessages', function() {
			$('.countP').html('');
			pMessages('yes');
		});

		setInterval(function() {
			pMessages();;
		}, 1000);
	});

	// Class notification

	$(document).ready(function() {
		function cMessages(view_class = '') {
			$.ajax({
				url: "include/fetch.php",
				method: "POST",
				data: {
					view_class: view_class
				},
				dataType: "json",
				success: function(data) {
					$('.dropdown-menu').html(data.notification_group);
					if (data.unseen_notification_group > 0) {
						$('.countG').html(data.unseen_notification_group);
					}
				}
			});
		}

		cMessages();
		$(document).on('click', '.cMessages', function() {
			$('.countG').html('');
			cMessages('yes');
		});

		setInterval(function() {
			cMessages();;
		}, 1000);
	});
</script>