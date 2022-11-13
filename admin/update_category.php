<!DOCTYPE html>
<html lang="en">
<?php


session_start();
error_reporting(0);
include("../connection/connect.php");

if(isset($_POST['submit'] )){

	$mql = "update category set Cat_name='$_POST[cat_nam]' where Cat_id='$_GET[cat_upd]' ";
	mysqli_query($db, $mql);
			$success = 	'<div class="alert alert-success alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>Category Updated!</strong></div>';
	
    }
	

?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>Update Users</title>
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="fix-header">
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
   
        <div class="page-wrapper" style="height:1200px;">
       
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Dashboard</h3> </div>
               
            </div>
         
            <div class="container-fluid">
            
                     <div class="row">
                   
                   
					
					 <div class="container-fluid">
              
                  
									
									<?php  
									        echo $error;
									        echo $success; 
											
											
											
											?>			
								
					    <div class="col-lg-12">
                        <div class="card card-outline-primary">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Update Category</h4>
                            </div>
                            <div class="card-body">
							  <?php $ssql ="select * from category where Cat_id='$_GET[cat_upd]'";
													$res=mysqli_query($db, $ssql); 
													$newrow=mysqli_fetch_array($res);?>
                                <form action='' method='post'>
                                    <div class="form-body">
                                       
                                        <hr>
                                        <div class="row p-t-20">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Category Name</label>
                                                    <input type="text" name="cat_nam" class="form-control" value="<?=$newrow['cat_name'] ?>">
                                                   </div>
                                            </div>
                                     
                                        </div>
                              	
                                        </div>
                                       
                                        
                                       </div>
                                       
                                   </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <input type="submit" name="submit" class="btn btn-primary" value="Save"> 
                                        <a href="all_products.php" class="btn btn-inverse">Cancel</a>
                                    </div>
                                </form>
                            </div>
                            
                        </div>
                    </div>
                    
                            </div>
                        </div>
                    </div>
					
                </div>
       
            </div>
      
            <footer class="footer"> © 2022 - Online Food Ordering System </footer>
        
        </div>
      
    </div>
   
    <script src="js/lib/jquery/jquery.min.js"></script>
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script type="text/javascript">
            
        </script>

</body>

</html>