<!DOCTYPE html>
<html lang="en">

    <head>
        <?php include'connect.php' ?>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Andia - Responsive Agency Template</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Droid+Sans">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lobster">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/animate.css">
        <link rel="stylesheet" href="assets/css/magnific-popup.css">
        <link rel="stylesheet" href="assets/flexslider/flexslider.css">
        <link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/media-queries.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

    </head>

    <body>

        <!-- Top menu -->
        <?php include 'header.php'; ?>

        <!-- Page Title -->
        <div class="page-title-container">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 wow fadeIn">
                        <i class="fa fa-tasks"></i>
                        <h1>Services /</h1>
                        <p>Here are the services we offer</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Services Full Width Text -->
        <div class="services-full-width-container">
          <div class="container">
              <div class="row">
                  <div class="col-sm-12 services-full-width-text wow fadeInLeft">
                      <h3>Lorem Ipsum Dolor Sit Amet</h3>
                      <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et. 
                        Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper <span class="violet">suscipit lobortis</span> 
                        nisl ut aliquip ex ea commodo consequat. Lorem ipsum <strong>dolor sit amet</strong>, consectetur adipisicing elit, 
                        sed do eiusmod tempor incididunt ut labore et. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper 
                        suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipisicing elit, 
                        sed do <strong>eiusmod tempor</strong> incididunt.
                    </p>
                  </div>
              </div>
          </div>
        </div>

        <!-- Services -->
        <div class="services-container">
          <div class="container">
            <div class="row">
              <?php 
                $query_getServices = "SELECT * FROM `home_whyUs`";
                ($whyUs_sqlTable = mysql_query($query_getServices))
                  or die('Error in mySQL query: '.mysql_error());
               ?>
                <?php while($whyUs_row=mysql_fetch_array($whyUs_sqlTable)) : ?>
                  <div class="col-sm-3">
                    <div class="service wow fadeInUp" style="height:252px; ">
                      <div class="service-icon">
                     <img src="admin_uploads/<?php echo $whyUs_row['image_name']; ?>" alt="" data-at2x="admin_uploads/<?php echo $whyUs_row['image_name']; ?>" style="max-height:85px"/>
                     </div>
                     <h3><?php echo $whyUs_row['title']; ?></h3>
                     <div style="height:60px"><p><?php echo $whyUs_row['description']; ?></p></div>
                     <a class="big-link-1" href="services.html">Read more</a>
                   </div>
                 </div>
                 <?php endwhile;?>
              </div>
          </div>
        </div>

        <!-- Services Half Width Text -->
        <div class="services-half-width-container">
          <div class="container">
              <div class="row">
              <?php 
                $query_getServices = "SELECT * FROM services";
                
                if(!$result = mysql_query($query_getServices))
                  die("error in mysql query: $query_getServices");

                while($row = mysql_fetch_array($result)):
               ?>
                  <div class="col-sm-6 services-half-width-text wow fadeInLeft">
                      <h3><?php echo $row['topic']; ?></h3>
                      <p><?php echo $row['description']; ?></p>
                  </div>
                <?php endwhile; ?>
              </div>
          </div>
        </div>

        <!-- Call To Action -->
        <div class="call-to-action-container">
          <div class="container">
              <div class="row">
                  <div class="col-sm-12 call-to-action-text wow fadeInLeftBig">
                      <p>
                        Lorem ipsum <span class="violet">dolor sit amet</span>, consectetur adipisicing elit, 
                        sed do eiusmod tempor incididunt ut labore et ut wisi.
                      </p>
                      <div class="call-to-action-button">
                          <a class="big-link-3" href="#">Try It Now!</a>
                      </div>
                  </div>
              </div>
          </div>
        </div>

        <!-- Footer -->
        <?php include 'footer.php'; ?>

        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/retina-1.1.0.min.js"></script>
        <script src="assets/js/jquery.magnific-popup.min.js"></script>
        <script src="assets/flexslider/jquery.flexslider-min.js"></script>
        <script src="assets/js/jflickrfeed.min.js"></script>
        <script src="assets/js/masonry.pkgd.min.js"></script>
        <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        <script src="assets/js/jquery.ui.map.min.js"></script>
        <script src="assets/js/scripts.js"></script>

    </body>

</html>