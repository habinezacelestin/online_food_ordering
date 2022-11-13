<?php
session_start();
//session_destroy();
$session_array=array();  
$count=0;
include("connection/connect.php");
if(filter_input(INPUT_POST,'add_to_cart')) {
    if(isset($_SESSION['shop_cart'])){
       
 $count = count($_SESSION['shop_cart']);
$session_array = array_column($_SESSION['shop_cart'],'pro_id');
 if(!in_array(filter_input(INPUT_GET,'pro_id'),$session_array)){ 
    $_SESSION['shop_cart'][$count] = array(
        'pro_id' => filter_input(INPUT_GET,'pro_id'),
        'pro_name' => filter_input(INPUT_POST,'pro_name'),
        'pro_price' => filter_input(INPUT_POST,'pro_price'),
        'quantity' => filter_input(INPUT_POST,'quantity')      
    );
 }
 else{
    for($i = 0; $i < count($session_array); $i++){
        if($session_array[$i] == filter_input(INPUT_GET,'pro_id')){
            $_SESSION['shop_cart'][$i]['quantity'] += filter_input(INPUT_POST,'quantity');
        }
    }
 }
}
else{

 $_SESSION['shop_cart'][0] = array(
            'pro_id' => filter_input(INPUT_GET,'pro_id'),
            'pro_name' => filter_input(INPUT_POST,'pro_name'),
            'pro_price' => filter_input(INPUT_POST,'pro_price'),
            'quantity' => filter_input(INPUT_POST,'quantity')      
        );
        
    }
    header('location:service.php');
} 




?>

<html lang="en">
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
    
</head>
<body class="mx-1">
             <!-- Navbar within navlink -->
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
                    <a href="cart.php" class="nav-link text-dark"> <i class="fas fa-shopping-cart"></i></a>
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

<div class=" container cart">
    <h2 class=" text-center my-5">Products added to cart</h2>
<?php
$output ="";
$total_price = 0;
$output .="<table class='table table-bordered table-striped my-3'>
<tr>
<th>ID</th>
<th>ITEM NAME</th>
<th>QUANTITY</th>
<th>UNIT PRICE</th>
<th>TOTAL</th>
<th>ACTION</th>
</tr>
";


if(!empty($_SESSION['shop_cart'])){

    
    
    foreach($_SESSION['shop_cart'] as $key => $value) 
    {

   $output .= "
        <tr>
<td>".$value['pro_id']."</td>
<td>".$value['pro_name']."</td>
<td>".$value['quantity']."</td>
<td>".$value['pro_price']."</td>
<td>".number_format($value['quantity']* $value['pro_price'],2)."Frw</td>
<td>
<a href='cart.php?action=remove&pro_id=".$value['pro_id']."'><button class='btn btn-danger btn-block'>Remove</button></a>
</td>
</tr> 

";

$total_price = $total_price + $value['quantity'] * $value['pro_price'];
    
    
}
    
    
}

echo $output;
?>
</table>
<table class=" table table-bordered">
<tr> 
    <td colspan='3'>Total Price</td>
    <td ><?php echo number_format($total_price,2);?>Frw</td>
    <td>
<a href='cart.php?action=clearAll'><button class='btn btn-warning btn-block'>Empty cart</button></a>
</td>
    </tr>
 
    </table>
    <a href='service.php' class="btn bg-warning my-4">Continue to buy</a>
     <a href='checkout.php?action=checkout&pro_id="<?=$value['pro_id']?>"' class="btn bg-warning float-end my-4">Checkout</a>
</div>


<?php
if(isset($_GET['action'])){
    if($_GET['action']=='clearAll'){
        unset($_SESSION['shop_cart']);
    }
    if($_GET['action']=='remove'){
        foreach($_SESSION['shop_cart'] as $key => $value){
            if($value['pro_id'] == $_GET['pro_id']){
                unset($_SESSION['shop_cart'][$key]);
            }
        }
    }
}
?>

      

<script src="bootstrap/js/bootstrap.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/glide.min.js"></script>
     <script src="js/swiper-bundle.min.js"></script>

     <!-- JavaScript -->
     <script src="js/script.js"></script>
     <script src="js/slide.js"></script>
</body>
</html>