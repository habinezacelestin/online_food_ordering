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
    <!-- <link rel="stylesheet" href="css/service.css"> -->

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
    <nav class="navbar-light bg-body py-3">
  <div class="container ">
    <form method="post"class="" >
  <div class="container">
    <input class="form-control" type="search" id="search_order" placeholder="Search...." aria-label="Search" style="width:30rem;">
    <div id="results"></div>
    </form>
    
  </div>
 
</nav>

    
    <!-- team section  -->
<section class=" align-text-center-justify-content-between mt-5 pt-5 px-5 pb-4 bg-light food-section " id="food">
    <div class="container bordered">
        <div class="text-center pb-3 text-dark fs-4"> Ordering different types of foods and reach you in the blink of an eye  and we make outside cathering</div>
   
   
   <div class="row">
   <?php
     $sql="SELECT * FROM products,category where products.Cat_id=category.Cat_id and cat_name='Food'";
     $select1=mysqli_query($db,$sql);
    while($row=mysqli_fetch_array($select1)){
          
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



<section class=" align-text-center-justify-content-between mt-4 pt-5 px-5 pb-4 bg-light food-section " id="food">
    <div class="container bordered">
        <div class=" text-center pb-3 text-dark fs-4">On Montana House we have a good Accomodation on different price </div>
   <div class="row">
   <?php
     $sql="SELECT * FROM products,category where products.Cat_id=category.Cat_id AND cat_name='Room'";
     $select=mysqli_query($db,$sql);
    while($row1=mysqli_fetch_array($select)){
     
    ?>
   <div class="col-md-3 py-3">
   <div class="card shadow h-100 w-100">
    <form method="POST" action="book.php?pro_id=<?= $row1['pro_id'] ?>">
<img src="images/img/<?= $row1['pro_image'] ?>" alt="" class="img-thumbnail img-fluid"
 style="width:100% ; height: 250px;justify-content: center;justify-items: center;">

 <div class="card-body">
         <p>Room Type:
         <?= $row1['pro_type'] ?> 
         </p>
         <?php 
         ?>
         <p><b> name:<?= $row1['pro_name'] ?></b> </p>
     <span><b>Price:<?= number_format($row1['pro_price'],2) ?></b></span><span>Rwf</span>
     <input type="hidden" name="pro_name" value="<?= $row1['pro_name'] ?>"/>
     <input type="hidden" name="pro_price" value="<?= $row1['pro_price'] ?>"/>
    <div><button type="submit" name="book" class="btn bg-warning float-end btn-block">Book now</button></div>
    </form>
</div>
</div>
    </div>
    <?php
    }
    ?>
</div>

</div>
</div>
</section>
<section class=" align-text-center-justify-content-between mt-4 pt-5 px-5 pb-4 bg-light food-section " id="food">
    <div class="container bordered">
        <div class="text-center pb-3 text-dark fs-4">Do you have wedding or meeting ? book sale or hall meeting on Montana House,we have good sales and halls </div>
   <div class="row">
   <?php
     $sql="SELECT * FROM products,category where products.Cat_id=category.Cat_id AND cat_name='sale'";
     $select=mysqli_query($db,$sql);
    while($row1=mysqli_fetch_array($select)){
     
    ?>
   <div class="col-md-3 py-3">
   <div class="card shadow h-100 w-100">
    <form method="POST" action="book.php?pro_id=<?= $row1['pro_id'] ?>">
<img src="images/img/<?= $row1['pro_image'] ?>" alt="" class="img-thumbnail img-fluid"
 style="width:100% ; height: 250px;justify-content: center;justify-items: center;">

 <div class="card-body">
         <p>Sale Or hall Description:
         <?= $row1['pro_description'] ?> 
         </p>
         <p><b> name:<?= $row1['pro_name'] ?></b> </p>
     <span><b>Price:<?= number_format($row1['pro_price'],2) ?></b></span><span>Rwf</span>
     <input type="hidden" name="pro_name" value="<?= $row1['pro_name'] ?>"/>
     <input type="hidden" name="pro_price" value="<?= $row1['pro_price'] ?>"/>
    <div><button type="submit" name="book" class="btn bg-warning float-end btn-block">Book now</button></div>
    </form>
</div>
</div>
    </div>
    <?php
   
}
    ?>
</div>

</div>
</div>
</section>

<!-- Button trigger modal -->

<!-- Modal -->


<nav aria-label="Page navigation example ">
    <ul class="pagination">
        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li> 
        <li class="page-item"><a class="page-link" href="#">4</a></li>
        <li class="page-item"><a class="page-link" href="#">......</a></li>
        <li class="page-item"><a class="page-link" href="#">Next</a></li>
    </ul>
</nav>

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
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script type="text/javascript">
   
    $(document).ready(function(){
        $("#search_order").keyup(function(){

            var input = $(this).val();

            if(input !=""){
                $.ajax({
        url:"search.php",
        method:"POST",
           data:{input:input},
           success:function(data){
            $("#results").html(data);
            
            //alert(input);
           }
                });
            }else{
                $("#results").css("display","none");  
            }

        });
    }
    );

</script>

    </body>
    </html>
    <?php



    ?>

    