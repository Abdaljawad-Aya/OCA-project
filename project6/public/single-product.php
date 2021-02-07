<?php 
	require_once("../db_connection.php");
	if(!isset($_SESSION)){
		session_start();
	}
	$title                = "AMADA | Single Product";
	$desc                 = "we offer many categories of products for many brands with high quality to help you get your order in an easy and simple way.";
	$product_id           = $_GET["id"];
	$query                = "SELECT * FROM products INNER JOIN sub_categories ON products.sub_category_id=sub_categories.sub_category_id WHERE product_id={$product_id}";
	$result               = mysqli_query($conn,$query);
	$product              = mysqli_fetch_assoc($result);
	$price_after_discount = $product["product_price"]-($product["product_price"]*$product["discount"]);
	$error                = " ";
	
	
	if(isset($_POST["submit_review"])){
		if(!empty($_POST["review"])){
			$review=$_POST['review'];
			$customer_id=$_SESSION['user'];
			$product_id= $_GET['id'];
			$query=" INSERT INTO reviews (customer_id,products_id,review) VALUES ($customer_id,$product_id,'$review')";
			$result=mysqli_query($conn,$query);
			header("location:single-product.php?id=$product_id#review");
			
		}
		else{
			$error= "Please Enter Your Review";
		}
	}
	require("includes/public_header.php");
?>
	
<!-- ================ start banner area ================= -->	
<section>
	<div class="container mt-4">
		<div>
			<h1>Shop Single</h1>
			<nav aria-label="breadcrumb" class="banner-breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">Shop Single</li>
			</ol>
			</nav>
		</div>
	</div>
  </section>
	<!-- ================ end banner area ================= -->


  <!--================Single Product Area =================-->
	<div class="product_image_area p-4">
		<div class="container">
			<div class="row s_product_inner">
				<div class="col-lg-6">
					<div class="owl-carousel owl-theme s_Product_carousel">
						<div class="single-prd-item">
							<img class="img-fluid" src="<?php echo $product["product_image"] ?>" alt="">
						</div>
					</div>
				</div>
				<div class="col-lg-5 offset-lg-1">
					<div class="s_product_text">
						<h3><?php echo $product["product_name"] ?></h3>
						<?php
							if($product['discount'] != 1) {
								echo "<del><p class='card-product__price'>{$product['product_price']} JOD</p></del>";
								echo "<h2 class='card-product__price'>{$price_after_discount} JOD</h2>";
							} 
							else {
								echo "<h2 class='card-product__price'>{$product['product_price']} JOD</h2>";
							}
						?>
						<ul class="list">
							<li><a class="active" href="#"><span>Category</span> : <?php echo $product["sub_category_name"]  ?></a></li>
							<li><a href="#"><span>Availibility</span> : <?php echo $product["product_quantity"] ?></a></li>
						</ul>
						<p><?php echo $product["product_desc"] ?></p>
						<div class="product_count">
							<a href="add_to_cart.php?id=<?php echo $product["product_id"]?>&price=<?php echo $price_after_discount?>" class='button primary-btn'>Add to Cart</a>"         
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--================End Single Product Area =================-->

	<!--================Product Description Area =================-->
	<section class="product_description_area">
		<div class="container">
			<ul class="nav nav-tabs" id="myTab" role="tablist">
				<li class="nav-item">
					<a class="nav-link" id="deascription-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Description</a>
				</li>
				<li class="nav-item">
					<a class="nav-link active" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review"
					 aria-selected="false">Reviews</a>
				</li>
			</ul>
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="deascription-tab">
					<p><?php echo $product["product_desc"] ?></p>
				</div>
				<div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
					<div class="row">
						<div class="col-lg-6">
							<div class="review_list">
								<?php
								$query="SELECT * FROM reviews INNER JOIN customers ON reviews.customer_id=customers.customer_id WHERE products_id={$_GET['id']}";
								$result=mysqli_query($conn,$query);
								while($row=mysqli_fetch_assoc($result)){
									echo"
										<div class='review_item'>
										<div class='media'>
											<div class='d-flex'>
												<img class='rounded-circle' width='50px' src='".$row["customer_image"]."' alt=''>
											</div>
											<div class='media-body'>
												<h4>{$row['customer_name']}</h4>
											</div>
										</div>
										<p>{$row['review']}</p>
								</div>
								<hr>
									";
								}
								?>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="review_box">
								<h4>Add a Review</h4>
								<form action="" method="POST" class="form-contact form-review mt-3">
								<div class="form-group">
									<textarea class="form-control different-control w-100" name="review" cols="30" rows="5" placeholder="Enter Message"></textarea>
									<span><?php echo $error; ?></span>
								</div>
								<div class="form-group text-center text-md-right mt-3">
									<button type="submit" name="submit_review" class="button button--active button-review">Submit Now</button>
								</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Product Description Area =================-->

	<!--================ Start related Product area =================-->  
	<section class="related-product-area section-margin--small mt-0">
		<div class="container">
			<div class="section-intro pb-60px">
				<p>Popular Item in the market</p>
				<h2>Top <span class="section-intro__style">Product</span></h2>
			</div>
			<div class="row mt-30">
				<?php
				$query  = "SELECT COUNT(p.product_id) as c, 
				p.product_id, p.product_name,  p.product_image, 
				p.product_price,  p.discount,
				SUM(o.quantity) AS total, 
				p.product_name product
				FROM order_products o 
				INNER JOIN products p 
				ON o.product_id = p.product_id 
				GROUP BY p.product_name 
				ORDER BY total DESC 
				LIMIT 12";
				$result=mysqli_query($conn,$query);
				while($product=mysqli_fetch_assoc($result)){
					echo"
						<div class='col-sm-6 col-xl-3 mb-4 mb-xl-0'>
							<div class='single-search-product-wrapper'>
								<div class='single-search-product d-flex'>
								<a href='single-product.php?id={$product["product_id"]}'><img src='{$product["product_image"]}' alt=''></a>
								<div class='desc'>
									<a href='single-product.php?id={$product["product_id"]}' class='title'>{$product["product_name"]}</a>
									<div class='price'>{$product["product_price"]}</div>
								</div>
								</div>
							</div>
						</div>
					";	
				}
				?>
      		</div>
		</div>
	</section>
	<!--================ end related Product area =================-->  	
	<?php require("includes/public_footer.php"); ?>