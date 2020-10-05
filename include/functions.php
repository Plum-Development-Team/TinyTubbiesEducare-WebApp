<?php

function searchContact(){
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
    $user = $_SESSION['user'];
    if (isset($_POST['update_user_profile'])) {
        list("fullname" => $fullname, "email" => $email) = $_POST;

        $users = User::query("UPDATE user SET email='$email', fullname='$fullname' WHERE id='$user->id'", "User");
        echo "<script> alert('Your details have been updated!!!')</script>";
        header("profile.php");
    } 
}



function updateProfilePicture(){
    $user = $_SESSION['user'];
    if (isset($_POST["uploadBtn"]) && $_POST['uploadBtn'] == 'Upload') {
        if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK) {

            $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
            $fileName = $_FILES['uploadedFile']['name'];

            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));

            $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

            $allowedfileExtensions = array('jpg', 'gif', 'png', 'jpeg');
            if (in_array($fileExtension, $allowedfileExtensions)) {
                $uploadFileDir = './images/';
                $dest_path = $uploadFileDir . $newFileName;

                if (move_uploaded_file($fileTmpPath, $dest_path)) {
                    $user->changeProfile($dest_path);
                    // $update_profile_picture = (new User)->exec(true, "UPDATE user SET profile_pic = ? WHERE id = ?;", "si", $dest_path, $user);
                    echo "<script>alert('Profile was successfully updated.')</script>";
                } else {
                    echo "<script>alert('There was some error in updating you profile picture. Please make sure the profile picture is writable by web server.')</script>";
                }
            }
        }
    }
}



function uploadFiles(){
    if (isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == 'Upload') {
        if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK) {

            $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
            $fileName = $_FILES['uploadedFile']['name'];
            $fileSize = $_FILES['uploadedFile']['size'];
            $fileType = $_FILES['uploadedFile']['type'];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));

            $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

            $allowedfileExtensions = array('jpg', 'gif', 'png', 'zip', 'txt', 'xls', 'doc', 'pdf', 'docx');
            if (in_array($fileExtension, $allowedfileExtensions)) {
                $uploadFileDir = './files/';
                $dest_path = $uploadFileDir . $newFileName;

                if (move_uploaded_file($fileTmpPath, $dest_path)) {
                    $upload_new_files = (new Files)->upload($fileName, $fileType, $fileSize, $dest_path);
                    echo "<script>alert('File is successfully uploaded.')</script>";
                } else {
                    echo "<script>alert('There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.')</script>";
                }
            }
        }
    }
}



function displayFiles(){

    foreach ((new Files)->getAll() as $_file) {

        $files = <<<display
                <div>
                    <span style="float:left; font-size: 20px;">$_file->file_name</span>
                    <a href="download.php?file_path=$_file->file_path">
                        <button class="btn btn-default"><i class='fa fa-download'></i> Download</button>
                    </a>
                </div><br>
        display;
        echo $files;
    }


}