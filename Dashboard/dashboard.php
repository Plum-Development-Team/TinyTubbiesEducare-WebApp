<?php
session_start();

if (!isset($_SESSION['username'])) {
	$_SESSION['msg'] = "You must log in first";
	header('location: sign-in.php');
}

/*if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['username']);
	header("location: sign-in.php");
}
*/
?>
<!DOCTYPE html>
<html>

<head>


    <title>Dashboard</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- tailwindcss  -->
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="assets/css/todos.css">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,500' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.css">
    <script type="text/javascript" src="assets/js/lib/jquery-2.1.4.min.js"></script>


    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>


</head>

<style>
    body {
        padding: 25px;
    }

    #brand-logo {
        width: 110px;
        height: 50%;
    }


    .row {
        display: flex;
        flex-wrap: wrap;
        padding: 0 4px;
    }

    /* Create four equal columns that sits next to each other */
    .column {
        flex: 25%;
        max-width: 25%;
        padding: 0 4px;
    }

    .column img {
        margin-top: 8px;
        vertical-align: middle;
    }


    /* Responsive layout - makes a two column-layout instead of four columns */
    @media (max-width: 1120px) {
        .column {
            flex: 50%;
            max-width: 50%;
            vertical-align: center;
        }
    }

    /* Responsive layout - makes a two column-layout instead of four columns */
    @media (max-width: 800px) {
        .column {
            flex: 50%;
            max-width: 50%;
            vertical-align: center;
        }
    }

    /* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
    @media (max-width: 700px) {
        .column {
            flex: 100%;
            max-width: 100%;
            vertical-align: center;
            margin-left: 15%;
            padding-top: 10px;
        }
    }

    /* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
    @media (max-width: 600px) {
        .column {
            flex: 100%;
            max-width: 100%;
            vertical-align: center;
            margin-left: 15%;
            padding-top: 10px;
        }
    }
</style>
</head>

<body>

    <!-- navbar with tailwindcss -->
    <header>
        <nav class="bg-white shadow">
            <div class="container mx-auto px-6 py-3 ">
                <div class="md:flex md:items-center md:justify-between">
                    <div class="flex justify-between items-center">
                        <div class="text-xl font-semibold text-gray-700">
                            <a href="#" class="text-gray-800 text-xl font-bold hover:text-gray-700 md:text-2xl"><img
                                    id="brand-logo" src="../Resources/Logo.png" alt=""></a>
                        </div>

                        <!-- Mobile menu button -->
                        <div class="flex md:hidden" onclick="toggle()">
                            <button type="button"
                                class="text-gray-500 hover:text-gray-600 focus:outline-none focus:text-gray-600"
                                aria-label="toggle menu">
                                <svg viewBox="0 0 24 24" class="h-6 w-6 fill-current">
                                    <path fill-rule="evenodd"
                                        d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
                    <div class="hidden -mx-4 md:flex md:items-center" id="menu">
                        <a href="../help page/help.php" target="blank"
                            class="block mx-4 mt-2 md:mt-0 text-sm text-gray-700 capitalize hover:text-blue-600">Help?
                        </a>

                        <div class="user-profile">
                            <!-- logged in user information -->
                            <?php if (isset($_SESSION['username'])) : ?>
                            <p>
                                <a href="../account_settings.php">
                                    <strong><?php echo $_SESSION['username']; ?></strong>
                                    <!--Need to change image to profile pic of account-->
                                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3364143/download+%281%29.png"
                                        alt="profile pic" style="width:42px;height:42px;">
                                </a>
                                <a href="../signin.php?logout='1'" style="color: red;">logout</a>
                            </p>
                            <?php endif ?>
                        </div>



                    </div>
                </div>
            </div>
        </nav>

        <div class="w-full bg-cover bg-center"
            style="height:32rem; background-image: url(https://images.unsplash.com/photo-1504384308090-c894fdcc538d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80);">
            <div class="flex items-center justify-center h-full w-full bg-gray-900 bg-opacity-50">
                <div class="text-center">
                    <h1 class="text-white text-2xl font-semibold uppercase md:text-3xl">Let's Communicate <span
                            class="underline text-blue-400">Saas</span></h1>
                    <button
                        class="mt-4 px-4 py-2 bg-blue-600 text-white text-sm uppercase font-medium rounded hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                        <a href="../chats.php"><img
                            class="w-10" src="https://www.flaticon.com/svg/static/icons/svg/3214/3214931.svg"
                            alt=""></a>
                    </button>
                </div>
            </div>
        </div>
    </header>
    <!-- normal content of the web page -->

    <div id="container" style="margin: auto 0;">
        <div class="row">
            <div class="column">
                <div class="max-w-xs rounded overflow-hidden shadow-lg my-2">
                    <img class="w-20 mb-2 " style="display: block; margin-left: auto; margin-right: auto;"
                        src="https://www.flaticon.com/svg/static/icons/svg/546/546394.svg"
                        alt="Sunset in the mountains">
                    <hr class="bg-gray-100" style="border-top: 3px double gray;">
                    <div class="px-6 py-4">
                        <h3 class="font-bold text-xl mb-2">Messages</h3>
                        <div class=" list-disc text-grey-darker text-base">
                            <li><a href=""> Personal Message</a></li>
                            <li><a href="">Group Message</a> </li>
                        </div>
                    </div>
                    <!-- <div class="px-6 py-4">
                        <span
                            class="inline-block bg-grey-lighter rounded-full px-3 py-1 text-sm font-semibold text-grey-darker mr-2">#photography</span>
                        <span
                            class="inline-block bg-grey-lighter rounded-full px-3 py-1 text-sm font-semibold text-grey-darker mr-2">#travel</span>
                        <span
                            class="inline-block bg-grey-lighter rounded-full px-3 py-1 text-sm font-semibold text-grey-darker">#winter</span>
                    </div> -->
                </div>
            </div>

            <div class="column">
                <div class="max-w-xs rounded overflow-hidden shadow-lg my-2">
                    <img class="w-20 mb-2" style="display: block; margin-left: auto; margin-right: auto;"
                        src="https://www.flaticon.com/svg/static/icons/svg/991/991922.svg"
                        alt="Sunset in the mountains">
                    <hr class="bg-gray-100" style=" border-top: 3px double gray;">
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-2">Classes</div>
                        <div class="list-disc text-grey-darker text-base">
                            <li><a href="">Grade R</a></li>
                            <li><a href="">Grade 12</a></li>
                        </div>
                    </div>
                    <!-- <div class="px-6 py-4">
                        <span
                            class="inline-block bg-grey-lighter rounded-full px-3 py-1 text-sm font-semibold text-grey-darker mr-2">#photography</span>
                        <span
                            class="inline-block bg-grey-lighter rounded-full px-3 py-1 text-sm font-semibold text-grey-darker mr-2">#travel</span>
                        <span
                            class="inline-block bg-grey-lighter rounded-full px-3 py-1 text-sm font-semibold text-grey-darker">#winter</span>
                    </div> -->
                </div>
            </div>

            <div class="column">
                <div class="max-w-xs rounded overflow-hidden shadow-lg my-2">
                    <img class="w-20 mb-2" style="display: block; margin-left: auto; margin-right: auto;"
                        src="https://www.flaticon.com/svg/static/icons/svg/1831/1831998.svg"
                        alt="Sunset in the mountains">
                    <hr class="bg-gray-100" style=" border-top: 3px double gray;">
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-2">Repository</div>
                        <div class="list-disc text-grey-darker text-base">
                            <li><a href="">Dropbox</a></li>
                            <li><a href="">Google Drive</a></li>
                        </div>
                    </div>
                    <!-- <div class="px-6 py-4">
                        <span
                            class="inline-block bg-grey-lighter rounded-full px-3 py-1 text-sm font-semibold text-grey-darker mr-2">#photography</span>
                        <span
                            class="inline-block bg-grey-lighter rounded-full px-3 py-1 text-sm font-semibold text-grey-darker mr-2">#travel</span>
                        <span
                            class="inline-block bg-grey-lighter rounded-full px-3 py-1 text-sm font-semibold text-grey-darker">#winter</span>
                    </div> -->
                </div>
            </div>

            <div class="column" style="float: right;">
                <h1>To-Do List <i class="fa fa-plus"></i></h1>
                <input type="text" placeholder="Add New Todo">

                <ul>
                    <li><span><i class="fa fa-trash"></i></span> Go To Potions Class</li>
                    <li><span><i class="fa fa-trash"></i></span> Buy New Robes</li>
                    <li><span><i class="fa fa-trash"></i></span> Visit Hagrid</li>
                </ul>
            </div>

        </div>
        <footer class="w-full text-center border-t border-grey p-4 pin-b mt-20" style="color: rgb(45, 107, 136);">@2020
            Reserved Tiny Tubbies Educare
        </footer>
    </div>
    <script type="text/javascript" src="assets/js/todos.js"></script>

    <script>
        const menu = document.getElementById('menu');
        const toggle = () => menu.classList.toggle("hidden");
    </script>
</body>

</html>
<script>
    // Personal notification 
    $(document).ready(function () {
        function pMessages(view_personal = '') {
            $.ajax({
                url: "include/fetch.php"
                method: "POST",
                data: {
                    view_personal: view_personal
                },
                dataType: "json",
                success: function (data) {
                    $('.dropdown-menu').html(data.notification_personal);
                    if (data.unseen_notification_personal > 0) {
                        $('.countP').html(data.unseen_notification_personal);
                    }
                }
            });
        }

        pMessages();
        $(document).on('click', '.pMessages', function () {
            $('.countP').html('');
            pMessages('yes');
        });

        setInterval(function () {
            pMessages();;
        }, 1000);
    });

    // Class notification

    $(document).ready(function () {
        function cMessages(view_class = '') {
            $.ajax({
                url: "include/fetch.php",
                method: "POST",
                data: {
                    view_class: view_class
                },
                dataType: "json",
                success: function (data) {
                    $('.dropdown-menu').html(data.notification_group);
                    if (data.unseen_notification_group > 0) {
                        $('.countG').html(data.unseen_notification_group);
                    }
                }
            });
        }

        cMessages();
        $(document).on('click', '.cMessages', function () {
            $('.countG').html('');
            cMessages('yes');
        });

        setInterval(function () {
            cMessages();;
        }, 1000);
    });
</script>