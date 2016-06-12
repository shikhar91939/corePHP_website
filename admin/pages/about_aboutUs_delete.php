<?php 
include '../../connect.php';

$id = $_REQUEST['id'];

$query_delete = "DELETE FROM about WHERE id=$id";
mysql_query($query_delete) or die("error in mysql query:$query_delete");

header("location:about_aboutUs_view.php");
 ?>