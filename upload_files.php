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
        <link rel="stylesheet" href="css/upload_files.css">
        <title>Upload Files</title>
    </head>

    <body>
        <div class="frame">
            <div class="center">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="title">
                        <h1>Drop file to upload</h1>
                    </div>

                    <div class="dropzone">
                        <img src="http://100dayscss.com/codepen/upload.svg" class="upload-icon" />
                        <input type="file" class="upload-input" name="uploadedFile" />
                    </div>

                    <input type="submit" name="uploadBtn" class="btn" value="Upload" />
                    <!-- <button type="button" class="btn" name="uploadBtn">Upload file</button> -->
                </form>
            </div>
        </div>

        <div style="text-align: center;">
            <p><strong>Note:</strong> Only .jpg, .gif, .png, .zip, .txt, .xls, .doc, .pdf, .docx formats allowed to a max size of 5 MB.</p>
        </div>
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
            <a href="download_files.php">
                <button class="btn btn-default search-icon" name="search_user" type="submit">
                    <span class="glyphicon glyphicon-plus font-weight-bold"></span>
                    Download Files
                </button>
            </a>
        </div>
        <?php
            uploadFiles();
        ?>
    </body>

</html>
<?php else : header("location: signin.php"); ?>
<?php endif ?>