<!DOCTYPE html>
<?php
session_start();
include("include/connection.php");
?>

<?php

// if the user is not logged in send them back to sigin page
if (!isset($_SESSION['user_email'])) {

    header("location: signin.php");
} else {
?>

    <html>

    <head>
        <title>Account Setting</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/find_people.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    </head>

    <style>
        body {
            overflow-x: hidden;
        }

        form {
            border: 2px solid darkcyan;
            border-radius: 15px;
            padding: 15px;
            color: black;
            background-color: whitesmoke;
        }

        form h2 {
            text-align: center;
        }

        label {
            text-decoration: bold;
            font-size: 20px;
        }

        .fa-user {
            font-size: 20px;
        }

        .fa-fw {
            font-size: 20px;
        }
    </style>

    <body>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <!-- Brand/logo -->
            <a class="navbar-brand" href="#">
                <?php
                $user = $_SESSION['user_email'];
                $get_user = "SELECT * FROM users WHERE user_email='$user'";
                $run_user = mysqli_query($con, $get_user);
                $row = mysqli_fetch_array($run_user);

                $user_name = $row['user_name'];
                echo "<a class='navbar-brand' href='chats.php?user_name=$user_name'>MyChat</a>";
                ?>
            </a>
        </nav><br>


        <div class="row">
            <div class="col-sm-2">
            </div>

            <?php
            $user = $_SESSION['user_email'];
            $get_user = "SELECT * FROM users WHERE user_email='$user'";
            $run_user = mysqli_query($con, $get_user);
            $row = mysqli_fetch_array($run_user);

            $user_name = $row['user_name'];
            $user_pass = $row['user_pass'];
            $user_email = $row['user_email'];
            $user_profile = $row['user_profile'];
            $user_country = $row['user_country'];
            $user_gender = $row['user_gender'];
            ?>

            <div class="col-sm-8">
                <!-- multipart/form-data for when the user wants to change their profile pic -->
                <form action="" method="post" enctype="multipart/form-data">


                    <h2>Edit profile</h2>

                    <label for=""> Username</label>

                    <input class="form-control" type="text" name="u_name" required="required" value="<?php echo $user_name; ?>" />

                    <label for="">Profile Image</label>

                    <!-- when the user wants to change their profile pic upload.php will be called after update button has been clicked -->
                    <a class="btn btn-lg" style="text-decoration: none;font-size: 15px;" href="upload.php">
                        <i class="fa fa-user" aria-hidden="true"></i>

                    </a> <br>

                    <label for="">Email</label>

                    <input class="form-control" type="email" name="u_email" required="required" value="<?php echo $user_email; ?>">

                    <label for="">Campus</label>

                    <select class="form-control" name="u_country">
                        <option><?php echo $user_country; ?></option>
                        <option>Clarmont</option>
                        <option>GrassyPark</option>
                        <option>Mowbray</option>
                        <option>Camps Bay</option>
                        <option>Kenilworth</option>
                    </select>


                    <label for="">Gender</label>

                    <select class="form-control" name="u_gender">
                        <option><?php echo $user_gender; ?></option>
                        <option>Male</option>
                        <option>Female</option>
                        <option>Other</option>
                    </select>

                    <!-- recovery option start -->


                    <label for="">Change Password</label>

                    <a class="btn btn-default" style="text-decoration: none;font-size: 15px;" href="change_password.php">
                        <i class="fa fa-key fa-fw" aria-hidden="true"></i>
                    </a> <br>
                    <input class="btn btn-info" style="width: 250px;" type="submit" name="update" value="Update" />
                </form>

                <?php

                // if the update button is clicked
                if (isset($_POST['update'])) {

                    $user_name = htmlentities($_POST['u_name']);
                    $email = htmlentities($_POST['u_email']);
                    $u_country = htmlentities($_POST['u_country']);
                    $u_gender = htmlentities($_POST['u_gender']);

                    $update = "UPDATE users SET user_name='$user_name',user_email='$email',user_country='$u_country',user_gender='$u_gender' WHERE user_email='$user'";
                    $run = mysqli_query($con, $update);

                    if ($run) {
                        echo "<script>window.open('account_settings.php','_self')</script>";
                    }
                }
                ?>
            </div>

            <div class="col-sm-2">
            </div>
        </div>
    </body>

    </html>
    <script>
        function show_password() {
            var x = document.getElementById("mypass");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
<?php } ?>