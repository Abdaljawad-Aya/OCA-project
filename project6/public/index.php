<?php 
  $title = "AMADA | Home";
  $desc = "we offer many categories of products for many brands with high quality to help you get your order in an easy and simple way.";
  require("includes/public_header.php"); 
?>
<main class="site-main">
    <section class="hero-banner">
      <div class="container">
        <div class="row no-gutters align-items-center pt-60px">
          <div class="col-5 d-none d-sm-block">
            <div class="hero-banner__img">
              <img class="img-fluid" src="img/home/hero-banner.png" alt="">
            </div>
          </div>
          <div class="col-sm-7 col-lg-6 offset-lg-1 pl-4 pl-md-5 pl-lg-0">
            <div class="hero-banner__content">
              <h4>Shop is fun</h4>
              <h1>Browse Our Premium Product</h1>
              <p>Us which over of signs divide dominion deep fill bring they're meat beho upon own earth without morning over third. Their male dry. They are great appear whose land fly grass.</p>
              <a class="button button-hero" href="shop.php">Browse Now</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php include('categories_section.php'); ?>
    <?php include('sale_products.php'); ?>
    <section class="offer" id="parallax-1"
              data-anchor-target="#parallax-1" 
              data-300-top="background-position: 20px 30px" 
              data-top-bottom="background-position: 0 20px">
      <div class="container">
        <div class="row">
          <div class="col-xl-5">
            <div class="offer__content text-center">
              <h3>Up To 50% Off</h3>
              <h4>Winter Sale</h4>
              <p>2021</p>
              <a class="button button--active mt-3 mt-xl-4" href="shop.php">Shop Now</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php include('hot_products.php'); ?>
    <?php include('featured_products.php'); ?>
  </main>
<?php require("includes/public_footer.php"); ?>