<?php
    
    session_start();

    include("include/connection.php");
    
    $user = $_SESSION['user_email'];
    $get_user = "SELECT * FROM users WHERE user_email='$user'"; 
    $run_user = mysqli_query($con,$get_user);
    $row = mysqli_fetch_array($run_user);         
    $user_id = $row['user_id']; 
    $user_name = $row['user_name'];
    $update_msg = mysqli_query($con, "UPDATE users SET log_in='Offline' WHERE user_name='$user_name'");

    session_destroy();
    header("Location:signin.php");
?>