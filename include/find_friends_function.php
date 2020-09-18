<?php
    $con = mysqli_connect("localhost","root","","tinytubbieseducare") or die("Connection was not established");

	function search_user(){
	
		global $con;
        
        // if the button search is clicked
		if(isset($_GET['search_btn'])){
            // searching using the username
            $search_query = htmlentities($_GET['search_query']);
            $get_user = "SELECT * FROM users WHERE user_name LIKE '%$search_query%' OR user_country LIKE '%$search_query%'";
		}else{
            // selecting users from the database in decending order
		    $get_user = "SELECT * FROM users ORDER BY user_country,user_name DESC LIMIT 5"; 
		}
		
		$run_user = mysqli_query($con,$get_user);
		
		while($row_user=mysqli_fetch_array($run_user)){
			
            $user_name = $row_user['user_name'];
            $user_profile = $row_user['user_profile'];
            $country = $row_user['user_country'];
            $gender = $row_user['user_gender'];
			
			//now displaying all at once and also going back inorder to get the image from the image folder
			echo "

                    <div class='card'>
                        <img class='card-img-top' src='../$user_profile' alt='Card image cap'>
                        <div class='card-body'>
                            <h5 class='card-title'>$user_name</h5>
                            <p class='title card-text'>$country</p>
                            <form method='post'>
                                <p class='card-text'><button name='add'>Chat with $user_name</button></p>
                            </form> 
                            <p class='card-text'><small class='text-muted'>Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                
			";
            
            // if the button chat with user is clicked and we are going back because we are in the include folder
            if(isset($_POST['add'])){
                echo "<script>window.open('../chats.php?user_name=$user_name','_self')</script>";
            }	
		}
		
	}
?>


<!-- 
<div class='card'>
    <img src='../$user_profile'>
    <h1>$user_name</h1>
    <p class='title'>$country</p>
    <p>$gender</p>
    <form method='post'>
        <p><button name='add'>Chat with $user_name</button></p>
    </form>
</div><br><br> -->