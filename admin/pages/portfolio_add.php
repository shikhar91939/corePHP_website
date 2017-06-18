<?php 
include '../../connect.php';

if(isset($_POST['portfolio_add']))
{
  $type = $_POST['radio_type'];
  $title = $_POST['title'];
  $description = $_POST['description'];
  $videoUrl = $_POST['videoUrl'];

  $type_esc = mysql_escape_string($type);
  $title_esc = mysql_escape_string($title);
  $description_esc = mysql_escape_string($description);
  $videoUrl_esc = mysql_escape_string($videoUrl);
  
  $image_name = $_FILES['image_submit']['name'];
  $image_type = $_FILES['image_submit']['type'];
  $image_tmp = $_FILES['image_submit']['tmp_name'];

  $imageFormats = array("image/png","image/jpeg","image/gif");

  // continue only if a file is uploaded
  if(strcmp($image_name, '')==0 && strcmp($image_type, '')==0) //this 'if'condition is true if name and type are empty
    die("Please upload an image");

  //continue only if the uploaded file is an image
  if (!in_array($image_type, $imageFormats)) 
    die('Only png, jpg and gif are accepted image formats');

  $image_uploadName = str_replace(array(" ","-"), "_", $image_name);
  $UploadDirectory = "../../admin_uploads/";
  if( !is_dir($UploadDirectory) && !mkdir($UploadDirectory))
    die('error in creating upload directory');
  move_uploaded_file($image_tmp, $UploadDirectory.$image_uploadName)
    or die("Error in uploading file");

  $query_addPortfolio = 
  "INSERT INTO `portfolio_items`(`type`, `title`, `description`, `image_name`, `video_url`)
   VALUES('$type_esc', '$title_esc', '$description_esc', '$image_uploadName', '$videoUrl_esc')";
  // echo "query";
  // var_dump($query_addPortfolio);die;
  
  mysql_query($query_addPortfolio) 
    or die("error in query: $query_addPortfolio"."<br>Error: ".mysql_error());

  header("location:portfolio_view.php");
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

    <title>Services> List Of Services >Add</title>

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
                <h1 class="page-header">Portfolio > Add Item</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Add A New Portfolio Item
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <form role="form" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Type</label>
                                        <div class="radio">
                                                <label> <input type="radio" name="radio_type" id="radio_option1" value="radio_webDesign" checked="">Web Design</label>
                                                <label> <input type="radio" name="radio_type" id="radio_option2" value="radio_logoDesign">Logo Design</label>
                                                <label> <input type="radio" name="radio_type" id="radio_option2" value="radio_printDesign">Print Design</label>
                                          </div>
                                        <label>Title</label>
                                        <input name="title" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="description" class="form-control" rows="4"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Upload Image</label>
                                        <input type="file" name="image_submit" >
                                    </div>
                                    <div class="form-group">
                                        <label>Video URL</label><span> (Optional)</span>
                                        <input type="text" name="videoUrl" class="form-control">
                                    </div>
                                    <button name="portfolio_add" type="submit" class="btn btn-default">Submit</button>
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