<?php
include("../connection/connect.php");
error_reporting(1);
session_start();
mysqli_query($db,"UPDATE users_orders SET status='Completed' WHERE ord_id = '".$_GET['order_upd']."'");
header("location:all_orders.php");  

?>