<!DOCTYPE html>
<html lang="en">
<?php

session_start(); 
error_reporting(0); 
include("connection/connect.php"); 
$_POST['status'];
if(isset($_POST['submit'] )) 
{
     if(empty($_POST['firstname']) || 
   	 empty($_POST['lastname'])|| 
		empty($_POST['email']) ||  
		empty($_POST['phone'])||
		empty($_POST['password'])||
		empty($_POST['cpassword']) ||
		empty($_POST['cpassword']))
		{
			$message = "All fields must be Required!";
		}
	else
	{
	
	$check_username= mysqli_query($db, "SELECT username FROM users where username = '".$_POST['username']."' ");
	$check_email = mysqli_query($db, "SELECT email FROM users where email = '".$_POST['email']."' ");
		

  
	if($_POST['password'] != $_POST['cpassword']){  
       	
          echo "<script>alert('Password not match');</script>"; 
    }
	elseif(strlen($_POST['password']) < 6)  
	{
      echo "<script>alert('Password Must be >=6');</script>"; 
	}
	elseif(strlen($_POST['phone']) < 10)  
	{
      echo "<script>alert('Invalid phone number!');</script>"; 
	}

    elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
    {
          echo "<script>alert('Invalid email address please type a valid email!');</script>"; 
    }
	elseif(mysqli_num_rows($check_username) > 0) 
     {
       echo "<script>alert('Username Already exists!');</script>"; 
     }
	elseif(mysqli_num_rows($check_email) > 0) 
     {
       echo "<script>alert('Email Already exists!');</script>"; 
     }
	else{
      $sqlt="SELECT * FROM users";
      $re=mysqli_query($db, $sqlt);
      if(mysqli_num_rows($re)==0){
      
      $_POST['status']="Administrator";	
      $mql = "INSERT INTO users(username,f_name,l_name,email,phone,password,address,status) VALUES('".$_POST['username']."','".$_POST['firstname']."','".$_POST['lastname']."','".$_POST['email']."','".$_POST['phone']."','".$_POST['password']."','".$_POST['address']."','".$_POST['status']."')";
      mysqli_query($db, $mql);
      
      header("refresh:0.1;url=login.php");    
    
   }else{
      $_POST['status']="user";	
      $mql = "INSERT INTO users(username,f_name,l_name,email,phone,password,address,status) VALUES('".$_POST['username']."','".$_POST['firstname']."','".$_POST['lastname']."','".$_POST['email']."','".$_POST['phone']."','".$_POST['password']."','".$_POST['address']."','".$_POST['status']."')";
      mysqli_query($db, $mql);
      
      header("refresh:0.1;url=login.php");  
   }
}
   }
	}



?>


<head>
<meta charset="UTF-8">
  <title>Login</title>
  
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css"
    integrity="sha512-BnbUDfEUfV0Slx6TunuB042k9tuKe3xrD6q4mg5Ed72LTgzDIcLPxg6yI2gcMFRyomt+yJJxE+zJwNmxki6/RA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.core.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.theme.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
     

	  <style type="text/css">
	  #buttn{
		  color:#fff;
		  background-color: #5c4ac7;
	  }
	  </style>


    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
</head>

<body class="bg-light">
<nav class="navbar navbar-expand-lg expand-md navbar-light bg-body shadow-sm  mt-1 p-3"> 
        <div class="container">
        <a class="navbar-brand">
MONTANA GUEST HOUSE ONLINE ORDERING SYSTEM
        </a>
    <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
    <span class="navbar-toggler-icon bg-light"></span>
    </button>
            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav ms-auto d-flex justify-content-between">
                <li class="navbar-item">
                    <a href="index.php" class="nav-link text-dark btn-outline-warning ms-2 ">Home </a>
                </li>
                <li class="navbar-item">
                    <a href="#about" class="nav-link text-dark btn-outline-warning">About us</a>
                </li>
                <li class="navbar-item">
                    <a href="#contact" class="nav-link text-dark btn-outline-warning">Contact us</a>
                </li>
                <li class="nav-item dropdown ">
    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Services</i></a>
    <ul class="dropdown-menu">
    <?php
           $service="SELECT * FROM category";
              $msqt=mysqli_query($db,$service);
               
               foreach($msqt as $row){
                 echo "
                   <li><a  class='dropdown-item' href='service.php?category=".$row['cat_name']."'>".$row['cat_name']."</a></li>
                 ";                  
               }
           ?>
      </ul>
                </li>
                <li class="nav-item dropdown ms-5 fs-2">
    <a data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><i class="fas fa-user-circle"></i></a>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="login.php">Sign In</a></li>
      <li><a class="dropdown-item" href="signup.php">Sign Up</a></li>
</ul>
</li>
                </ul>
            </div>
        </div>
    </nav>
            
            <section class="contact-page inner-page">
               <div class="container ">
                  <div class="row ">
                     <div class="col-md-12">
                        <div class="widget" >
                           <div class="widget-body">
                            
							  <form action="" method="post">
                                 <div class="row">
								  <div class="form-group col-sm-6">
                                       <label for="exampleInputEmail1">User-Name</label>
                                       <input class="form-control" type="text" name="username" id="example-text-input"> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputEmail1">Phone number</label>
                                       <input class="form-control" type="text" name="phone" id="example-tel-input-3"> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputEmail1">First Name</label>
                                       <input class="form-control" type="text" name="firstname" id="example-text-input"> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputPassword1">Password</label>
                                       <input type="password" class="form-control" name="password" id="exampleInputPassword1"> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputEmail1">Last Name</label>
                                       <input class="form-control" type="text" name="lastname" id="example-text-input-2"> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputPassword1">Confirm password</label>
                                       <input type="password" class="form-control" name="cpassword" id="exampleInputPassword2"> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputEmail1">Email Address</label>
                                       <input type="text" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp"> 
                                    </div>
                               
									 <div class="form-group col-sm-6">
                                       <label for="exampleTextarea">Delivery Address</label>
                                       <textarea class="form-control" id="exampleTextarea"  name="address" rows="3"></textarea>
                                    </div>
                                    
                                 </div>
                                 <button type="submit" name="submit" class="btn bg-primary float-end text-light my-4 fs-5" style="height:50px; width:200px;">Sign Up </button>
            
                              </form>
                  
						   </div>
           
                        </div>
                     
                     </div>
                    
                  </div>
               </div>
            </section>
            <div class="pt-3 pb-5 mt-3 bg-dark text-light">
    <div class="container">
  <div class="row">
      <!-- Missions  -->
      <div class="col-md-4">
      <h3 class="text-light">
              OUR MISSION
          </h3>
          <div>
        <p>Increase the big  number of customer from any where and provided Good quality service.<b>in our geust house customer is a king</b>
          </p> </div>  
      </div>
      <!-- Social Media -->
      <div class="col-md-4">
        <h3 class="text-light">
        Montana Information
        </h3> 
        <div>
        <p>About Us</p>
        <p>Contact Us</p>
        <p></p> 
    </div></div>
        <!-- Another Info-->
        <div class="col-md-4">
        <h3 class="text-light">
             Social Media
            </h3>
           <div>
           <p><i class="fab fa-facebook-square fs-4"> </i> &nbsp;&nbsp;FaceBook</p>
            <p><i class="fab fa-twitter-square fs-4"></i> &nbsp;&nbsp;Twitter</p>
           <p> <i class="fab fa-whatsapp fs-4"></i> &nbsp;&nbsp;Whatsapp : +250780083237</p>
           <p> <i class="fab fa-instagram fs-4"></i> &nbsp;&nbsp;Instagram</p>
        </div>
            <div>
        </div>
  </div>
  </div>
  <script src="bootstrap/js/bootstrap.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/glide.min.js"></script>
     <script src="js/swiper-bundle.min.js"></script>

     <!-- JavaScript -->
     <script src="js/script.js"></script>
     <script src="js/slide.js"></script>
</body>
</html>
</body>

</html>