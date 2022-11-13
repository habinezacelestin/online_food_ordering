<html lang="en">
   <?php
$count=0;
session_start();
include("connection/connect.php"); 
    if(isset($_SESSION['shop_cart'])){
 $count=count($_SESSION['shop_cart']);
    }
   ?>
<head>
<title>Login</title>
  
  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css"
      integrity="sha512-BnbUDfEUfV0Slx6TunuB042k9tuKe3xrD6q4mg5Ed72LTgzDIcLPxg6yI2gcMFRyomt+yJJxE+zJwNmxki6/RA=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.core.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.theme.css">
      <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/login.css">
  
        <style type="text/css">
        #buttn{
            color:#fff;
            background-color: #5c4ac7;
        }
        </style>
  
  
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

</head>
<body class="mx-1">
             <!-- Navbar within navlink -->

    <nav class="navbar navbar-expand-lg expand-md navbar-light bg-body shadow-sm  mt-1 p-3"> 
        <div class="container">
        <a class="navbar-brand">
GUEST HOUSE ONLINE ORDERING SYSTEM
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
                <li class="navbar-item ms-5 fs-4">
                    <a href="cart.php" class="nav-link text-dark"> <i class="fas fa-shopping-cart"></i><?php echo $count ?></a>
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
    
    <div style=" background-image: url('images/img/2.jpg');">

<?php
error_reporting(0); 

if(isset($_POST['submit']))  
{
	$username = $_POST['username'];  
	$password = $_POST['password'];
	
	if(!empty($_POST["submit"]))   
     {
	$loginquery ="SELECT * FROM users WHERE username='$username' AND password='$password'"; //selecting matching records
	$result=mysqli_query($db, $loginquery); //executing
	$row=mysqli_fetch_array($result);
 
	
	                        if($row['status']=="Administrator") 
								{
                 
                                      echo "<script type='text/javascript'>document.location='admin/dashboard.php';</script>";   
                                     
	                            } 
							else
							    {
                    $_SESSION["user_id"] = $row['u_id']; 
                    $_SESSION["username"] = $row['username']; 
                    echo "<script type='text/javascript'>document.location='index.php';</script>";            	
                                }
	 }
	
	
}
?>
  

<div class="pen-title">
</div>

<div class="module form-module">
  <div class="toggle">
   
  </div>
  <div class="form">
    <h2>Login to your account</h2>
	  <span style="color:red;"><?php echo $message; ?></span> 
   <span style="color:green;"><?php echo $success; ?></span>
    <form action="" method="post">
      <input type="text" placeholder="Username"  name="username"/>
      <input type="password" placeholder="Password" name="password"/>
      <input type="submit" id="buttn" name="submit" value="Login" />
    </form>
  </div>
  
  <div class="cta fs-6">Not registered?<a href="signup.php" style="color:#5c4ac7;"> Create an account</a></div>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<!-- My Footer Info -->
<div class="pt-3 pb-5 mt-3 my-3 bg-dark text-light">
    <div class="container">
  <div class="row">
      <!-- Missions  -->
      <div class="col-md-4">
         <h3>
              OUR MISSION
          </h3>
          <div>
        <p>Increase the big  number of customer from any where and provided Good quality service.<b>in our geust house customer is a king</b>
          </p> </div>  
      </div>
      <!-- Social Media -->
      <div class="col-md-4">
        <h3>
        Montana Information
        </h3> 
        <div>
        <p>About Us</p>
        <p>Contact Us</p>
        <p></p>
    </div></div>
        <!-- Another Info-->
        <div class="col-md-4">
            <h2>
             Social Media
            </h2>
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