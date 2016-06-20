<?php 
include '../../connect.php';

$id = $_REQUEST['id'];

$query_delete = "DELETE FROM `home_whyus` WHERE `home_whyus`.`id` = $id";
mysql_query($query_delete) or die("Bad mysql query:$query_delete<br>Error: ".mysql_error());

header("location:home_whyUs_view.php");
 ?>