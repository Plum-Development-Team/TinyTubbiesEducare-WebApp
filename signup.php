
<!-- WE NOT DOING THE SIGN UP ADMIN WILL DO IT -->

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Create New Account</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Roboto|Courgette|Pacifico:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/signup.css">
</head>
<body>
<div class="signup-form">
    <form action="" method="post">
        <div class="form-header">
            <h2>Sign Up</h2>
            <p>Fill out this form and start chating with other Parents and Teachers</p>
        </div>
        <div class="form-group">
            <label>Fullname</label>
            <input type="text" class="form-control" placeholder="Example: Chiko Mutandwa" name="user_name"
                   autocomplete="off" required="required">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" placeholder="Password" name="user_pass" autocomplete="off"
                   required="required">
        </div>
        <div class="form-group">
            <label>Email Address</label>
            <input type="email" class="form-control" placeholder="chiko@gmail.com" name="user_email" autocomplete="off"
                   required="required">
        </div>
        <div class="form-group">
            <label>Campus</label>
            <select class="form-control" name="user_country" required="required">
                <option value="1" disabled="disabled">---Select a Campus---</option>
                <option>Clarmont</option>
                <option>GrassyPark</option>
                <option>Mowbray</option>
                <option>Camps Bay</option>
                <option>Kenilworth</option>
            </select>
        </div>
        <div class="form-group">
            <label>Gender</label>
            <select class="form-control" name="user_gender" required="required">
                <option value="1" disabled="disabled">---Select a Gender---</option>
                <option>Male</option>
                <option>Female</option>
                <option>Others</option>
            </select>
        </div>
        <div class="form-group">
            <!-- <a href="" class="btn btn-primary btn-block btn-lg" data-toggle="modal" data-target="#modalRegisterForm">Sign Up Child</a> -->
            <button type="button" name="age" id="age" data-toggle="modal" data-target="#add_data_Modal"
                    class="btn btn-primary btn-block btn-lg">Add Child
            </button>
        </div>
        <!-- <div class="text-center">
        <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalRegisterForm">Launch
            Modal Register Form</a>
        </div> -->
        <div class="form-group">
            <label class="checkbox-inline"><input type="checkbox" required="required"> I accept the <a href="#">Terms of
                    Use</a> &amp; <a href="#">Privacy Policy</a></label>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block btn-lg" name="sign_up">Finish Application</button>
        </div>

        <?php
        include("signup_user.php");
        ?>
    </form>

    <div class="text-center small">Already have an account? <a href="signin.php">Signin here</a></div>

    <!-- ******************************************************************************************************************************************************************************** -->
    <!-- ****************************************************************SIGN UP CHILD*************************************************************************************************** -->
    <!-- ******************************************************************************************************************************************************************************** -->

    <div id="add_data_Modal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button id="close-model" type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Please sign up you child or children</h4>
                </div>
                <div class="modal-body">
                    <form method="post" id="insert_form">
                        <label>Childs Fullname</label>
                        <input type="text" name="name" id="name" class="form-control"/>
                        <br/>

                        <label>Childs Address</label>
                        <textarea name="address" id="address" class="form-control"></textarea>
                        <br/>

                        <label>Childs Gender</label>
                        <select name="gender" id="gender" class="form-control">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        <br/>

                        <label>Enter Date of Birth</label>
                        <input type="date" name="age" id="age" max="2016-12-25" min="2013-12-25" class="form-control"/>
                        <br/>

                        <input type="button" name="insert" id="insert" value="Done" class="btn btn-success"/>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


</div>
</body>
</html>

<script>
    $(document).ready(function () {
        $('#insert').click(function (event) {
            event.preventDefault();

            if ($('#name').val() == "") {
                alert("Name is required");
            } else if ($('#address').val() == '') {
                alert("Address is required");
            } else if ($('#age').val() == '') {
                alert("Age is required");
            }

            $('#close-model').click()
        });
    });

</script>