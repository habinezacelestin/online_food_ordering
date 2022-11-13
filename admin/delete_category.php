<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

mysqli_query($db,"DELETE FROM category WHERE Cat_id = '".$_GET['cat_del']."'");
header("location:Add_category.php");  

?>
