<!DOCTYPE html>
<?php
require("database/classes.php");
session_start();

if (isset($_SESSION['user'])) :
    $user = $_SESSION['user'];
    $group = isset($_REQUEST['receiver']) ? (new Group)->getById((int)$_REQUEST['receiver']) : (new Group)->getAll()[0];

?>
    <html lang="en">

    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/home.css">


        <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
        <title>Home</title>
    </head>

    <script>
        const user = JSON.parse(`<?= json_encode($user) ?>`)
        let group = JSON.parse(`<?= json_encode($group) ?>`)
    </script>

    <body>
        <div class="container-fluid main-section">
            <div class="row">

                <div class="col-md-3 col-sm-3 col-xs-12 left-sidebar">
                    <div class="input-group searchbox">
                        <div class="input-group-btn">
                            <center>
                                <table>
                                    <tr>
                                        <td>
                                            <a href="contact.php">
                                                <button class="btn btn-default search-icon" name="search_user" type="submit">
                                                    <span class="glyphicon glyphicon-plus font-weight-bold"></span>
                                                    Contacts
                                                </button>
                                            </a>
                                        </td>

                                        <td>
                                            <a href="logout.php">
                                                <button name="logout" class="btn btn-danger search-icon">
                                                    <span class="glyphicon glyphicon-log-out"></span>
                                                    Logout
                                                </button>
                                            </a>
                                        </td>

                                        <td>
                                            <a href="home.php">
                                                <button class="btn btn-default search-icon" name="search_user" type="submit">
                                                    <span class="fa fa-user" aria-hidden="true"></span>
                                                    Home
                                                </button>
                                            </a>
                                        </td>

                                        <td>
                                            <a href="profile.php">
                                                <button class="btn btn-default search-icon" name="search_user" type="submit">
                                                    <span class="fa fa-user" aria-hidden="true"></span>
                                                    <?= $user->fullname; ?>
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                </table>
                            </center>
                        </div>
                    </div>

                    <div class="left-chat">
                        <ul>
                            <?php
                            include("include/get_group_data.php");
                            ?>
                        </ul>
                    </div>
                </div>

                <div class="col-md-9 col-sm-9 col-xs-12 right-sidebar">
                    <div class="row">
                        <div id="chat-profile" class="col-md-12 right-header">
                            <div class="right-header-img">
                                <img src="<?= $group->profile_pic ?>" alt="<?= $group->profile_pic ?>">
                            </div>
                            <div class="right-header-detail">
                                <div>
                                    <p><?= $group->group_type ?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div id="scrolling_to_bottom" class="col-md-12 right-header-contentChat">
                            <ul id="messages"></ul>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 right-chat-textbox">
                            <!-- writing you messages here -->
                            <form id="message-form">
                                <label for="message-input"></label>
                                <input id="message-input" autocomplete="off" type="text" name="message" data-receiver="<?= $group->id ?>" data-sender="<?= $user->id ?>" placeholder="Write your message...">
                                <button class="btn" name="submit"><i class="fa fa-telegram" aria-hidden="true"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="public/js/appGroup.js"></script>
        <script type="text/javascript">
            // //getting the messages that the sender sends and setting the scroll to scroll down when the page reloads
            // function getMessages(scroll = false, tryAgain = true) {
            //     const data = $('#message-data').data()
            //     $.post(`messages.php?chat=${data.chat}&sender=${data.sender}`, function(response, status, xhr) {
            //         $("#messages").html(response)
            //         if (scroll) {
            //             $('#scrolling_to_bottom').animate({
            //                 scrollTop: $('#scrolling_to_bottom').get(0).scrollHeight
            //             }, 1000)
            //         }
            //     });
            //     // tryagain recursive getting the messages
            //     if(tryAgain) setTimeout(() => getMessages(false), 10000)
            // }
            //
            // //for is submitted and the
            // $('#message-form').submit(function(event) {
            //     event.preventDefault();
            //     const data = $('#message-data').data()
            //     const message = $('#message-input').val();
            //     $('#message-input').val("")
            //     $.post(`messages.php?chat=${data.chat}&action=send&message=${message}&sender=${data.sender}`, function(response, status, xhr) {
            //         $("#messages").html(response)
            //     });
            // });
            //
            // $(document).ready(function() {
            //     var height = $(window).height();
            //     $('.left-chat').css('height', (height - 92) + 'px');
            //     $('.right-header-contentChat').css('height', (height - 163) + 'px');
            //
            //     getMessages(true)
            // });

            // $('#scrolling_to_bottom').animate({
            //     scrollTop: $('#scrolling_to_bottom').get(0).scrollHeight
            // }, 1000);
            // $(document).ready(function() {
            //     var height = $(window).height();
            //     $('.left-chat').css('height', (height - 92) + 'px');
            //     $('.right-header-contentChat').css('height', (height - 163) + 'px');
            // });
        </script>
    </body>

    </html>
<?php else : header("location: signin.php"); ?>
<?php endif ?>