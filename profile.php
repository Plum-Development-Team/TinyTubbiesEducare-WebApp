<?php
require("database/classes.php");
include("include/functions.php");
session_start();

if (isset($_SESSION['user'])) :
    $user = $_SESSION['user'];
    // var_dump($user);
    // $receiver = isset($_REQUEST['receiver']) ? (new User)->getById((int)$_REQUEST['receiver']) : null;
    // $chat_user = $receiver ?: $user;
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profile</title>
    </head>

    <body>
        <div class="container">
            <div class="view-account">
                <section class="module">
                    <div class="module-inner">
                        <div class="content-panel">
                            <h3 class="fieldset-title">Personal Info</h3>

                            <form class="form-horizontal" method="post" enctype="multipart/form-data">
                                <fieldset class="fieldset"> 
                                    <h3 class="fieldset-title">Change Profile Picture</h3>
                                    <div class="form-group avatar">
                                        <figure class="figure col-md-2 col-sm-3 col-xs-12">
                                            <img class="img-rounded img-responsive" src="<?= $user->profile_pic; ?>" alt="<?= $user->profile_pic; ?>">
                                        </figure>
                                        <!-- upload files -->
                                        <div class="form-inline col-md-10 col-sm-9 col-xs-12">
                                            <label id='update_profile'>
                                                Select Profile
                                                <input type="file" class="upload-input" name="uploadedFile" />
                                            </label>
                                            <input type="submit" name="uploadBtn" class="btn" value="Upload" />
                                        </div>
                                        <br>
                                    </div>
                                    <hr>
                                </fieldset>
                            </form>

                            <form class="form-horizontal" method="post" enctype="multipart/form-data">
                                <fieldset class="fieldset"> 
                                    <div class="form-group">
                                        <br>
                                        <label class="col-md-2 col-sm-3 col-xs-12 control-label">Fullname</label>
                                        <div class="col-md-10 col-sm-9 col-xs-12">
                                            <input type="text" class="form-control" name="fullname" value="new username">
                                            <!-- <input type="text" class="form-control" name="fullname" value=" //$user->fullname; "> -->
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2  col-sm-3 col-xs-12 control-label">Email</label>
                                        <div class="col-md-10 col-sm-9 col-xs-12">
                                            <input type="email" class="form-control" name="email" value="new email">
                                            <!-- <input type="email" class="form-control" name="email" value="//$user->email; "> -->
                                        </div>
                                    </div>
                                </fieldset>
                                <hr>
                                <div class="form-group">
                                    <div class="col-md-10 col-sm-9 col-xs-12 col-md-push-2 col-sm-push-3 col-xs-push-0">
                                        <input class="btn btn-primary" type="submit" name="update_user_profile" value="Update Profile">
                                    </div>
                                    <div class="col-md-10 col-sm-9 col-xs-12 col-md-push-2 col-sm-push-3 col-xs-push-0">
                                        <a href="contact.php">Chat to someone</a>
                                    </div>
                                </div>
                            </form>

                            <?php
                                updateUserProfile();

                                updateProfilePicture();

                            ?>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </body>

    </html>

<?php else : header("location: signin.php"); ?>
<?php endif ?>