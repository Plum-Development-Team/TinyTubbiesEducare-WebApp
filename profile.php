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
                                            <!-- <input type="file" class="file-uploader pull-left"name="file" id="file">
                                                <button type="submit" name="submit_file" id="submit_file" class="btn btn-sm btn-default-alt pull-left">Update Image</button> -->
                                            <label id='update_profile'>
                                                Select Profile
                                                <input type='file' name='u_image' size='60' />
                                            </label>
                                            <button id='button_profile' name='update'>Update Profile</button>
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

                            if (isset($_POST['update_user_profile'])) {
                                list("fullname" => $fullname, "email" => $email) = $_POST;

                                $users = User::query("UPDATE user SET email='$email', fullname='$fullname' WHERE id='$user->id'", "User");
                                echo "<script> alert('Your details have been updated!!!')</script>";
                                header("profile.php");
                            }


                            if (isset($_POST["submit_file"])) {

                                $u_image = $_FILES['u_image']['name'];
                                $image_tmp = $_FILES['u_image']['tmp_name'];
                                $random_number = rand(1,100);

                                // if user does not selct image
                                if($u_image==''){
                                    echo "<script>alert('Please Select Profile')</script>";
                                    echo "<script>window.open('profile.php','_self')</script>";
                                    exit();
                                }else{
                                    
                                    move_uploaded_file($image_tmp,"images/$u_image.$random_number");
                                    $update_profile_query = User::query("UPDATE user SET profile_pic = '$myfiles' WHERE id='$user->id'", "User");
                                    echo "<script> window.open('Your profile picture has been updated!!!','_self')</script>";
                                    header("profile.php");
                                }
                            }

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