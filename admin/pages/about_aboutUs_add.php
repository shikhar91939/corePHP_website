<?php 
  include '../../connect.php';

  if(isset($_POST['submit_about_add']))
  {
    $title = $_POST['title'];
    $descr = $_POST['descr'];

    $title = mysql_escape_string($title);
    $descr = mysql_escape_string($descr);
    $query = "INSERT INTO about(`title`,`description`) VALUES('$title','$descr')";

    if(!mysql_query($query))
      die('error in sql query');
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add>About Us>Add</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>


<div id="wrapper">

    <!-- Navigation -->
    <?php include 'navBars.php'; ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">About  > About Us > Add</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Add A Paragraph On About Page
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <form role="form" method="post">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input name="title" class="form-control" placeholder="Example: Our Vision">
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <input name="descr" class="form-control" placeholder="Example: To be the premier and preferred provider of Technology Enabled and Business Process Outsourcing services in our chosen markets.">
                                    </div>
                                    <button name="submit_about_add" type="submit" class="btn btn-default">Submit</button>
                                </form>
                            </div>
                            <!-- /.col-lg-6 (nested) -->
                            <!-- <div class="col-lg-6">deleted all contents of right column</div> -->
                            <!-- /.col-lg-6 (nested) -->
                        </div>
                        <!-- /.row (nested) -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../dist/js/sb-admin-2.js"></script>
</body>
</html>