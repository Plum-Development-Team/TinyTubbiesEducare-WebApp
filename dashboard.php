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

	<div class="pos">
		<center>
			<div class="container">
				<div id="st-box">
					<h1> Messages</h1><br>
					<hr>
					<label for="personal" style="font-size:25px;">Personal Messages</label>
					<a href="chats.php?user_name=<?php echo $_SESSION['username']?>" class="pMessages" id="pMessages" data-toggle="dropdown">
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
		</center>
	</div>
</body>





</html>


<script >
	// Personal notification 
	$(document).ready(function() {
        function pMessages(view_personal = '') {
            $.ajax({
                url: "include/fetch.php"
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