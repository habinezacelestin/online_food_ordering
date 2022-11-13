<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();




if(isset($_POST['submit']))          
{
	
			
		
			
		  
		
		
		if(empty($_POST['room_name'])||empty($_POST['room_desc'])||$_POST['price']=='')
		{	
											$error = 	'<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>All fields Must be Fillup!</strong>
															</div>';
									
		
								
		}
	else
		{
		
				$fname = $_FILES['file']['name'];
								$temp = $_FILES['file']['tmp_name'];
								$fsize = $_FILES['file']['size'];
								$extension = explode('.',$fname);
								$extension = strtolower(end($extension));  
								$fnew = uniqid().'.'.$extension;
   
								$store = "../images/img/".basename($fnew);                    
	
					if($extension == 'jpg'||$extension == 'png'||$extension == 'gif' )
					{        
									if($fsize>=2000000)
										{
		
		
												$error = 	'<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>Max Image Size is 1024kb!</strong> Try different Image.
															</div>';
	   
										}
		
									else
										{
												if($_POST['room_type']){
												
				                                 
												$sql = "INSERT INTO products(Cat_id,pro_name,pro_type,pro_description,pro_image,pro_price) VALUES('".$_POST['room_category']."','".$_POST['room_name']."','".$_POST['room_type']."','".$_POST['room_desc']."','".$fnew."','".$_POST['price']."')";  // store the submited data ino the database :images
												mysqli_query($db, $sql); 
												move_uploaded_file($temp, $store);
			  
													$success = 	'<div class="alert alert-success alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																 New Room Added Successfully.
															</div>';
                
	
										}
                                        elseif($_POST['room_type1']){
												
                                            $_POST['room_type']=$_POST['room_type1'];
                    
                                         
                                        $sql = "INSERT INTO products(Cat_id,pro_name,pro_type,pro_description,pro_image,pro_price) VALUES('".$_POST['room_category']."','".$_POST['room_name']."','".$_POST['room_type']."','".$_POST['room_desc']."','".$fnew."','".$_POST['price']."')";  // store the submited data ino the database :images
                                        mysqli_query($db, $sql); 
                                        move_uploaded_file($temp, $store);
      
                                            $success = 	'<div class="alert alert-success alert-dismissible fade show">
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                         New Room Added Successfully.
                                                    </div>';
        

                                }
                                elseif($_POST['room_type2']){
												
                                    $_POST['room_type']=$_POST['room_type2'];
            
                                 
                                $sql = "INSERT INTO products(Cat_id,pro_name,pro_type,pro_description,pro_image,pro_price) VALUES('".$_POST['room_category']."','".$_POST['room_name']."','".$_POST['room_type']."','".$_POST['room_desc']."','".$fnew."','".$_POST['price']."')";  // store the submited data ino the database :images
                                mysqli_query($db, $sql); 
                                move_uploaded_file($temp, $store);

                                    $success = 	'<div class="alert alert-success alert-dismissible fade show">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                 New Room Added Successfully.
                                            </div>';


                        }
                        elseif($_POST['room_type3']){
												
                            $_POST['room_type']=$_POST['room_type3'];
    
                         
                        $sql = "INSERT INTO products(Cat_id,pro_name,pro_type,pro_description,pro_image,pro_price) VALUES('".$_POST['room_category']."','".$_POST['room_name']."','".$_POST['room_type']."','".$_POST['room_desc']."','".$fnew."','".$_POST['price']."')";  // store the submited data ino the database :images
                        mysqli_query($db, $sql); 
                        move_uploaded_file($temp, $store);

                            $success = 	'<div class="alert alert-success alert-dismissible fade show">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                         New Product Added Successfully.
                                    </div>';


                }
                                    }
					}
					elseif($extension == '')
					{
						$error = 	'<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>select image</strong>
															</div>';
					}
					else{
					
											$error = 	'<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>invalid extension!</strong>png, jpg, Gif are accepted.
															</div>';
						
	   
						}               
	   
	   
	   }



	
	
	

}

?>
<style>
    
    </style>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>Add product</title>
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
                        
                        <span><img src="images/icn.png" alt="homepage" class="dark-logo" /></span>
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
                <!-- Start Page Content -->
                  
									
									
				<?php  
									        echo $error;
									        echo $success;
                                             ?>
									
									
								
                                    <div class="col-lg-12">
                        <div class="card card-outline-primary">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Add Product</h4>
                            </div>
                            <div class="card-body">
                                <form action='' method='post'  enctype="multipart/form-data">
                                    <div class="form-body">
                                       
                                        <hr>
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Product Name</label>
                                                    <input type="text" name="room_name" class="form-control" >
                                                   </div>
                                            </div>
                                      
                                            <div class="col-md-6">
                                                <div class="form-group has-danger">
                                                    <label class="control-label">Product Description</label>
                                                    <input type="text" name="room_desc" class="form-control form-control-danger" >
                                                    </div>
                                            </div>
                                     
                                        </div>
                                  
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Price </label>
                                                    <input type="text" name="price" class="form-control">
                                                   </div>
                                            </div>
                                   
                                            <div class="col-md-6">
                                                <div class="form-group has-danger">
                                                    <label class="control-label">Image</label>
                                                    <input type="file" name="file"  id="lastName" class="form-control form-control-danger" placeholder="12n">
                                                    </div>
                                            </div>
                                        </div>
                              
										
                                  
                                        <div class="row">
                                        
											 <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Product category</label>
													<select name="room_category" class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" id="" onchange="enableCategory(this)">
                                                        <option value="" >--Select Product category--</option>
                            
                                                  <?php 
                                                  $ssql ="select * from category";
													$res=mysqli_query($db, $ssql); 
													while($row=mysqli_fetch_array($res))  
													{ ?>
            
													<option value="<?=$row['Cat_id']?>"><?=$row['cat_name']?></option>
                                                    
                                                    <?php
                                                    }   
                                                 
													?> 
													 </select>
                                                </div>
                                            </div>
											
											
											
                                        </div>
                                        <div class="row ">
                                        
                                        <div class="col-md-12">
                                           <div class="form-group">
                                               <label class="control-label">Product_type</label>
                                               <select name="room_type" class="form-control custom-select d-none" data-placeholder="Choose a Category" tabindex="1" id="proType">
                                                   <option value="" >--Select room type--</option>
                                                   <option  >Normal room</option>
                                                   <option  >V.I.P</option>
                                                   <option  >V.V.I.P</option>
                                                </select>
                                                <select name="room_type1" class="form-control custom-select d-none" data-placeholder="Choose a Category" tabindex="1" id="foodType">
                                                   <option value="" >--Select sale type--</option>
                                                   <option  >Wedding sale</option>
                                                   <option  >Meeting Hall</option>
                                                </select>
                                                <select name="room_type2" class="form-control custom-select d-none" data-placeholder="Choose a Category" tabindex="1" id="saleType">
                                                   <option value="" >--Select food type--</option>
                                                   <option  >Breakfast Menu</option>
                                                   <option  >Brunch Menu</option>
                                                   <option  >Luncheon Menu</option>
                                                   <option  >Afternoon and High Tea Menu</option>
                                                   <option  >Dinner Menu</option>
                                                   <option  >Super Menu</option>
                                                   <option  >Room Service Menu</option>
                                                </select>
                                           </div>
                                       </div>
                                       
                                   </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <input type="submit" name="submit" class="btn btn-primary" value="Save"> 
                                        <a href="addRoom.php" class="btn btn-inverse">Cancel</a>
                                    </div>
                                </form>
                            </div>
                            
                        </div>
                    </div>
                    
                    <footer class="footer"> © 2022 - Online Food Ordering System </footer>
                </div>               
            </div>
        </div>    <script type="text/javascript">
            function enableCategory(answer){
                console.log(answer.value);
            if(answer.value==1){
document.getElementById('proType').classList.remove('d-none');
            }
            else{
                document.getElementById('proType').classList.add('d-none');  
            }
            if(answer.value==2){
document.getElementById('foodType').classList.remove('d-none');
            }
            else{
                document.getElementById('foodType').classList.add('d-none');  
            }
            if(answer.value==3){
document.getElementById('saleType').classList.remove('d-none');
            }
            else{
                document.getElementById('saleType').classList.add('d-none');  
            }
        };

        </script>
    </div>
  
    <script src="js/lib/jquery/jquery.min.js"></script>
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="js/custom.min.js"></script>

</body>

</html>