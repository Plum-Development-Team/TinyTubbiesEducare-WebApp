<?php

function searchContact()
{
    $user = $_SESSION['user'];
    $users = User::query("SELECT * FROM user ORDER BY campus, fullname DESC LIMIT 5", "User");

    if (isset($_GET['search_btn'])) {
        $search_query = htmlentities($_GET['search_query']);
        $result = (new User)->exec(true, "SELECT * FROM user WHERE fullname LIKE ? OR campus LIKE ?", 'ss', $search_query, $search_query);
        $users = $result ?: $users;
    }


    if(isset($users)) foreach ($users as $_user) {
        $displayContact = <<<display
                <li class="list-group-item">
                    <div class="col-xs-12 col-sm-3">
                        <img src="$_user->profile_pic" alt="$_user->profile_pic" class="img-responsive img-circle" />
                    </div>
                    <div class="col-xs-12 col-sm-9">
                        <span class="name">$_user->fullname</span><br/>
                        <span class="glyphicon glyphicon-map-marker text-muted c-info" data-toggle="tooltip" title="$_user->campus"></span>
                        <span class="visible-xs"> <span class="text-muted">$_user->campus</span><br/></span>
                        <span class="glyphicon glyphicon-user text-muted c-info" data-toggle="tooltip" title="View profile"></span>
                        <span class="visible-xs"> <span class="text-muted">View profile</span><br/></span>
                        <a href="home.php?receiver=$_user->id">
                            <span class="fa fa-comments text-muted c-info" data-toggle="tooltip" title="Chat with"></span>
                            <span class="visible-xs"><span class="text-muted">Chat with</span><br/></span>
                        </a>
                    </div>
                    <div class="clearfix"></div>
                </li>
            display;

        echo $displayContact;
    } 
}



function updateUserProfile(){
    
}