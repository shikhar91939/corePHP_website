<?php 
include '../../connect.php';

$id = $_REQUEST['id'];
$query_getEditRow = "SELECT * FROM team WHERE id=$id";
if(!$result_getEditRow = mysql_query($query_getEditRow))
  die("error in mysql query.<br>Error: ".mysql_error());
$row_beforeEditing = mysql_fetch_array($result_getEditRow);

if(isset($_POST['submit_team_edit']))
{

  $name = $_POST['name'];
  $bio = $_POST['bio'];

  $name_esc = mysql_escape_string($name);
  $bio_esc = mysql_escape_string($bio);

  $image_name = $_FILES['img_submitted']['name'];
  $image_type = $_FILES['img_submitted']['type'];
  $image_location = $_FILES['img_submitted']['tmp_name'];

  // IF- the user uploads an image, try to save image. 
  // ELSE- use the query to update name and bio only.
  if(strcmp($image_name, '')!=0 && strcmp($image_type, '')!=0) 
  {
    //this block is executed if name and type are not empty
    // as strcmp() returns 0 if arguments match
    if(!in_array($image_type, array("image/jpeg","image/png","image/gif")))
      die("please provide png, jpg or gif file only");
    else
    {
      $uploadDir = "../../admin_uploads";
      if( !is_dir($uploadDir) && !mkdir($uploadDir))
        die('error in creating upload directory');

      $image_uploadName = str_replace(array(' ','-'), "_", $image_name);
      $img_uploadSrc = $uploadDir."/".$image_uploadName;
      if(!$is_uploaded = move_uploaded_file($image_location, $img_uploadSrc))
        die('error in uploading file');

      $query_edit = 
      "UPDATE `team` 
      SET `name`='$name_esc',`bio`='$bio_esc',`image_fileName`='$image_uploadName' 
      WHERE `team`.`id` = $id";
    }
  }
  else// else use the query to update name and bio only. (leave the image as it is)
  {

    $query_edit = 
    "UPDATE `team` 
    SET `name` = '$name_esc', `bio` = '$bio_esc' 
    WHERE `team`.`id` = $id";
  }


    // var_dump($query);die;
    if(!mysql_query($query_edit))// $query_edit's content depends on the above else
    die('error in sql query, error:'.mysql_error());
    header("location:about_team_view.php");
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

    <title>About>Team>Edit</title

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
                <h1 class="page-header">About  > About Us > Edit</h1>
              </div>
              <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
              <div class="col-lg-12">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    Editing member named <?php echo "<strong>" . $row_beforeEditing['name'] 
                    . "</strong>, with Databse ID " . $row_beforeEditing["id"]; ?>
                  </div>
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-lg-6">
                        <form role="form" method="post" enctype="multipart/form-data">
                          <div class="form-group">
                            <label>Picture</label><br>
                            <span><img style="max-width:120px" src="<?php echo '../../admin_uploads/'.$row_beforeEditing['image_fileName']; ?>"></span>
                            <input type="file" name="img_submitted">
                          </div>
                          <div class="form-group">
                            <label>Title</label>
                            <input name="name" class="form-control" value="<?php echo $row_beforeEditing['name']; ?>">
                          </div>
                          <div class="form-group">
                            <label>Bio</label>
                            <input name="bio" class="form-control" value="<?php  echo $row_beforeEditing['bio']; ?>">
                          </div>
                          <button name="submit_team_edit" type="submit" class="btn btn-default">Submit</button>
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