<?php

require("../database/classes.php");

$seen = isset($_REQUEST['seen']) ? $_REQUEST['seen'] : null;
$limit = isset($_REQUEST['limit']) ? $_REQUEST['limit'] : null;
$order = isset($_REQUEST['order']) ? $_REQUEST['order'] : 'DESC';
$message = isset($_REQUEST['message']) ? $_REQUEST['message'] : null;

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_REQUEST['sender']) && isset($_REQUEST['receiver'])) {
        list("sender" => $sender, "receiver" => $receiver) = $_REQUEST;
        echo json_encode(get_messages($sender, $receiver, $order, $limit));
    }

    if (isset($seen) && isset($_REQUEST['sender'])) {
        echo json_encode(get_notifications($_REQUEST['sender'], $seen));
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_REQUEST['sender']) && isset($_REQUEST['receiver']) && isset($_REQUEST['message'])) {
        list("sender" => $sender, "receiver" => $receiver, "message" => $message) = $_REQUEST;
        $result = (new Message)->send($message, $sender, $receiver);
        echo json_encode(get_messages($sender, $receiver, $order, $limit));
    }

    if (isset($_REQUEST['set-seen']) && isset($_REQUEST['reader']) && isset($_REQUEST['sender'])) {
        echo json_encode(Message::seen($_REQUEST['reader'], $_REQUEST['sender'], $message));
    }
}

function get_messages($sender, $receiver, $order, $limit)
{
    return ['messages' => (new Message)->messages($sender, $receiver, $order, $limit)];
}

function get_notifications($reader, $seen)
{
    return ['notifications' => Message::notifications($reader, $seen)];
}