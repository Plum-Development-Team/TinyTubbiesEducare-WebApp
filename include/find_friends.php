<!DOCTYPE html>
<?php
    session_start();
    include("find_friends_function.php");

    // if the user is not logged in send them back to sigin page
    if(!isset($_SESSION['user_email'])){
    
        header("location: signin.php");

    }else{ 
?>
    <html>
        <head>
            <title>Find Teachers/Parents</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
            <link rel="stylesheet" type="text/css" href="../css/find_people.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
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
                        echo"<a class='navbar-brand' href='../chats.php?user_name=$user_name'>MyChat</a>";
                    ?>
                </a>
            </nav><br>

            <div class="row">
                <div class="col-sm-4">
                </div>

                <div class="col-sm-4">
                    <form class="search_form" action="">
                        <input type="text" placeholder="Search Friends" autocomplete="off" name="search_query" required>
                        <button class="btn" type="submit" name="search_btn">Search</button>
                    </form>
                </div>

                <div class="col-sm-4">
                </div>
            </div><br><br>

            <?php 
                search_user();
            ?>
        </body>
    </html>
<?php 
    } 
?>