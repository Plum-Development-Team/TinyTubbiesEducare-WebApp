
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
            <title>Change Profile</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
            <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" type="text/css" href="css/upload.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
            <style>

            .profile{
                width:50%;
                height:100%;
                text-align:center;
                item-position:center;
            }
            
             </style>

        </head>


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
                        echo"<a class='navbar-brand' href='chats.php?user_name=$user_name'>MyChat</a>";
                    ?>
                </a>
                <ul class="navbar-nav">
                    <li>
                        <a style="color: white; text-decoration: none;font-size: 20px;" href="account_settings.php">Profile</a>
                    </li>
                </ul>
            </nav><br>

            <?php
                $user = $_SESSION['user_email'];
                $get_user = "SELECT * FROM users WHERE user_email='$user'"; 
                $run_user = mysqli_query($con,$get_user);
                $row=mysqli_fetch_array($run_user);
                        
                $user_name = $row['user_name'];
                $user_profile = $row['user_profile'];

                echo"
                    <div class='card'>
                        <img class='profile' src='$user_profile'>
                        <h3>$user_name</h3>
                        <form method='post' enctype='multipart/form-data'>
                            <label id='update_profile'><i class='fa fa-user-circle-o' aria-hidden='true'></i> Select Profile
                            <input type='file' name='u_image' size='60' />
                            </label>
                            <button id='button_profile' name='update'>&nbsp &nbsp &nbsp<i class='fa fa-heart' aria-hidden='true'></i> Update Profile</button>
                        </form>
                    </div><br><br>
                ";
            ?>

            <?php 
                //if the button update profile is clicked 
                if(isset($_POST['update'])){
                    
                    //$_FILES = image name and the name of the image the user selects
                    $u_image = $_FILES['u_image']['name'];
                    $image_tmp = $_FILES['u_image']['tmp_name'];
                    $random_number = rand(1,100);

                    // if user does not selct image
                    if($u_image==''){
                        echo "<script>alert('Please Select Profile')</script>";
                        echo "<script>window.open('upload.php','_self')</script>";
                        exit();
                    }else{
                        
                        move_uploaded_file($image_tmp,"images/$u_image.$random_number");

                        $update = "UPDATE users SET user_profile='images/$u_image.$random_number' WHERE user_email='$user'";
                        $run = mysqli_query($con,$update); 
                        
                        if($run){
                        
                            echo "<script>alert('Your Profile Updated!')</script>";
                            echo "<script>window.open('upload.php','_self')</script>";
                        }
                    }
                
                }
            ?>
        </body>
    </html>
<?php 
    } 
?>