<?php 

include '../../connect.php';

$id = $_REQUEST['id'];
$query = "SELECT * FROM about WHERE id=$id";

$result = mysql_query($query) or die('error in sql query: '.$query);
$row = mysql_fetch_array($result);

if(isset($_POST["submit_about_edit"]))
{
  $title_new = $_POST['title'];
  $descr_new = $_POST['description'];

  $query_updateDB = "UPDATE `about` SET title='$title_new', description='$descr_new' WHERE `about`.id=$id";
  mysql_query($query_updateDB) or die("Error in query: $query_updateDB");
  header("location:about_aboutUs_view");


}
 ?>


<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add About Us</title>

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


<div id="wrapper">fsd
cx

    <!-- Navigation -->
    <?php include 'navBars.php'; ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">About  > About Us > Edit</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Editing Row Id <?php echo $id; ?>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <form method="post">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input name="title" class="form-control" value=<?php echo $row['title']; ?>>
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <?php $description =$row['description']; ?>
                                        <textarea name="description" class="form-control" rows="3"><?php echo str_replace('"', '&quot;', $description); ?></textarea>
                                    </div>
                                    <button name="submit_about_edit" type="submit" class="btn btn-default">Submit</button>
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