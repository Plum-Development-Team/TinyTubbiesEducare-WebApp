<?php

$user = $_SESSION["user"];
foreach ((new User)->getAll() as $_user) {

    //going through all users in the database checking if they are online and if they have any unread messages
    if ($user->id == $_user->id) continue;
    $icon = $_user->isLoggedin() ? '' : '-o';
    $status = $_user->isLoggedin() ? 'On' : 'Off';
    $count = Message::count(UNREAD, $_user->id, $user->id);
    $notification = $count->value >= 1 ? "<span class='notification label label-success' data-id='$_user->id'>New Messages: $count->value</span>" : "";

    // displaying the users in a list on the side
    echo <<<html
        <li id="contact-$_user->id" class="user-chat" data-id="$_user->id">
            <div class='chat-left-img'>
                    <img src="$_user->profile_pic" alt="$_user->profile_pic">
            </div>
            <div class='chat-left-detail' data-id="$_user->id">
                    <p><a><label>$_user->fullname</label></a></p>
                    <span class="user-status"  data-id="$_user->id"><i class="fa fa-circle$icon" style="margin: 2px" aria-hidden='true'></i>{$status}line</span>
                    $notification
            </div>
        </li>
html;
}
