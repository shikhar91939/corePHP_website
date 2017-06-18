<?php 
  include '../../connect.php';

  if(isset($_POST['submit_team_add']))
  {
    $name = $_POST['name'];
    $bio = $_POST['bio'];
    $image_name = $_FILES['img_submitted']['name'];
    $image_type = $_FILES['img_submitted']['type'];
    $image_location = $_FILES['img_submitted']['tmp_name'];

    if(in_array($image_type, array("image/jpeg","image/png","image/gif")))
    {
      $uploadDir = "../../admin_uploads";
      if( !is_dir($uploadDir) && !mkdir($uploadDir))
        die('error in creating upload directory');

      $image_uploadName = str_replace(array(' ','-'), "_", $image_name);
      $img_uploadSrc = $uploadDir."/".$image_uploadName;
      if(!$is_uploaded = move_uploaded_file($image_location, $img_uploadSrc))
        die('error in uploading file');

      var_dump($is_uploaded);
    }
    else
      die("please provide png or jpg file only");

    $name_esc = mysql_escape_string($name);
    $bio_esc = mysql_escape_string($bio);
    $query = "INSERT INTO team(`name`,`bio`,`image_fileName`) VALUES('$name_esc','$bio_esc','$image_uploadName')";

    // var_dump($query);die;
    if(!mysql_query($query))
      die('error in sql query, error:'.mysql_error());
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

    <title>Add>Team>Add</title

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
                <h1 class="page-header">About  > Team > Add</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Add a new member's bio
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <form role="form" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Upload Picture</label>
                                        <input type="file" name="img_submitted">
                                    </div>
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input name="name" class="form-control" placeholder="John Doe">
                                    </div>
                                    <div class="form-group">
                                        <label>Bio</label>
                                        <input name="bio" class="form-control" placeholder="John handles finances and keeps account of every singe penny">
                                    </div>
                                    <button name="submit_team_add" type="submit" class="btn btn-default">Submit</button>
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