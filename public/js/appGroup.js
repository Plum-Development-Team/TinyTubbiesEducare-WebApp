const chat = {
    id: null,
    messages: [],
    last_message: null,
};

$(document).ready(function() {
    const input = $("#message-input");

    $(".user-chat").click(function() {
        chat.id = $(this).data("id");
        $("#messages").html("Loading Message....");

        $.get(`api/group.php?chat=${chat.id}`, function(response) {
            group = JSON.parse(response);
            load_profile_html(group);
            group_chat_message(group.id);
        });
    });

    // submit a new message 
    $("#message-form").submit(function(form) {
        const message = input.val();
        form.preventDefault();
        input.val("");

        // sends a new message and get it back
        $.post(`api/group_messages.php?limit=1`, {
                chat: group.id,
                sender: user.id,
                message: message,
            },
            (messages) => load_chat_html(JSON.parse(messages), false)
        );
    });

    function group_chat_message(id) {

        $.get(`api/group_messages.php?chat=${id}`,
            function(response) {

                const { messages } = JSON.parse(response);

                if (messages instanceof Array) {
                    load_chat_html(messages);
                } else {
                    $("#messages").html("You have no messages");
                }

                if (chat.id === id) setTimeout(() => group_chat_message(chat.id), 1000);
            }
        );
    }

    //
    function get_notification() {
        $.get(`api/group_messages.php?seen=0`, function(response) {
            console.log(response);
            const { notifications } = JSON.parse(response);

            if (notifications) load_notification_html(notifications.filter(it => it.id !== null));

            setTimeout(() => {
                get_notification();
                get_active_users();
            }, 1000);
        });

        chat.messages.forEach((message) => {
            if (!message.seen && message.sent_to === user.id) {
                set_message_seen(message.id, message.sent_by);
            }
        });
    }

    // get_notification();
});

function get_active_users() {
    $.get("api/group.php?status", function(response) {
        const { user_status } = JSON.parse(response);

        if (user_status) user_status.forEach(user => {
            $(`.user-status[data-id=${user.id}]`)
                .html(`<i class="fa fa-circle${user.icon}" style="margin: 2px" aria-hidden='true'></i>${user.status}`)
        });
    });
}

function set_message_seen(user, group, message) {
    $.post(
        `api/group_messages.php?set-seen`, { user, group, message },
        function(response) {
            const result = JSON.parse(response);
            if (result)
                $(`.chat-left-detail > .notification[data-id="${group}"]`).remove();
        }
    );
}

function map_chat(messages) {
    chat.messages =
        messages instanceof Array ?
        messages.map((it) => ({
            ...it,
            position: it.sent_by == user.id ? "right" : "left",
            sender: it.fullname
        })) : [];

    console.log(chat.messages);
    return chat.messages.sort(
        (x, y) => new Date(x.timestamp) - new Date(y.timestamp)
    );
}

function load_notification_html(notifications) {
    notifications.forEach((notification) => {
        const content = $("<span>").html(`
            <span class='notification label label-success' data-id='${notification.sent_by}'>
                New Messages: ${notification.count}
            </span>
        `).contents();

        const span = $(`#contact-${notification.sent_by} > .chat-left-detail > .notification`);
        const contact = $(`#contact-${notification.sent_by} > .chat-left-detail`);

        if (span.length) {
            span.replaceWith(content);
        } else contact.append(content);
    });
}

function load_chat_html(messages, replace = true) {
    if (replace) $("#messages").html("");
    map_chat(messages).forEach((message) => $("#messages").append(message_html(message)));
}

// Loads the user profile
function load_profile_html(group) {
    $("#chat-profile").html(`
    <div class="right-header-img">
        <img src="${group.profile_pic}" alt="${group.profile_pic}" >
    </div>
    <div class="right-header-detail">
        <div>
            <p>${group.group_type}</p>
        </div>
    </div>
`);
}

function message_html(message) {
    return $("<li>").html(`
    <li id="chat-message-${message.id}">    
        <div class="right-side-${message.position}-chat">
            <span>${message.sender} | <small>${message.timestamp}</small></span><br>
            <p>${message.content}</p>
        </div>
    </li>`).contents();
}

$('#scrolling_to_bottom').animate({
    scrollTop: $('#scrolling_to_bottom').get(0).scrollHeight
}, 1000);

$(document).ready(function() {
    var height = $(window).height();
    $('.left-chat').css('height', (height - 92) + 'px');
    $('.right-header-contentChat').css('height', (height - 163) + 'px');
});