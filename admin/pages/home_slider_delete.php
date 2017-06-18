<?php 
include '../../connect.php';

$id = $_REQUEST['id'];

$query_delete = "DELETE FROM `home_slider` WHERE `home_slider`.`id` = $id";
mysql_query($query_delete) or die("error in mysql query: $query_delete");

header("location:home_slider_view.php");
 ?>