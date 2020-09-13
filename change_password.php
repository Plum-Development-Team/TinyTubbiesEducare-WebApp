<!DOCTYPE html>
<?php
    session_start();
    include("include/connection.php");
?>
<?php
    if(!isset($_SESSION['user_email'])){ 
        header("location: signin.php");
    }else{ 
?>
    <html>
        <head>
            <title>Account Setting</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        </head>

        <style>
            body{
                overflow-x: hidden;
            }
            form{
                border:2px solid darkcyan;
                border-radius:15px;
                padding:15px;

            }
            label{
                text-decoration:bold;
                font-size:18px;
            }
        </style>

        <body>
            <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
                <!-- Brand/logo -->
                <a class="navbar-brand" href="#">
                    <?php 
                        $user = $_SESSION['user_email'];
                        $get_user = "SELECT * FROM users WHERE user_email='$user'"; 
                        $run_user = mysqli_query($con,$get_user);
                        $row=mysqli_fetch_array($run_user);
                                
                        $user_name = $row['user_name'];
                        echo"<a class='navbar-brand' href='home.php?user_name=$user_name'>MyChat</a>";
                    ?>
                </a>
                <ul class="navbar-nav">
                    <li>
                        <a style="color: white; text-decoration: none;font-size: 20px;" href="account_settings.php">Profile</a>
                    </li>
                </ul>
            </nav><br>

            <div class="row">
                <div class="col-sm-2">
                </div>

                <?php 
                    $user = $_SESSION['user_email'];
                    $get_user = "SELECT * FROM users WHERE user_email='$user'"; 
                    $run_user = mysqli_query($con,$get_user);
                    $row=mysqli_fetch_array($run_user);
                            
                    $user_pass = $row['user_pass'];
                ?>

                <div class="col-sm-8">
                    <form action="" method="post" enctype="multipart/form-data">
                        
                           <h2>Change Password</h2>
                            <label> Current Password </label>
                                
                                    <input class="form-control" type="password" name="current_pass" id="mypass" required="required" placeholder="Current Password" />
                               
                           

                           <label> New Password</label>
                               
                               
                                    <input class="form-control" type="password" name="u_pass1" id="mypass" required="required" placeholder="New Password" />
                              
                            <label> 
                            Confirm Password </label>
                               
                                    <input class="form-control" type="password" name="u_pass2" id="mypass" required="required" placeholder="Confirm Password" />
                             <br>
                           
                                    <input class="btn btn-info" style="width: 250px;" type="submit" name="change" value="Change"/>
                           
                    </form>

                    <?php
                        if(isset($_POST['change'])){
                            $c_pass = $_POST['current_pass'];
                            $pass1 = $_POST['u_pass1'];
                            $pass2 = $_POST['u_pass2'];

                            $user = $_SESSION['user_email'];
                            $get_pass = "SELECT * FROM users WHERE user_email='$user'";
                            $run_pass = mysqli_query($con,$get_pass);
                            $row=mysqli_fetch_array($run_pass);
                                    
                            $user_password = $row['user_pass'];

                            if($c_pass !== $user_password){
                                echo"
                                    <div class='alert alert-danger'>
                                        <strong>Your old password didn't match </strong> 
                                    </div>
                                ";
                            }

                            if($pass1 != $pass2){
                                echo"
                                    <div class='alert alert-danger'>
                                        <strong>Your new password did't match with each other</strong> 
                                    </div>
                                ";
                            }
                            if($pass1 < 9 AND $pass2 < 9){
                                echo"
                                    <div class='alert alert-danger'>
                                        <strong>Use 9 or more than 9 characters</strong> 
                                    </div>
                                ";
                            }

                            if($pass1 == $pass2 AND $c_pass == $user_password){
                                $update_pass = mysqli_query($con, "UPDATE users SET user_pass='$pass1' WHERE user_email='$user'");
                                echo"
                                    <div class='alert alert-danger'>
                                        <strong>Your Password has been updated</strong> 
                                    </div>
                                ";
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
    </script>
<?php } ?>