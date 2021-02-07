<?php
if(!isset($_SESSION)){session_start();}
if (!$_SESSION['admin_id']) {
    header("location:login.php");
}
$query = "SELECT * FROM admins WHERE admin_id = {$_SESSION['admin_id']}";
$result   = mysqli_query($conn, $query);
$adminSet = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard</title>
    <link rel="icon" href="../images/icon/Fevicon.png" type="image/png">


    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">



</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.php">
                            <img src="../images/icon/logo.png" alt="Admin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li>
                            <a href="manage_admin.php">
                                <i class="fas fa-chart-bar"></i>Manage Admin </a>
                        </li>
                        <li>
                            <a href="manage_customers.php">
                                <i class="fas fa-chart-bar"></i>Manage Customers </a>
                        </li>
                        <li>
                            <a href="manage_categories.php">
                                <i class="fas fa-chart-bar"></i>Manage Categories </a>
                        </li>
                        <li>
                            <a href="manage_sub_cat.php">
                                <i class="fas fa-chart-bar"></i>Manage SubCategories </a>
                        </li>
                        <li>
                            <a href="manage_brands.php">
                                <i class="fas fa-chart-bar"></i>Manage Brands </a>
                        </li>
                        <li>
                            <a href="manage_products.php">
                                <i class="fas fa-chart-bar"></i>Manage Products </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="../images/icon/logo.png" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li>
                            <a href="manage_admin.php">
                                <i class="fas fa-chart-bar"></i>Manage Admin </a>
                        </li>
                        <li>
                            <a href="manage_customers.php">
                                <i class="fas fa-chart-bar"></i>Manage Customers </a>
                        </li>
                        <li>
                            <a href="manage_categories.php">
                                <i class="fas fa-chart-bar"></i>Manage Categories </a>
                        </li>
                        <li>
                            <a href="manage_sub_cat.php">
                                <i class="fas fa-chart-bar"></i>Manage SubCategories </a>
                        </li>
                        <li>
                            <a href="manage_brands.php">
                                <i class="fas fa-chart-bar"></i>Manage Brands </a>
                        </li>
                        <li>
                            <a href="manage_products.php">
                                <i class="fas fa-chart-bar"></i>Manage Products </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container" style="padding-left: 0 auto;">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <div class="form-header" ></div>
                            <div class="header-button">
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="<?php echo $adminSet['admin_image'] ?>" alt="John Doe" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"><?php echo $adminSet['admin_name'] ?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="account-dropdown__footer">
                                                <a href="logout.php">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->