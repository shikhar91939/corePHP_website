<?php 
  include 'connect.php';
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
        <!-- Slider -->
        <?php 
          $query_getSliders = "SELECT * FROM home_slider";
          ($slider_sqlTable = mysql_query($query_getSliders)) 
            or die('mySQL error: '.mysql_error());
         ?>
        <div class="slider-container">
            <div class="container">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1 slider">
                        <div class="flexslider">
                            <ul class="slides">
                              <?php while($slider_row = mysql_fetch_array($slider_sqlTable)) : ?>
                                <li data-thumb="admin_uploads/<?php echo $slider_row['image_name'];?>">
                                  <img src="admin_uploads/<?php echo $slider_row['image_name'];?>">
                                  <div class="flex-caption"> <?php echo $slider_row['caption_text']; ?> </div>
                                </li>
                                <?php endwhile; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Presentation -->
        <div class="presentation-container">
          <div class="container">
            <div class="row">
              <div class="col-sm-12 wow fadeInLeftBig">
                  <h1>We are <span class="violet">Andia</span>, a super cool design agency.</h1>
                  <p>We design beautiful websites, logos and prints. Your project is safe with us.</p>
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
        <!-- Latest work -->
        <div class="work-container">
          <div class="container">
            <div class="row">
                <div class="col-sm-12 work-title wow fadeIn">
                    <h2>Our Latest Work</h2>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-3">
                    <div class="work wow fadeInUp">
                        <img src="assets/img/portfolio/work1.jpg" alt="Lorem Website" data-at2x="assets/img/portfolio/work1.jpg">
                        <h3>Lorem Website</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor...</p>
                        <div class="work-bottom">
                            <a class="big-link-2 view-work" href="assets/img/portfolio/work1.jpg"><i class="fa fa-search"></i></a>
                            <a class="big-link-2" href="portfolio.html"><i class="fa fa-link"></i></a>
                        </div>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="work wow fadeInDown">
                        <img src="assets/img/portfolio/work2.jpg" alt="Ipsum Logo" data-at2x="assets/img/portfolio/work2.jpg">
                        <h3>Ipsum Logo</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor...</p>
                        <div class="work-bottom">
                            <a class="big-link-2 view-work" href="assets/img/portfolio/work2.jpg"><i class="fa fa-search"></i></a>
                            <a class="big-link-2" href="portfolio.html"><i class="fa fa-link"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="work wow fadeInUp">
                        <img src="assets/img/portfolio/work3.jpg" alt="Dolor Prints" data-at2x="assets/img/portfolio/work3.jpg">
                        <h3>Dolor Prints</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor...</p>
                        <div class="work-bottom">
                            <a class="big-link-2 view-work" href="assets/img/portfolio/work3.jpg"><i class="fa fa-search"></i></a>
                            <a class="big-link-2" href="portfolio.html"><i class="fa fa-link"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="work wow fadeInDown">
                        <img src="assets/img/portfolio/work4.jpg" alt="Sit Amet Website" data-at2x="assets/img/portfolio/work4.jpg">
                        <h3>Sit Amet Website</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor...</p>
                        <div class="work-bottom">
                            <a class="big-link-2 view-work" href="assets/img/portfolio/work4.jpg"><i class="fa fa-search"></i></a>
                            <a class="big-link-2" href="portfolio.html"><i class="fa fa-link"></i></a>
                        </div>
                    </div>
                </div>
              </div>
          </div>
        </div>

        <!-- Testimonials -->
        <div class="testimonials-container">
          <div class="container">
            <div class="row">
                <div class="col-sm-12 testimonials-title wow fadeIn">
                    <h2>Testimonials</h2>
                </div>
              </div>
              <div class="row">
                  <div class="col-sm-10 col-sm-offset-1 testimonial-list">
                    <div role="tabpanel">
                      <!-- Tab panes -->
                      <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="tab1">
                          <div class="testimonial-image">
                            <img src="assets/img/testimonials/1.jpg" alt="" data-at2x="assets/img/testimonials/1.jpg">
                          </div>
                          <div class="testimonial-text">
                                    <p>
                                      "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et. 
                                      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et. 
                                      Lorem ipsum dolor sit amet, consectetur..."<br>
                                      <a href="#">Lorem Ipsum, dolor.co.uk</a>
                                    </p>
                                  </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab2">
                          <div class="testimonial-image">
                            <img src="assets/img/testimonials/2.jpg" alt="" data-at2x="assets/img/testimonials/2.jpg">
                          </div>
                          <div class="testimonial-text">
                                    <p>
                                      "Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip 
                                      ex ea commodo consequat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit 
                                      lobortis nisl ut aliquip ex ea commodo consequat..."<br>
                                      <a href="#">Minim Veniam, nostrud.com</a>
                                    </p>
                                  </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab3">
                          <div class="testimonial-image">
                            <img src="assets/img/testimonials/3.jpg" alt="" data-at2x="assets/img/testimonials/3.jpg">
                          </div>
                          <div class="testimonial-text">
                                    <p>
                                      "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et. 
                                      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et. 
                                      Lorem ipsum dolor sit amet, consectetur..."<br>
                                      <a href="#">Lorem Ipsum, dolor.co.uk</a>
                                    </p>
                                  </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab4">
                          <div class="testimonial-image">
                            <img src="assets/img/testimonials/1.jpg" alt="" data-at2x="assets/img/testimonials/1.jpg">
                          </div>
                          <div class="testimonial-text">
                                    <p>
                                      "Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip 
                                      ex ea commodo consequat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit 
                                      lobortis nisl ut aliquip ex ea commodo consequat..."<br>
                                      <a href="#">Minim Veniam, nostrud.com</a>
                                    </p>
                                  </div>
                        </div>
                      </div>
                      <!-- Nav tabs -->
                      <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                          <a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab"></a>
                        </li>
                        <li role="presentation">
                          <a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab"></a>
                        </li>
                        <li role="presentation">
                          <a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab"></a>
                        </li>
                        <li role="presentation">
                          <a href="#tab4" aria-controls="tab4" role="tab" data-toggle="tab"></a>
                        </li>
                      </ul>
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