<?php

require("../database/classes.php");

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if(isset($_REQUEST['chat'])){
        $group = (new Group)->getById($_REQUEST['chat']);
        echo json_encode($group);
    }

    if(isset($_REQUEST['status'])) {
        echo json_encode(["user_status" => User::status()]);
    }
    
}
