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
    <title>All Users</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css"
    integrity="sha512-BnbUDfEUfV0Slx6TunuB042k9tuKe3xrD6q4mg5Ed72LTgzDIcLPxg6yI2gcMFRyomt+yJJxE+zJwNmxki6/RA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="fix-header fix-sidebar">
 
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
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
                    <li> <a href="all_users.php">  <span><i class="fa fa-user f-s-20 "></i></span><span>Users</span></a></li>
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
     
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        
                        <div class="col-lg-12">
                        <div class="card card-outline-primary">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">View Completed Orders</h4>
                            </div>
                            <form action="" method="GET">
                            <div class="row my-3 input-daterange">
                                <div class="col-md-4">
                                <label>Start Date</label>
                                <input type="date" name="start_date" id="start_date" value="<?php if($_GET['start_date']){echo $_GET['start_date']; }?>"class="form-control" />
                                </div>
                                <div class="col-md-4">
                                <label>End Date</label>
                                <input type="date" name="end_date" id="end_date" value="<?php if($_GET['end_date']){echo $_GET['end_date']; }?>" class="form-control" />
                                </div>
                                <div class="col-md-4 my-4">
                                <button type="submit" name="search" class="btn btn-info">Search</button>
                                </div>
                           
                            </div>
                            </form>
                                <div class="table-responsive m-t-40">
                                    <table id="order_data" class="table table-bordered table-striped table-hover">
                                    <thead class="thead-dark">
                                            <tr>
                                            <th>Order ID</th>
                                                <th>User Id</th>
                                                <th>Item Number/Name</th>
                                                <th>Price (Rwf)</th>
                                                <th>Status</th>
                                                <th>Order Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
											
											 <?php
                                             if(isset($_GET['start_date']) && isset($_GET['end_date'])){
                                                $start=$_GET['start_date'];
                                                $end=$_GET['end_date'];

                                                $sql1="SELECT * FROM users_orders WHERE date BETWEEN '$start' AND '$end' AND status='Completed' ORDER BY date DESC"; 
                                            
												
												 $query=mysqli_query($db,$sql1);
												
													if(mysqli_num_rows($query) > 0 )
														{
																	
																	foreach($query as $rows)
																		{
																			
																					echo ' <tr><td>'. $rows['ord_id'] . '</td>
                                                                                             <td>'. $rows['u_id'] . '</td>';
                                                                                             if($rows['name']!=null)
                                                                                                {
                                                                                                    echo  '<td>'
                                                                                                    . $rows['name'] .

                                                                                                    '</td>'; 
                                                                                                }
                                                                                                else{
                                                                                                echo  '<td>'
                                                                                                    . $rows['no_products'] .

                                                                                                    '</td>'; 
                                                                                                }
                                                                                            echo'  <td>'. $rows['total_price'] . '</td>
                                                                                              <td>' . $rows['status'] . '</td>
                                                                                              <td>'. $rows['date'] . '</td>
                                                                                              
															
																									 </tr>';
																		}	
                                                                    }
                                                                    else{
                                                                        echo"No record found";
                                                                    }
														}
											?> 
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
						 </div>
                      
                            </div>
                        </div>
                    </div>
                </div>
             
            </div>
            <footer class="footer"> © 2022 - Online Food Ordering System</footer>
           
        </div>
     
    </div>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
    <script src="js/lib/jquery/jquery.min.js"></script>>
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="js/custom.min.js"></script>
  
    
</body>

</html>