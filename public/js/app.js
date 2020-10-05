const chat = {
    id: null,
    messages: [],
    last_message: null,
};

$(document).ready(function() {
    const input = $("#message-input");

    //basically when the sender clicks the user it will load all recent chats
    $(".user-chat").click(function() {
        $("#messages").html("Loading.....");

        // fetch user profile from the server
        $.get(`api/users.php?get=${$(this).data("id")}`, function(response) {
            $("#messages").html("");
            chat_user = JSON.parse(response);
            load_profile_html(chat_user);
            get_messages(app_user.id, chat_user.id);
        });
    });

    // submit a new message 
    $("#message-form").submit(function(form) {
        const message = input.val();
        form.preventDefault();
        input.val("");

        // sends a new message and get it back
        $.post(
            `api/messages.php?limit=1`, {
                message: message,
                sender: app_user.id,
                receiver: chat_user.id,
            },
            (messages) => load_chat_html(JSON.parse(messages), false)
        );
    });

    //getting messages from the server
    function get_messages(
        sender,
        receiver,
        replace = false,
        count = 0,
        loop = true
    ) {
        const limit = count ? `limit=${count}&` : "";

        // get for messages between different users
        if (sender !== receiver)
            $.get(
                `api/messages.php?${limit}sender=${sender}&receiver=${receiver}`,
                function(response) {
                    const { messages } = JSON.parse(response);
                    if (messages instanceof Array) {
                        load_chat_html(messages, replace);
                    } else {
                        $("#messages").html("You have no messages");
                    }
                    if (loop)
                    // wait for 1s then try getting messages again
                        setTimeout(
                        () =>
                        get_messages(
                            app_user.id,
                            chat_user.id,
                            replace,
                            count > 0 ? count : 1
                        ),
                        1000
                    );
                }
            );
    }

    //
    function get_notification() {
        $.get(`api/messages.php?seen=0&sender=${app_user.id}`, function(response) {
            const { notifications } = JSON.parse(response);
            if (notifications) load_notification_html(notifications);
            setTimeout(() => {
                get_notification();
                get_active_users();
            }, 1000);
        });
        chat.messages.forEach((message) => {
            if (!message.seen && message.sent_to === app_user.id) {
                set_message_seen(message.id, message.sent_by);
            }
        });
    }

    get_notification();
});

function get_active_users() {
    $.get("api/users.php?status", function(response) {
        const { user_status } = JSON.parse(response);

        if (user_status) user_status.forEach(user => {
            $(`.user-status[data-id=${user.id}]`)
                .html(`<i class="fa fa-circle${user.icon}" style="margin: 2px" aria-hidden='true'></i>${user.status}`)
        });
    });
}

function set_message_seen(id, sender) {
    $.post(
        `api/messages.php?set-seen`, {
            message: id,
            sender: sender,
            reader: app_user.id,
        },
        function(response) {
            const result = JSON.parse(response);
            if (result)
                $(`.chat-left-detail > .notification[data-id="${sender}"]`).remove();
        }
    );
}

function map_chat(messages) {
    chat.messages =
        messages instanceof Array ?
        messages.map((it) => ({
            ...it,
            position: it.sent_by === app_user.id ? "right" : "left",
            sender: it.sent_by === app_user.id ? app_user.fullname : chat_user.fullname,
        })) :
        chat.messages;
    return chat.messages.sort(
        (x, y) => new Date(x.timestamp) - new Date(y.timestamp)
    );
}

function load_notification_html(notifications) {
    notifications.forEach((notification) => {
        const content = $("<span>")
            .html(
                `
            <span class='notification label label-success' data-id='${notification.sent_by}'>
                New Messages: ${notification.count}
            </span>
        `
            )
            .contents();
        const span = $(
            `#contact-${notification.sent_by} > .chat-left-detail > .notification`
        );
        const contact = $(`#contact-${notification.sent_by} > .chat-left-detail`);
        if (span.length) {
            span.replaceWith(content);
        } else contact.append(content);
    });
}

function load_chat_html(messages, replace = true) {
    if (replace) $("#messages").html("");
    map_chat(messages).forEach((message) => {
        if ($(`#chat-message-${message.id}`).length < 1) {
            $("#messages").append(message_html(message));
        }
    });
}

// Loads the user profile
function load_profile_html(user) {
    $("#chat-profile").html(`
    <div class="right-header-img">
        <img src="${user.profile_pic}" alt="${user.profile_pic}" >
    </div>
    <div class="right-header-detail">
        <div>
            <p>${user.fullname}</p>
            <span>${user.is_parent === 0 ? "Teacher" : "Parent"}</span>
        </div>
    </div>
`);
}

function message_html(message) {
    return $("<li>")
        .html(
            `
    <li id="chat-message-${message.id}">    
        <div class="right-side-${message.position}-chat">
            <span>${message.sender} | <small>${message.timestamp}</small></span><br>
            <p>${message.content}</p>
        </div>
    </li>`
        )
        .contents();
}


$('#scrolling_to_bottom').animate({
    scrollTop: $('#scrolling_to_bottom').get(0).scrollHeight
}, 1000);


$(document).ready(function() {
    var height = $(window).height();
    $('.left-chat').css('height', (height - 92) + 'px');
    $('.right-header-contentChat').css('height', (height - 163) + 'px');
});