<?php 
  include 'connect.php';

  $arr_typeToCssClass = array(
    "radio_webDesign" => "portfolio-box web-design",
    "radio_logoDesign" => "portfolio-box logo-design",
    "radio_printDesign" => "portfolio-box print-design");

  $query_getPortfolioItems = "SELECT * FROM portfolio_items";
  $sqlTable_portfolioItems = mysql_query($query_getPortfolioItems);
  if(!$sqlTable_portfolioItems)
    die("bad sql query: ".$sqlTable_portfolioItems."<br>Error: ".mysql_error());
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        
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
                        <i class="fa fa-camera"></i>
                        <h1>Portfolio /</h1>
                        <p>Here is the work we've done so far</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Portfolio -->
        <div class="portfolio-container">
          <div class="container">
              <div class="row">
                <div class="col-sm-12 portfolio-filters wow fadeInLeft">
                  <a href="#" class="filter-all active">All</a> / 
                  <a href="#" class="filter-web-design">Web Design</a> / 
                  <a href="#" class="filter-logo-design">Logo Design</a> / 
                  <a href="#" class="filter-print-design">Print Design</a>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12 portfolio-masonry">

<!--                     <div class="portfolio-box logo-design">
                      <div class="portfolio-box-container">
                        <img class="portfolio-video" src="assets/img/portfolio/work5.jpg" alt="" data-at2x="assets/img/portfolio/work5.jpg" 
                                          data-portfolio-video="https://www.youtube.com/watch?v=tFTLxkMmY4M">
                        <i class="portfolio-box-icon fa fa-play"></i>
                        <div class="portfolio-box-text">
                          <h3>Consectetur Logo</h3>
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
                        </div>
                      </div>
                    </div> -->
<!--                     <div class="portfolio-box print-design">
                      <div class="portfolio-box-container">
                        <img src="assets/img/portfolio/work6.jpg" alt="" data-at2x="assets/img/portfolio/work6.jpg">
                        <div class="portfolio-box-text">
                          <h3>Adipisicing Print</h3>
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
                        </div>
                      </div>
                    </div> -->
<!--                     <div class="portfolio-box web-design">
                      <div class="portfolio-box-container">
                        <img src="assets/img/portfolio/work7.jpg" alt="" data-at2x="assets/img/portfolio/work7.jpg">
                        <div class="portfolio-box-text">
                          <h3>Elit Website</h3>
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
                        </div>
                      </div>
                    </div> -->
<!--                     <div class="portfolio-box web-design">
                      <div class="portfolio-box-container">
                        <img src="assets/img/portfolio/work11.jpg" alt="" data-at2x="assets/img/portfolio/work11.jpg">
                        <div class="portfolio-box-text">
                          <h3>Incididunt Website</h3>
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
                        </div>
                      </div>
                    </div> -->
<!--                     <div class="portfolio-box print-design">
                      <div class="portfolio-box-container">
                        <img src="assets/img/portfolio/work12.jpg" alt="" data-at2x="assets/img/portfolio/work12.jpg">
                        <div class="portfolio-box-text">
                          <h3>Ut Labore Print</h3>
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
                        </div>
                      </div>
                    </div> -->
                    <?php 
                      while($row = mysql_fetch_array($sqlTable_portfolioItems)):
                    ?>
                    <!-- start: 1 portfolio item -->
                    <div class=<?php echo $arr_typeToCssClass[$row['type']]; ?>>
                      <div class="portfolio-box-container">
                        <?php $image_fileName = $row['image_name'];
                          $video_url = $row['video_url']; ?>
                        <img <?php if($video_url) echo 'class="portfolio-video" data-portfolio-video="'.$video_url.'" '; ?>src="admin_uploads/<?php echo $image_fileName; ?>" alt="" data-at2x="admin_uploads/<?php echo $image_fileName; ?>" style="max-height:122px;max-width:255px">
                        <?php if($video_url) echo '<i class="portfolio-box-icon fa fa-play"></i>' ?>
                        <div class="portfolio-box-text">
                          <h3><?php echo $row['title']; ?></h3>
                          <p><?php echo $row['description']; ?></p>
                        </div>
                      </div>
                    </div>
                    <!-- end: 1 portfolio item -->
                    <?php endwhile; ?>
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