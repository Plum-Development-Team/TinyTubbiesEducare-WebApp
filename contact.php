<?php
    require("database/classes.php");
    include("include/functions.php");
    session_start();

    if (isset($_SESSION['user'])) :
        $user = $_SESSION['user'];
        $receiver = isset($_REQUEST['receiver']) ? (new User)->getById((int)$_REQUEST['receiver']) : null;
        $chat_user = $receiver ?: $user;
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/contact.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"
            integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
        <title>Contacts</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-offset-3 col-sm-6">
                    <div class="panel panel-default">
                        <div class="panel-heading c-list">
                            <span class="title">Contacts</span>
                            <ul class="pull-right c-controls">
                                <form class="search_form" action="">
                                    <input type="text" placeholder="Search" title="Search Parents or Teachers or a Campus" autocomplete="off" name="search_query">
                                    <button class="btn" type="submit" name="search_btn"><i class="fa fa-search"></i></button>
                                </form>             
                            </ul>
                        </div>
                        <ul class="list-group" id="contact-list">
                            <?php  
                                searchContact(); 
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<?php else : header("location: signin.php"); ?>
<?php endif ?>