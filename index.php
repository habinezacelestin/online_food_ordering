<html lang="en">
  <?php 
  session_start();
  include("connection/connect.php");
  if(isset($_SESSION['shop_cart'])){
    $count=count($_SESSION['shop_cart']);
       }

  ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guest house online ordering system</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css"
    integrity="sha512-BnbUDfEUfV0Slx6TunuB042k9tuKe3xrD6q4mg5Ed72LTgzDIcLPxg6yI2gcMFRyomt+yJJxE+zJwNmxki6/RA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.core.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.theme.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/landingpage.css">
    <link rel="stylesheet" href="css/aboutus.css">

</head>
<body class="mx-1">
             <!-- Navbar within navlink -->

    <nav class="navbar navbar-expand-lg expand-md navbar-light bg-body shadow-sm  mt-1 p-3"> 
        <div class="container-fluid">
        <a class="navbar-brand"><img src="images/img/Capture.JPG"width="100" height="50">
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
    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="service.php" role="button" aria-expanded="false">Services</i></a>
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
                    <a href="cart.php" class="nav-link text-dark"> <i class="fas fa-shopping-cart"><?php //echo $count ?></i></a>
                </li>
                <li class="nav-item dropdown ms-5 fs-2">
    <a data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><i class="fas fa-user-circle"></i></a>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="login.php">Sign In</a></li>
      <li><a class="dropdown-item" href="signup.php">Sign Up</a></li>
</ul>
</li>

                </ul>
                <span class="navbar-facebook-icon bg-dark"></span>
            </div>
        </div>
    </nav>

<!-- 
    Slide Images with texting -->
    <section class="hero">
        <div class="glide" id="glide_1">
          <div class="glide__track" data-glide-el="track">
            <ul class="glide__slides">
                <li class="glide__slide">
                    <div class="center">
                      <div class="left">
           
                        <h1 class="fs-3">Welcome to Montana Hotel</h1>
                        <p>Now you can Book Meeting hall and wedding .</p>
                  
                      </div>
                      <div class="right">
                      <img src="images/img/room3.jpg" alt="Los Angeles" width="800" height="500">
                      </div>
                    </div>
                  </li>
              <li class="glide__slide">
                <div class="center">
                  <div class="left">
            
                    <h1 class="fs-3">Best services are our Mission</h1>
                    <p>You can Order different kind of food on Montana hotel and we will reach you in the blink of an eye .</p>
                  </div>
                  <div class="right">
                      <img class="img1" src="images/img/2.jpg" alt="" width="1000" height="500">
                      
                  </div>
                </div>
              </li>
             
            </ul>
          </div>
        </div>

              </section>
<section class=" align-text-center-justify-content-between mt-4 pt-5 px-5 pb-4 bg-light food-section h-100" id="food">
    <div class="container bordered">
        <div class="text-center text-dark">Ordering different types of foods and reach you in the blink of an eye </div>
   
   
   <div class="row">
   <?php
     $sql="SELECT * FROM products,category where products.Cat_id=category.Cat_id and cat_name='Food' LIMIT 4";
     $select=mysqli_query($db,$sql);
    while($row=mysqli_fetch_array($select)){
          
    ?>
   
   <div class="col-md-3 py-3">
   <div class="card shadow h-100 w-100">
   <form method='post' action="cart.php?action=add&pro_id=<?= $row['pro_id'] ?>">
<img src="images/img/<?= $row['pro_image'] ?>" alt="" class="img-thumbnail img-fluid"
 style="width:100% ; height:250px; cover:fit; justify-content: center;justify-items: center;">

 <div class="card-body">
        <p><b>Food name:<?= $row['pro_name'] ?></b> </p>
     <span><b>Price:<?=number_format($row['pro_price'],2) ?></b></span><span>Rwf</span>
     <input type="hidden" name="pro_name" value="<?= $row['pro_name'] ?>"/>
     <input type="hidden" name="pro_price" value="<?= $row['pro_price'] ?>"/>
     <input type="number" name="quantity" value="1" class="form-control"/>
    <div><input type="submit" name="add_to_cart" value="Add to Cart" class="btn bg-warning float-end btn-block my-3"></div>
     
 </div>
 </form>
 </div>    
</div>

<?php
    }
    ?>
</div>
</div>
</section>

<section id="about">
<div class="about-section">
        <div class="inner-container">
            <h1 class="fs-2 text-center">About Us</h1>
            <p class="text">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus velit ducimus, enim inventore earum, eligendi nostrum pariatur necessitatibus eius dicta a voluptates sit deleniti autem error eos totam nisi neque voluptates sit deleniti autem error eos totam nisi neque.
            </p>
            <div class="skills">
             <div class="hall">
                <h6>Meeting Hall and Wedding sales</h6>
                <img src="images/img/room7.png" alt=""style="width:100%; justify-content: center;justify-items: center; ">
                <p class="">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus velit ducimus, enim inventore earum, eligendi nostrum pariatur necessitatibus eius dicta a voluptates sit deleniti autem error eos totam nisi neque voluptates sit deleniti autem error eos totam nisi neque. </p>
            </div>
             <div class="room"> 
                  <h6>Rooms or hotel accomodation</h6>
                  <img src="images/img/room3.jpg" alt=""style="width:100%; justify-content: center;justify-items: center;" >
                  <p class="">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus velit ducimus, enim inventore earum, eligendi nostrum pariatur necessitatibus eius dicta a voluptates sit deleniti autem error eos totam nisi neque voluptates sit deleniti autem error eos totam nisi neque. </p>
            
                </div>
             <div class="food"> 
                 <h6>Different Type of food</h6>
                 <img src="images/img/2.jpg" alt=""style="width:100%; justify-content: center;justify-items: center;" >
                 <p class="">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus velit ducimus, enim inventore earum, eligendi nostrum pariatur necessitatibus eius dicta a voluptates sit deleniti autem error eos totam nisi neque voluptates sit deleniti autem error eos totam nisi neque. </p>
            
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Info -->
 <section class="bg-light" id="contact">  
 <div class="contact-section">
      <div class="inner-width">
        <h1>Get in touch with us</h1>
        <form method="post">
        <input type="text" class="name" name="name" placeholder="Your Name">
        <input type="email" class="email" name="email" placeholder="Your Email">
        <textarea rows="1" placeholder="Message"name="message" class="message"></textarea>
        <button type="submit" name="submit">Get in touch</button>
        </form>
        <?php 
        if(isset($_POST['submit'])){
          $name=$_POST['name'];
          $email=$_POST['email'];
          $message=$_POST['message'];
          $query="INSERT INTO message( name, email, comment)
          VALUES(
              '$name',
              '$email',
              '$message'
          )";
          $run=mysqli_query($db,$query);
          if($run){
            ?>
            <script>
              alert('your message send, thank you')
            </script>
            <?php


          }


        }
        ?>
       
      </div>
        </div>
</section>

<!-- My Footer Info -->
<div class="pt-3 pb-5 mt-3 bg-dark text-light">
    <div class="container">
  <div class="row">
      <!-- Missions  -->
      <div class="col-md-4">
         <h3>
              OUR MISSION
          </h3>
          <div>
        <p>Customer care is what do to the best in Montana guest </b>
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