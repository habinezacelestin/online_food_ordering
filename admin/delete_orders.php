<?php
include("../connection/connect.php");
error_reporting(1);
session_start();
mysqli_query($db,"UPDATE users_orders SET status='Rejected' WHERE ord_id = '".$_GET['order_del']."'");
header("location:all_orders.php");  

?>