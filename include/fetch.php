<?php
//connect.php;
session_start();
$connect = mysqli_connect("localhost", "root", "", "tinytubbieseducare");

//personal messages;
if (isset($_POST["view_personal"])) {

    
    //needs to be done when chat is opened
    /*if ($_POST["view_personal"] != '') {
        $update_query = "UPDATE messages SET message_status='read' WHERE message_status='unread'";
        mysqli_query($connect, $update_query);
    }
    */
    $query = "SELECT * FROM users_chat ORDER BY msg_id DESC LIMIT 5";
    $result = mysqli_query($connect, $query);
    $output = '';
    /*
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $output .= '
            <li>
                <a href="#">
                <strong>' . $row["comment_subject"] . '</strong><br />
                <small><em>' . $row["comment_text"] . '</em></small>
                </a>
            </li>
            <li class="divider"></li>
            ';
            }
    } else {
        $output .= '<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
    }
    */
    $user = $_SESSION['username'];
    $sql = "CALL unreadMessages($user)";
    
    //$query_1 = "SELECT * FROM users_chat WHERE receiver_username= '$user' AND msg_status='unread'";
    $result_1 = mysqli_query($connect,$sql );
    $count = mysqli_num_rows($result_1);
    $data = array(
        'notification_personal'   => $output,
        'unseen_notification_personal' => $count
    );
    echo json_encode($data);
}
/* Classes messages 
if (isset($_POST["view_class"])) {

    if ($_POST["view_class"] != '') {
        $update_query = "UPDATE groupchat SET message_status=1 WHERE message_status=0";
        mysqli_query($connect, $update_query);
    }
    $query_2 = "SELECT * FROM groupchat ORDER BY comment_id DESC LIMIT 5";
    $result_2 = mysqli_query($connect, $query_2);
    $output_2 = '';
    /*
    if (mysqli_num_rows($result_2) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $output .= '
            <li>
                <a href="#">
                <strong>' . $row["comment_subject"] . '</strong><br />
                <small><em>' . $row["comment_text"] . '</em></small>
                </a>
            </li>
            <li class="divider"></li>
            ';
            }
    } else {
        $output .= '<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
    }
    */
    /*
    $query_21 = "SELECT * FROM groupchat WHERE message_status='unread'";
    $result_21 = mysqli_query($connect, $query_21);
    $count_2 = mysqli_num_rows($result_21);
    $data_2 = array(
        'notification_group'   => $output_2,
        'unseen_notification_group' => $count_2
    );
    echo json_encode($data_2);
    */
//}

