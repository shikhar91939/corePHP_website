<?php 
include '../../connect.php';

$id = $_REQUEST['id'];

$query_delete = "DELETE FROM `services` WHERE `services`.`id` = $id";
mysql_query($query_delete) or die("error in mysql query:$query_delete");

header("location:services_list_view.php");
 ?>