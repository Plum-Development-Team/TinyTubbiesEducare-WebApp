<?php

require("../database/classes.php");

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if(isset($_REQUEST['get'])){
        $user = (new User)->getById($_REQUEST['get']);
        echo json_encode($user);
    }

    if(isset($_REQUEST['status'])) {
        echo json_encode(["user_status" => User::status()]);
    }
    
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

}



