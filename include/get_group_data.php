<?php

$user = $_SESSION["user"];
foreach ((new Group)->getAll() as $group) {

    $count = GroupMessage::count(UNREAD, $group->id);

    $notification = isset($count->id) ? "<span class='notification label label-success' data-id='$count->id'>New Messages: $count->value</span>" : "";

    // displaying the users in a list on the side
    echo <<<html
        <li id="contact-$group->id" class="user-chat" data-id="$group->id">
            <div class='chat-left-img'>
                    <img src="$group->profile_pic" alt="$group->profile_pic">
            </div>
            <div class='chat-left-detail' data-id="$group->id">
                    <p><a><label>$group->group_type</label></a></p>
                    $notification
            </div>
        </li>
html;
}
