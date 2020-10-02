<?php

include("include/connection.php");
$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : "";

switch ($action) {
    case 'send':

        list("message" => $message, "sender" => $sender, "chat" => $chat) = $_REQUEST;

        //inserting a new message into the database
        $new_message_query = "INSERT INTO users_chat (chat, sender, msg_content, msg_status, msg_date) VALUES ($chat, $sender, '$message', 'unread', NOW());";
        mysqli_query($con, $new_message_query);
        break;
}

if (isset($_REQUEST['chat'])) {
    list("chat" => $id, "sender" => $current_user) = $_REQUEST;

    $users = array();
    $message_html = "";

    //getting a chat between users 
    $query_chat_id = "SELECT sender, receiver FROM chat WHERE id = $id";
    $result = mysqli_query($con, $query_chat_id);
    $chat_ids = mysqli_fetch_assoc($result);

    foreach ($chat_ids as $user_type => $key) {
        $get_user = mysqli_query($con, "SELECT * FROM users WHERE user_id = '$key'");
        $user = mysqli_fetch_array($get_user);
        $users[$user_type] = $user;
    }

    list("sender" => $sender, "receiver" => $receiver) = $users;

    //getting the messages from the database
    $query_chat_messages = "SELECT msg_id, msg_date, msg_content, msg_status, chat, sender FROM users_chat WHERE chat = $id ORDER by 1 ASC";
    $get_messages = mysqli_query($con, $query_chat_messages);
    $messages = mysqli_fetch_all($get_messages, MYSQLI_ASSOC);

    //deleting a message from the database 
    $delete_message_query = "DELETE FROM users_chat WHERE msg_id = 126";

    foreach ($messages as $message) {
        $is_viewer = $sender['user_id'] === $message['sender'];
        $message['position'] = $current_user === $message['sender'] ? 'right' : 'left';
        $message['sender'] = $is_viewer ? $sender['user_name'] : $receiver['user_name'];

        $message_html .= <<<html
            <li>
                <div class='right-side-{$message['position']}-chat'>
                    <p>
                        <span>{$message['sender']}</span>
                        <span>
                            <small>{$message['msg_date']}</small>
                        </span>
                    </p>
                    <p>{$message['msg_content']}</p>
                </div>
            </li>
        html;
    }

    echo $message_html;
}
