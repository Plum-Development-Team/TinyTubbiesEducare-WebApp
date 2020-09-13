<?php
    include("include/connection.php");

    // if the submit button is clicked for signup
	if(isset($_POST['sign_up'])){

        $name = htmlentities(mysqli_real_escape_string($con,$_POST['user_name']));
        $pass = htmlentities(mysqli_real_escape_string($con,$_POST['user_pass']));
        $email = htmlentities(mysqli_real_escape_string($con,$_POST['user_email']));
        $country = htmlentities(mysqli_real_escape_string($con,$_POST['user_country']));
        $gender = htmlentities(mysqli_real_escape_string($con,$_POST['user_gender']));
        $rand = rand(1, 2); //Random number between 1 and 2

        if($name == ''){
            echo "<script>alert('We can not verify your name')</script>";
        }

        if(strlen($pass)<8){
            echo "<script>alert('Password should be minimum 8 characters!')</script>";
            exit();
        }

        $check_email = "SELECT * FROM users WHERE user_email='$email'";
        $run_email = mysqli_query($con,$check_email);

        $check = mysqli_num_rows($run_email);

        if($check==1){
            echo "<script>alert('Email already exist, please try another!')</script>";
            echo "<script>window.open('signup.php','_self')</script>";
            exit();
        }

        //giving different profile pictures to random users but here am giving them just the one 
        if($rand == 1)
            $profile_pic = "images/images.png";
        else if($rand == 2)
            $profile_pic = "images/images.png";
        

	    $insert = "INSERT INTO users (user_name,user_pass,user_email,user_profile,user_country,user_gender) VALUES ('$name','$pass','$email','$profile_pic','$country','$gender')";
	    $query = mysqli_query($con,$insert);

        if($query){
            echo "<script>alert('Congratulations $name, your account has been created successfully.')</script>";
            echo "<script>window.open('signin.php','_self')</script>";
        }else{
            echo "<script>alert('Registration failed, try again!')</script>";
            echo "<script>window.open('signup.php','_self')</script>";
        }
    }
?>