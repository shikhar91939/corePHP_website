<?php 
include '../../connect.php';

$id = $_REQUEST['id'];

$query_delete = "DELETE FROM `portfolio_items` WHERE `portfolio_items`.`id` = $id";
mysql_query($query_delete) or die("Bad mysql query:$query_delete<br>Error: ".mysql_error());

header("location:portfolio_view.php");
 ?>