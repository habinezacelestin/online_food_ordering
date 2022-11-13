<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

mysqli_query($db,"DELETE FROM products WHERE pro_id = '".$_GET['product_del']."'");
header("location:all_products.php");  

?>