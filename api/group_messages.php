<?php

require("../database/classes.php");

$limit = isset($_REQUEST['limit']) ? $_REQUEST['limit'] : null;
$message = isset($_REQUEST['message']) ? $_REQUEST['message'] : null;

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_REQUEST['chat'])) {
        echo json_encode(get_messages($_REQUEST['chat'], $limit));
    }

    if (isset($_REQUEST['seen'])) {
        echo json_encode(get_notifications($_REQUEST['seen']));
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_REQUEST['chat']) && isset($_REQUEST['sender']) && isset($_REQUEST['message'])) {
        list("chat" => $group,"sender" => $sender, "message" => $message) = $_REQUEST;
        (new GroupMessage)->send($sender, $message, $group);
        echo json_encode(get_messages($group, $limit));
    }

    if (isset($_REQUEST['set-seen']) && isset($_REQUEST['chat']) && isset($_REQUEST['sender'])) {
        echo json_encode(GroupMessage::seen($_REQUEST['chat'], $_REQUEST['sender'], $message));
    }
}

function get_messages($group, $limit)
{
    return ['messages' => (new GroupMessage)->get_messages_for($group, $limit)];
}

function get_notifications($seen)
{
    return ['notifications' => GroupMessage::count($seen)];
}