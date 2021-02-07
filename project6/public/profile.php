<?php 
$title = "AMADA | Profile";
$desc = "we offer many categories of products for many brands with high quality to help you get your order in an easy and simple way.";
if(!isset($_SESSION)){
	session_start();
	include("../db_connection.php");

}

if(!isset($_SESSION['user'])){
	header("location:index.php");
}else{
	$user_id=$_SESSION['user'];
}
// query to marge 4 Tables
$user_order_product="
SELECT
c.customer_email,
c.customer_name,
c.customer_mobile,
customer_location,
customer_image,

o.order_id,
o.total,

o_p.quantity,

p.product_price,
p.product_image,
p.product_name
FROM customers c

INNER JOIN orders o ON 
c.customer_id = o.customer_id
INNER JOIN order_products o_p ON 
o.order_id = o_p.order_id
INNER JOIN products p ON 
o_p.product_id=p.product_id
WHERE o.customer_id= '{$user_id}'
";
$user_date="
SELECT
customer_email,
customer_name,
customer_mobile,
customer_location,
customer_image
FROM customers 
WHERE customer_id= '{$user_id}'
";

$results=mysqli_query($conn,$user_order_product);

$res=mysqli_query($conn,$user_date);

$row= mysqli_fetch_assoc($res);

// var_dump($row);
// die;

//name extract form the email 
$re = '/[^@]*/';
$str = $row['customer_email'];
preg_match($re, $str, $matches, PREG_OFFSET_CAPTURE, 0);
// Print the entire match result
$name=$matches[0][0];




?>

<?php require("./includes/public_header.php");?>

	<!-- ================ start banner area ================= -->	
<section>
	<div class="container my-4">
        <div>
        <!-- <h>Product Checkout</h> -->
        <nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Profile</a></li>
            <li class="breadcrumb-item active" aria-current="page">Account</li>
            </ol>
        </nav>
        </div>
    </div>
</section>
	<!-- ================ end banner area ================= -->



<!--================Profile Area =================-->
	<section class="blog_area single-post-area py-1px" style="height:70vh">
			<div class="container">
					<div class="row">
						<div class="col-lg-4">
							<div class="blog_right_sidebar">
								<!--================ Personal Card Area =================-->
								
								<aside class=" single_sidebar_widget author_widget">
									<img class="author_img rounded-circle" 
									width="100" height="100"src="<?php echo (isset($row['customer_image'] ))?$row['customer_image']:"https://uybor.uz/borless/uybor/img/user-images/user_no_photo_300x300.png";?>" alt= "<?php $n= (isset($row['customer_name'] ))?$row['customer_name']:$name;echo ucfirst($n);?>" >
											<h4>
												<?php $n= (isset($row['customer_name'] ))?$row['customer_name']:$name;
											echo ucfirst($n);
											?>
											</h4>
											<h4>
												<?php echo (isset($row['customer_mobile'] ))?$row['customer_mobile']:'Please add your Phone No. !';   ?>
											</h4>
											<h4>
												<?php echo (isset($row['customer_location'] ))?$row['customer_location']:'Please add your location !';   ?>
											</h4>
											<br>
											<div>
												<a  href="profile_edit.php"><button class="btn btn-info">Profile Edit</button></a>
											</div>
											
											
											<!--================ Personal Card Area =================-->
									</div>
							</div>
					
							<?php 
							// query to find all details 
							// add the empty order
							?>
							<div class="col-lg-8 posts-list">
								<div class="h-75 my-scroll" style="overflow-y:scroll ">
								<?php 
									while($row= mysqli_fetch_assoc($results)){
								?>
								<div class="card mb-3" style="max-width: 540px;">
								<div class="row no-gutters">
									<div class="col-md-3" style="height: 130px;">

									<img height="140"  src=" <?php echo (isset($row['product_image']))?$row['product_image']: "https://www.imgacademy.com/themes/custom/imgacademy/images/helpbox-contact.jpg";?>" class="card-img"
									
									alt="<?php echo (isset($row['product_name']))? ucfirst($row['product_name']) :null ?> ">
									</div>
									<div class="col-md-8">
									<div class="card-body">
										<h5 class="card-title"><?php echo (isset($row['product_name']))? ucfirst($row['product_name']) :null ?> </h5>

										<p class="card-text"> Product price: <?php echo (isset($row['product_price']))?$row['product_price']:null ?> JOD</p>

										<p class="card-text">
											<small class="text-muted">Quantity: <?php echo (isset($row['quantity']))?$row['quantity']:null ?>  </small>
											<small class="text-muted">Total: <?php echo (isset($row['total']))?$row['total']:null ?>  </small>
									</p>
									</div>
									</div>
								</div>
								</div>
								<?php 
								}
                                if (!(($results)->num_rows>0)) {
                                    ?>
								<div class="card " style="width:20em;">
									<div class="card-header">
									Your order history is empty  
									</div>
									<div class="card-body">
										<a href="shop.php" class="btn btn-primary">Go Shop</a>
									</div>
								</div>
								<?php
                                }
								?>
							</div>
							</div>
											</div>
									</div>
							</section>
	<!--================Blog Area =================-->
  
<?php require('./includes/public_footer.php');?>
  <script src="vendors/jquery/jquery-3.2.1.min.js"></script>
  <script src="vendors/bootstrap/bootstrap.bundle.min.js"></script>
  <script src="vendors/skrollr.min.js"></script>
  <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
  <script src="vendors/nice-select/jquery.nice-select.min.js"></script>
  <script src="vendors/jquery.ajaxchimp.min.js"></script>
  <script src="vendors/mail-script.js"></script>
  <script src="js/main.js"></script>
</body>
</html>