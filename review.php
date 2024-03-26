<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Tasty Recipes</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/style.css">
    
    <link rel="stylesheet" href="css/review.css">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>

<body>
    <!-- header-start -->
    <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-2">
                            <div class="logo">
                                <a href="index.php">
                                    <img src="img/logo.png" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-7">
                            <div class="main-menu white_text  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="index.php">home</a></li>
                                        <li><a href="about.php">about</a></li>
                                        <li><a href="Recipes.php">Recipes</a></li>
                                        <li><a href="contact.php">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                            <div class="search_icon">
                                <a href="#">
                                    <i class="ti-search"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->

    <!-- bradcam_area  -->
    <div class="bradcam_area bradcam_bg_review">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>write a review</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /bradcam_area  -->
  <!-- ================ review section start ================= -->
  <section class="contact-section section_padding">
    <div class="container">
      <div class="d-none d-sm-block mb-5 pb-4">
      <div class="row">
        <div class="col-12">
          <h2 class="contact-title">Review</h2>
        </div>
        <div class="col-lg-8">
          <form class="form-contact contact_form"  method="post" id="reviewForm" novalidate="novalidate">
              <div class="col-12">
              <p>rating </p>
              </div>
              <div class="rating col-12">
             <!--&#9733; represents the star symbol -->
              <span class="star" data-rating="5">&#9733;</span>
              <span class="star" data-rating="4">&#9733;</span>
              <span class="star" data-rating="3">&#9733;</span>
              <span class="star" data-rating="2">&#9733;</span>
              <span class="star" data-rating="1">&#9733;</span>
              </div>
              <div class="col-12">
              <div class="form-group">
                  <textarea class="form-control w-100" name="title" id="reviewTitle" cols="30" rows="1" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Title'" placeholder = 'Enter Title'></textarea>
              </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                    <textarea class="form-control w-100" name="message" id="reviewMessage" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" placeholder = 'Enter Message'></textarea>
                </div>
              </div>
              </div>
          <div class="col-lg-4">
            <img id="reviewImg" src="img/recepie/recepie_details.png" >
            <h2 class="contact-title" id="recipeName">recipe name</h2>
          </div>
            <div class="col-12">
            <div class="form-group mt-3">
              <button type="submit" class="button button-contactForm btn_4 boxed-btn">Submit Review</button>
            </div>
            </div>
          </form>
        </div>
        </div>
  </section>
  <!-- ================ review section end ================= -->

    <!-- footer  -->
    <footer class="footer">
        <div class="copy-right_text">
            <div class="container">
                <div class="footer_border"></div>
                <div class="row align-items-center">
                    <div class="col-xl-8 col-md-8">
                        <p class="copy_right">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                    <div class="col-xl-4 col-md-4">
                        <div class="socail_links">
                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="ti-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="ti-twitter-alt"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-dribbble"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-behance"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
<!--/ footer  -->


  <!-- JS here -->
  <script src="js/review.js"></script>
</body>

</html>