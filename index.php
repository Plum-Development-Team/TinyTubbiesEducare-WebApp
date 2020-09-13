<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="styling.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .bs-spinner{
            margin: 20px;
            text-align: center;
        }
    </style>
   
    <title>Welcome to Tiny Tubbies</title>
    
  </head>

  <body>
   
<div id="header">
<nav class="navbar navbar-expand-lg ">
    <div class="container">
      <a class="navbar-brand" href="index.html" >
            <img class="logo" src="Resources/Logo.png" alt="" onclick="scrollto('index')">
          </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="line"></span> 
        <span class="line"></span> 
        <span class="line" style="margin-bottom: 0;"></span>
          </button>
      
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item" onclick="scrollto('services')">
            <strong><a class="nav-link" href="#services">Our Services</a></strong>
          </li>
          <li class="nav-item" onclick="scrollto('contact')">
            <strong><a class="nav-link" href="#contact">Contact Us</a></strong>
          </li>
          <li class="nav-item" onclick="scrollto('about')">
            <strong><a class="nav-link" href="#about">About Us</a></strong>
          </li>
          <li class="nav-item" >
           <strong> <a class="nav-link" href="signin.php" >Login</a></strong>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</div>
 

  <header>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <!-- Slide One - Set the background image for this slide in the line below -->
        <div class="carousel-item active" style="background-image: url('https://source.unsplash.com/LAaSoL0LrYs/1920x1080')">
          <div class="carousel-caption d-none d-md-block">
            <h2 class="display-4">Writing</h2>
            <p class="lead">We teach and develop writing skills in our kids.</p>
          </div>
        </div>
        <!-- Slide Two - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url('https://source.unsplash.com/bF2vsubyHcQ/1920x1080')">
          <div class="carousel-caption d-none d-md-block">
            <h2 class="display-4">Creativity</h2>
            <p class="lead">We instill creativity in them.</p>
          </div>
        </div>
        <!-- slide Four - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url('Resources/img1.jpg')">
          <div class="carousel-caption d-none d-md-block">
            <h2 class="display-4">Unity</h2>
            <p class="lead">We work in unity and we teach all the kids how to work in unity.</p>
          </div>
        </div>
          <!-- slide Five - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('Resources/img5.jpg')">
            <div class="carousel-caption d-none d-md-block">
              <h2 class="display-4">Reading</h2>
              <p class="lead">This helps them build their own vocabulary and improve their understanding when they listen, which is vital as they start to read</p>
            </div>
          </div>
            <!-- slide Six - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url('https://images.unsplash.com/photo-1581078426770-6d336e5de7bf?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80')">
          <div class="carousel-caption d-none d-md-block">
            <h2 class="display-4">Diversity</h2>
            <p class="lead">Our education is made available to all types of students regardless their religions, race, ethnicity and so forth.</p>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
    </div>
  </header>



  <br>
  <div class="bs-spinner">
  <!-- <div class="spinner-border text-primary">
    <span class="sr-only">Loading...</span>
</div>
<div class="spinner-border text-secondary">
    <span class="sr-only">Loading...</span>
</div>
<div class="spinner-border text-success">
    <span class="sr-only">Loading...</span>
</div> -->
<div class="spinner-border text-danger">
    <span class="sr-only">Loading...</span>
</div>
<div class="spinner-border text-warning">
    <span class="sr-only">Loading...</span>
</div>
<!-- <div class="spinner-border text-info">
    <span class="sr-only">Loading...</span>
</div>
<div class="spinner-border text-dark">
    <span class="sr-only">Loading...</span>
</div> -->
<div class="spinner-border text-light">
    <span class="sr-only">Loading...</span>
</div>
</div>
<br>
<!-- Our services page -->
  <div class = "heading" id="services">
    <h1><img class="iconImage" src="https://image.flaticon.com/icons/svg/1086/1086470.svg" alt=""> Our Services </h1>
  <div class="row">
    <div class="col-sm-4">
      <div class="card text-white bg-primary mb-3 border-dark mb-3">
        <div class="card-body">
          <h5 class="card-title">Creche <img class="iconImage" src="https://image.flaticon.com/icons/svg/3214/3214365.svg" alt=""></h5>
          <div class = "border"></div>
          <p class="card-text">A nursery where babies and young children are cared for during the working day. Crèche also helps to shape your child's mind with various activities.</p>
        </div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="card text-white bg-warning mb-3  border-dark mb-3">
        <div class="card-body">
          <h5 class="card-title">Grade R <img class="iconImage" src="https://image.flaticon.com/icons/svg/5/5177.svg" alt=""></h5>
          <div class = "border"></div>
          <p class="card-text">We want to take every opportunity for our children to develop into whole individuals. This process is attained as the children interact with their environment through developmentally appropriate curriculum.</p>
        </div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="card text-white bg-danger mb-3 border-dark mb-3">
        <div class="card-body">
          <h5 class="card-title">Babysitting <img class="iconImage" src="https://image.flaticon.com/icons/svg/2017/2017244.svg" alt=""></h5>
          <div class = "border"></div>
          <p class="card-text">Babysitting is temporarily caring for a child. Babysitting can be a paid job for all ages; however, it is best known as a temporary activity for young teenagers who are too young to be eligible for employment in the general economy.</p>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-4">
      <div class="card text-white bg-warning mb-3 border-dark mb-3">
        <div class="card-body">
          <h5 class="card-title">Learning <img class="iconImage" src="https://image.flaticon.com/icons/svg/3068/3068421.svg" alt=""></h5>
          <div class = "border"></div>
          <p class="card-text">We believe that our lives are a journey of life-long learning. We enlighten and guide the minds of children by creating an environment of receptivity, learning and discovery.</p>
        </div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="card text-white bg-danger mb-3 border-dark mb-3">
        <div class="card-body">
          <h5 class="card-title">Caring <img class="iconImage" src="https://image.flaticon.com/icons/svg/2913/2913557.svg" alt=""></h5>
          <div class = "border"></div>
          <p class="card-text">We believe that a child can excel only when they feel safe and loved. We foster an environment that embraces love and respect that cherishes the children we are entrusted.</p>
        </div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="card text-white bg-primary mb-3 border-dark mb-3">
        <div class="card-body">
          <h5 class="card-title">Character Development <img class="iconImage" src="https://image.flaticon.com/icons/svg/3203/3203917.svg" alt=""> </h5>
          <div class = "border"></div>
          <p class="card-text">We believe that the moral foundation of our society is based on honest and principled behavior to each other. A system of moral values must be taught at an early age to children so that they know the difference between right and wrong.</p>
        </div>
      </div>
    </div>
  </div>
</div>
    </div>
<br>
    <!-- contact us page-->
    
    <div class="container contact" id="contact">
    	<div class="row">
		    <div class="col-md-3">
			    <div class="contact-info">
				    <img src="https://image.ibb.co/kUASdV/contact-image.png" alt="image"/>
            <h1>Contact us</h1>
				  <h4>We would love to hear from you !</h4>
			  </div>
		  </div>
		  <div class="col-md-9">
			  <div class="contact-form">
				  <div class="form-group">
				   <label class="control-label col-sm-2" for="fname">First Name</label>
				    <div class="col-sm-10">          
					    <input type="text" class="form-control" id="fname" placeholder="Enter First Name" name="fname">
				   </div>
			  	</div>
				<div class="form-group">
				  <label class="control-label col-sm-2" for="lname">Last Name</label>
				  <div class="col-sm-10">          
					<input type="text" class="form-control" id="lname" placeholder="Enter Last Name" name="lname">
				  </div>
				</div>
				<div class="form-group">
				  <label class="control-label col-sm-2" for="email">Email</label>
				  <div class="col-sm-10">
					<input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
				  </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Phone</label>
                    <div class="col-sm-10">
                      <input type="phone" class="form-control" id="phone" placeholder="Phone Number" name="phone">
                    </div>
                  </div>
				<div class="form-group">
				  <label class="control-label col-sm-2" for="comment">Message</label>
				  <div class="col-sm-10">
					<textarea class="form-control" rows="5" id="comment" placeholder="Please enter your message."></textarea>
				  </div>
				</div>
				<div class="form-group">        
				  <div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn">Submit</button>
				  </div>
				</div>
   </div>
  </div>
</div>
   <!-- <br> -->
  <div class="bs-spinner">
    <div class="spinner-border text-primary">
      <span class="sr-only">Loading...</span>
    </div>
    <div class="spinner-border text-danger">
      <span class="sr-only">Loading...</span>
    </div>
    <div class="spinner-border text-warning">
      <span class="sr-only">Loading...</span>
    </div>
  </div>
<!-- About us-->
  <div id="about" class="">
  <h1 class="about-title">About us</h1>
    <p class="text-justify"> 
      Tiny Tubby Educare has been here for many years.
      We not only make sure that our customers recieve the best service,but we also ensure that they can 
      they can rest peacefully, knowing that their children are in the best hands possible. Here at Tiny Tubbies, we stongly believe in a balance between play and work in the development of all children 
      and that they should always feel free to be themselves in a safe enviroment. 
    
      We provide a different range of services for children age 9 months - 5 years old. These services may
      include education,transport,aftercare services and many more. If you would like to know more about our services please navigate to our services page. If you have any further questions, please do not 
      hestitate to contact, you may do so by navigating to our contact page.
    
      With our beliefs and ideologies about each child being special and different, we aim to enforce
      what makes them special, as well as strengthen the strong and amazing morals you've placed into them as a parent. Tiny Tubbies Educare is the greatest way to kickstart the success of your children by 
      not only preparing them for primary school,but for life as well.
    
    </p>
  </div>
  <div id="social-platforms">
    <a class="btn btn-icon btn-facebook" href="#"><i class="fa fa-facebook"></i><span>Facebook</span></a>
    <a class="btn btn-icon btn-twitter" href="#"><i class="fa fa-twitter"></i><span>Twitter</span></a>
    <a class="btn btn-icon btn-googleplus" href="#"><i class="fa fa-google-plus"></i><span>Google+</span></a>
    <a class="btn btn-icon btn-pinterest" href="#"><i class="fa fa-pinterest"></i><span>Pinterest</span></a>
    <a class="btn btn-icon btn-linkedin" href="#"><i class="fa fa-linkedin"></i><span>LinkedIn</span></a>
    </div>
    
   <!-- Footer -->
   <div class="footer-copyright text-center py-3">
    <strong>Copyright © 2020 Tiny Tubbies Educare</strong>
  </div>
  <br>
     
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 </div>
  </body>
</html>
