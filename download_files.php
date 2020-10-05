<!DOCTYPE html>
<html lang="en">
<?php
require("database/classes.php");
include("include/functions.php");
session_start();

if (isset($_SESSION['user'])) :
    $user = $_SESSION['user'];
    $receiver = isset($_REQUEST['receiver']) ? (new User)->getById((int)$_REQUEST['receiver']) : null;
    $chat_user = $receiver ?: $user;
?>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/upload_files.css">

        <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
        <title>Upload Files</title>
    </head>

    <body>
        <div>
            <a href="home.php">
                <button class="btn btn-default search-icon" name="search_user" type="submit">
                    <span class="fa fa-home font-weight-bold"></span>
                    Home
                </button>
            </a>
            <a href="contact.php">
                <button class="btn btn-default search-icon" name="search_user" type="submit">
                    <span class="glyphicon glyphicon-plus font-weight-bold"></span>
                    Contacts
                </button>
            </a>
            <a href="profile.php">
                <button class="btn btn-default search-icon" name="search_user" type="submit">
                    <span class="glyphicon glyphicon-plus font-weight-bold"></span>
                    Profile
                </button>
            </a>
            <a href="upload_files.php">
                <button class="btn btn-default search-icon" name="search_user" type="submit">
                    <span class="glyphicon glyphicon-plus font-weight-bold"></span>
                    Upload Files
                </button>
            </a>
        </div>
        <div class="container">
            <div class="container-fluid">

                <?php
                    displayFiles();
                ?>

            </div>
        </div>

        <?php

        ?>

    </body>

</html>
<?php else : header("location: signin.php"); ?>
<?php endif ?>