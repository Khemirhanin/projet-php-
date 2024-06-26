<?php
require_once('components/autoload.php');
$repository = new userRepository();
//check if the user is logged in or not 
if(isset($_COOKIE['user_id'])){
    $query = $repository->findById($_COOKIE['user_id']);
    $user = $query;
}
 ?>
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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/gijgo.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/slicknav.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/search.css">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>

<body>
    
    <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area ">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-2">
                            <div class="logo">
                                <a href="index.php">
                                    <img src="img/logo.png" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-8"> <!-- Increased the width of the column -->
                            <div class="main-menu   d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="index.php">home</a></li>
                                        <li><a href="about.php">about</a></li>
                                        <li><a href="Recipes.php">Recipes</a></li>
                                        <li><a href="contact.php">Contact</a></li>
                                    <!--  if the user is logged in then dipslay these options -->
                                    <?php if(isset($_COOKIE['user_id'])){ ?>
                                        <li><a href="logout.php">Logout</a></li>
                                        <li><a href="Submit_Request.php">Share recipe </a></li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="background-color: black; color: white;">
                                                <i class="material-icons white-icon" style="font-size: 18px;">person</i> Profile
                                            </a>
                                            <ul class="dropdown-menu" style="background-color: black; color: white;">
                                                <?php if(isset($query)){ ?>
                                                    <li class="centered-dropdown-item">
                                                        <div class="text-center">
                                                            <button class="user_symbol"><?= substr($query->UserName, 0, 1) ?></button>
                                                            <?php } ?>
                                                            <p class="centered-text" style="margin-bottom: 20px; text-align: center; color: white; margin-left: 15px; margin-right: auto;"><?php echo $query->UserName; ?></p>
                                                        </div>
                                                    </li>
                                                    <li><a href="updateProfile.php?user_id=<?= $_COOKIE['user_id']; ?>" >Update Profile</a></li>
                            
                                                <li><a href="viewMyPosts.php?user_id=<?= $_COOKIE['user_id']; ?>">View My Posts</a></li>
                                            </ul>
                                        </li>
                                        <!-- if the user is not logged in then display these options -->
                                    <?php }else{ ?>
                                        <li><a href="login.php">Login</a></li>
                                        <li><a href="register.php">Register</a></li>
                                    <?php } ?>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 d-none d-lg-block"> 
                        <form>
                            <div class="searchBoxFloating">
                                <input id="search"  type="text"  placeholder="Search" name="search" autocomplete="off">
                                <button class="searchButton" id="bouton123">
                                    <i class="material-icons">
                                        search
                                    </i>
                                </button>
                                <div> 
                                 <ul class="result-box" id="searchResults">
                                 </ul> <!-- Container for search results -->      
                                 </div>
                            </div>
                            </form>
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