<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>All Orders</title>
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">


</head>

<body class="fix-header fix-sidebar">

    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>

    <div id="main-wrapper">

        <div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-header">
                    <a class="navbar-brand" href="dashboard.php">

                        <span><img src="../images/img/Capture.JPG" width="100" height="50" class="dark-logo" /></span>
                    </a>
                </div>
                <div class="navbar-collapse">

                    <ul class="navbar-nav mr-auto mt-md-0">




                    </ul>

                    <ul class="navbar-nav my-lg-0">



                        <li class="nav-item dropdown">

                            <div class="dropdown-menu dropdown-menu-right mailbox animated zoomIn">
                                <ul>
                                    <li>
                                        <div class="drop-title">Notifications</div>
                                    </li>

                                    <li>
                                        <a class="nav-link text-center" href="javascript:void(0);"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/bookingSystem/user-icn.png" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                                    <li><a href="../logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

        <div class="left-sidebar">

            <div class="scroll-sidebar">

                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-label">Home</li>
                        <li> <a href="dashboard.php"><i class="fa fa-tachometer"></i><span>Dashboard</span></a></li>
                        <li> <a href="all_users.php"> <span><i class="fa fa-user f-s-20 "></i></span><span>Users</span></a></li>
                        <li><a href="Add_category.php">Add Category</a></li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-archive f-s-20 color-warning"></i><span class="hide-menu">Products</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="addRoom.php">Add Products</a></li>
                                <li><a href="all_products.php">All product</a></li>
                                <li><a href="all_room.php">All room</a></li>
                                <li><a href="all_hall.php">All hall</a></li>
                                <li><a href="all_Food.php">All food</a></li>

                            </ul>
                        </li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-shopping-cart f-s-20 color-warning"></i><span class="hide-menu">Orders</span></a>
                            <ul aria-expanded="false" class="collapse">
                               <li><a href="all_orders.php">All Orders</a></li>
                                <li><a href="Completed_orders.php">All Completed Orders</a></li>
                                <li><a href="Pending.php">All Pending Orders</a></li>
                                <li><a href="Conceled.php">All Conceled Orders</a></li>
                              
                                
                            </ul>
                        </li>
                    </ul>
                </nav>

            </div>

        </div>

        <div class="page-wrapper">

<?php
$new=$_GET['order_detail'];
$payment="SELECT * FROM payments where ord_id='$new'";
$gs=mysqli_query($db,$payment);
if(mysqli_num_rows($gs) > 0){
    while($fet=mysqli_fetch_array($gs)){
        $_SESSION['Txr']=$fet['Txr'];
        $_SESSION['Pay_method']=$fet['Pay_method'];
    }
}
?>

            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">


                        <div class="col-lg-12">
                            <div class="card card-outline-primary">
                                <div class="card-header">
                                    <h4 class="m-b-0 text-white">Orders Details</h4>
                                </div>
                            <div>

                                <?php
                                
                                
                                 $sql ="SELECT * from order_details where ord_id ='$new'";
                                 $query = mysqli_query($db, $sql);
                            

                                 if (mysqli_num_rows($query) > 0) {
                                    $total_price = 0;
                                    echo "<table class='table my-3' >
                                    <tr>
                                    <th>#</th>
                                    <th>Order ID</th>
                                    <th>Quantity</th>
                                    
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Transaction Id</th>
                                    <th>Payment Method</th>
                                    <th class='text-end'>Total Price</th>
                                    </tr>
                                    ";
                                    while ($rows = mysqli_fetch_array($query)) {
                        
                                        
                                           echo "
                                            <tr>
                                            <td>" . $rows['	order_detail_id'] . "</td>
                                            <td>" . $rows['ord_id'] . "</td>
                                            <td>" . $rows['quantity'] . "</td>
            
                                            <td>" . $rows['proname'] . "</td>
                                            <td>" . $rows['order_date'] . "</td>
                                            <td>" . $_SESSION['Txr'] . "</td>
                                            <td>" . $_SESSION['Pay_method'] . "</td>
                                            <td class='text-end'>" . number_format($rows['quantity'] * $rows['price'], 2) . "Frw</td>
                                            </tr> 
        
                                            ";
        
                                                $total_price = $total_price + $rows['quantity'] * $rows['price'];

                                        }

                                    
                           
                                ?>
                                </table>
                                <table class="table my-5">
                                    <tr>
                                        <td>Total</td>
                                        <td class="text-end"><?php echo number_format($total_price, 2); ?>Frw</td>
                                    </tr>
                                    
                                </table>
                            <div class="float-right">
                                <img src="./images/download.png">
                                <img src="./images/images.png">
                            </div>
                            </div>
                            <h5 class="text-right py-5">Done by Montana Guest House</h5>
                            <button type="button" name="payment" onclick="window.print();return false;" class="btn btn-primary float-end" style="width:200px;height:50px;" data-bs-toggle="modal" data-bs-target="#payments">print</button>
                            
                   <?php    }
                   ?>
                        </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    </div>
<?php
unset( $_SESSION['Txr']);
unset( $_SESSION['Pay_method']);
?>

    <footer class="footer"> © 2022 - Online Food Ordering System</footer>

    </div>

    </div>

    <script src="js/lib/jquery/jquery.min.js"></script>
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/lib/datatables/datatables.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>

</body>

</html>