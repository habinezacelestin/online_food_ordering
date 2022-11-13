
<?php 
session_start();
include('connection/connect.php');
if(isset($_POST['book'])){
  $quantity=1;
  $status="Pending";
  if(!isset($_SESSION['user_id'])){
    header('location:login.php');
  } else{
    $_SESSION['orde_id']= date("mdGis");
  $order_id = date("mdGis");
   $mql ="INSERT INTO users_orders(ord_id,u_id,name,no_products,total_price,status) VALUES($order_id,'".$_SESSION['user_id']."','".$_POST['pro_name']."','".$quantity."','".$_POST['pro_price']."','".$status."')";
   $order2=mysqli_query($db, $mql);
  
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css"
    integrity="sha512-BnbUDfEUfV0Slx6TunuB042k9tuKe3xrD6q4mg5Ed72LTgzDIcLPxg6yI2gcMFRyomt+yJJxE+zJwNmxki6/RA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.core.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.theme.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/check.css">
    <title>checkout </title>
  </head>
  <body>
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
                <li class="nav-item dropdown ms-5">
                <?php
           $user="SELECT * FROM users";
              $ms=mysqli_query($db,$user);
               
               foreach($ms as $row){

               }
               ?>
    <a data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><i class="fas fa-user-circle fs-3"></i></a><br><?php echo $row['f_name']." ". $row['l_name'] ?>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="">Update Profile</a></li>
      <li><a class="dropdown-item" href="logout.php">Logout</a></li>
</ul>
</li>

            </ul>
            </div>
        </div>
    </nav>
  <section>
  <div class="container check">
  <div class="row">
  <h4 class="text-center"> Payment Details</h4>
  <hr>
    <div class="col-md-7">
        <h6 class="text-center"> Personal information</h6>
        <form method="POST" action="pay.php">
        <div class="mb-3">
    <label for="first_name" class="form-label" >First Name</label>
    <input type="text" class="form-control" name="fname" value="<?php echo $row['f_name'] ?>">
  </div>
  <div class="mb-3">
    <label for="last_name" class="form-label">Last Name</label>
    <input type="text" class="form-control" name="lname" value="<?php echo $row['l_name'] ?>">
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label> 
    <input type="email" class="form-control" name="email" value="<?php echo $row['email'] ?>">
  </div>
  <div class="mb-3">
    <label for="phone" class="form-label" >Phone</label>
    <input type="text" class="form-control"name="phone" value="<?php echo $row['phone'] ?>">
  </div>
</div>
    <div class="col-md-3">
    <h6 class="text-center"> Product Going to be paid</h6>
    <div class="float-end">
        
     <?php
     
            $output ="";
            $output .="<table class='table my-3'>
            <tr>
            <th></th>
            <th></th>
            <th></th>
            <th class='text-end'>Total Price</th>
            
            </tr>
            "; 
              
      
            $_SESSION['pro_price']=$_POST['pro_price'];     
$output .= "
    <tr>
<td>".$_POST['pro_name']."</td>
<td></td>
<td></td>
<td class='text-end'>".$_POST['pro_price']."Frw</td>
</tr> 


";   
echo $output;
?>
        </table>
        <table class="table my-5">
        <tr>
<td>Total</td>
<td class="text-end"><?php echo number_format($_POST['pro_price'],2);?>Frw</td>

        </tr>
        </table>
        </div>
        <button type="button" name="payment" class="btn btn-primary float-end" style="width:200px;height:50px; "data-bs-toggle="modal" data-bs-target="#staticBackdrop">Pay Now</button>    
</form>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Momo Payment method</h5>
        <form action="" method="POST">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
    <label for="phone" class="form-label" >Phone With Mobile Money or Airtel Money</label>
    <input type="text" class="form-control" name="phone" required>
  </div>

      </div>
      <div class="d-flex">
      <img src="projects/../images/img/download.png" height="150px"; width="200px"; class="ms-3">
      <img src="projects/../images/img/images.png"height="150px"; width="200px"; class="ms-3">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="Book" class="btn btn-primary">Proceed</button>
      </div>
    </div>
    </form>
    </div>
  </div>
</div>
<!--  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>

<?php
  }
}
            
            if(isset($_POST['Book']))
            {
    $trx=uniqid("Momo_");
    $pay_method="Mobile Money";
    $_SESSION['pro_price'];
    $p_phone=$_POST['phone'];
    $mql2 = "INSERT INTO payments(u_id,ord_id,Pay_method,phone_pay,Txr,pay_amount) VALUES('".$_SESSION['user_id']."','".$_SESSION['orde_id']."','".$pay_method."','".$p_phone."','".$trx."','".$_SESSION['pro_price']."')";
	   $order2=mysqli_query($db, $mql2);

      if($order2){
        $data = array(
          "telephoneNumber" =>'25'.$p_phone,
          "amount" => $_SESSION['pro_price'],
          "organizationId" => 'e8f3a6da-dda2-429f-8cfb-935fc996a7f5',
          "description" => 'Your payment have been successfully',
          "callbackUrl" => "http://myonlineprints.com/payments/callback",
          "transactionId" => ".$trx"
      
        );
        $headers = array(
          "Content-Type" => "application/json",
          "Accept" => "application/json",
          "Host" => "localhost:8080",
          "Content-Length" => 290
        );
        $url = "https://opay-api.oltranz.com/opay/paymentrequest";
        $data = http_build_query($data);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $headers);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $result = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if( $result){ 
        echo "<script>
   //window.location ='service.php';
   $.jGrowl('your order has been paid', {
     header: 'added'
   });
 </script>";
        }
        else{
          echo "<script type='text/javascript'>alert('payment Failed')</script>";
        }
        //unset session
         unset($_SESSION['shop_cart']);
        echo "<script type='text/javascript'>document.location='service.php';</script>";

     ?>
     <script>

      alert("done")
     </script>
     
     <?php
       
  }
}


?>
