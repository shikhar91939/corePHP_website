<?php 
  include '../../connect.php';

  if(isset($_POST['home_slider_add']))
  {
    $caption = $_POST['caption'];
    $image_name = $_FILES['bannerImage']['name'];
    $image_type = $_FILES['bannerImage']['type'];
    $image_location = $_FILES['bannerImage']['tmp_name'];

    // proceed only if the given file is an image
    if(!in_array($image_type, array("image/jpeg","image/png","image/gif")))
      die("please provide png or jpg file only");

    // quit if directory doesn't exist and cannot be created
    $uploadDir = "../../admin_uploads/";
    if( !is_dir($uploadDir) && !mkdir($uploadDir))
      die('error in creating upload directory');

    //move file from temporary to upload directory. die in case of error
    $image_uploadName = str_replace(array(' ','-'), "_", $image_name);
    $img_uploadSrc = $uploadDir.$image_uploadName;
    if(!$is_uploaded = move_uploaded_file($image_location, $img_uploadSrc))
      die('error in uploading file');

    $image_uploadName_esc = mysql_escape_string($image_uploadName);
    $caption_esc = mysql_escape_string($caption);
    $query_addSlider = "INSERT INTO home_slider(`image_name`,`caption_text`) VALUES('$image_uploadName_esc', '$caption_esc')";

    // var_dump($query_addSlider);die;
    if(!mysql_query($query_addSlider))
      die('error in sql query, error:'.mysql_error());

    header("location:home_slider_view.php");
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

    <title>Home > Slider > Add</title>

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
                <h1 class="page-header">Home > Slider > Add</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Add A New Slider Banner
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <form role="form" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Image</label>
                                        <input name="bannerImage" type="file" >
                                    </div>
                                    <div class="form-group">
                                        <label>Caption</label>
                                        <textarea name="caption" class="form-control" rows="3"></textarea>
                                    </div>
                                    <button name="home_slider_add" type="submit" class="btn btn-default">Submit</button>
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