<?php
if(!isset($_SESSION)){
  session_start();
}
require_once("../db_connection.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?php echo $GLOBALS['title']; ?></title>
  <meta name="description" content="<?php echo $GLOBALS['desc']; ?>">
	<link rel="icon" href="img/Fevicon.png" type="image/png">
  <link rel="stylesheet" href="vendors/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="vendors/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="vendors/themify-icons/themify-icons.css">
  <link rel="stylesheet" href="vendors/nice-select/nice-select.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.theme.default.min.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">

  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <!--================ Start Header Menu Area =================-->
	<header class="header_area">
    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
          <a class="navbar-brand logo_h" href="index.php"><img src="img/logo.png" alt=""></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
              <li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
              <li class="nav-item submenu dropdown">
                <a href="shop.php" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                  aria-expanded="false">Shop</a>
                  <ul class="dropdown-menu">
                  <li class="nav-item"><a class="nav-link" href="index.php#categories_section">Categories</a></li>
                  <li class="nav-item"><a class="nav-link" href="shop.php">All Products</a></li>
                  <?php 
                  echo "<li class='nav-item'>
                    <a class='nav-link' href='index.php#sale_section'>Sale Products</a>
                  </li>";
                
                  ?>
                  <?php 
                
                  echo "<li class='nav-item'>
                    <a class='nav-link' href='index.php#hot_section'>Hot Products</a>
                  </li>";
                
                  ?>
                  <?php 
                      echo "<li class='nav-item'>
                        <a class='nav-link' href='index.php#featured_section'>Featured Products</a>
                      </li>";
                  ?>
                </ul>
							</li>
              <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
            </ul>

            <ul class="nav-shop nav navbar-nav menu_nav ml-auto mr-auto">
            <li class="nav-item" style="margin-top: 1.5rem;" >
            <nav class="navbar navbar-light bg-light">

              <form class="form-inline" method="get" action="search.php">
                <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">

                <button class="btn my-2 my-sm-0" value="search" type="submit"><i class="ti-search"></i></button>
              </form>
            </nav>
            </li>
              <li class="nav-item"><a class="nav-link" href="cart.php"><button><i class="ti-shopping-cart"></i><span class="nav-shop__circle" id="cart_count">
                <?php   
                if (isset($_SESSION["order_products"])){
                  echo count($_SESSION["order_products"]);
                }else{
                  echo "0";
                } 
              ?>
              </span></button></a> </li>
              <?php
                if(isset($_SESSION['user'])){
                  echo'
                  <li class="nav-item submenu dropdown">
                    <a href="profile.php" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profile</a>
                    <ul class="dropdown-menu">
                    <li class="nav-item"><a class="nav-link" href="profile.php">Account</a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php">logout</a></li>
                    </ul>
                  </li>
                  ';
                }
                else{
                  echo'
                    <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                  ';
                }
              ?>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </header>
	<!--================ End Header Menu Area =================-->