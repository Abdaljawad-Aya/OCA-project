<?php 
  $title = "AMADA | Shop";
  $desc = "we offer many categories of products for many brands with high quality to help you get your order in an easy and simple way.";
  require("includes/public_header.php"); 
  if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
  } else {
      $pageno = 1;
  }
  $no_of_records_per_page = 6;
  $offset = ($pageno - 1) * $no_of_records_per_page;

  $total_pages_sql = "SELECT COUNT(*) FROM products";
  $result = mysqli_query($conn, $total_pages_sql);
  $total_rows = mysqli_fetch_array($result)[0];
  $total_pages = ceil($total_rows / $no_of_records_per_page);


  if(isset($_POST["filter"])){
    if(!empty($_POST["sub_category"])){
      $selected_category_id=$_POST["sub_category"];
    // die( $selected_category_id);
    }
  }
?>
<!-- ================ start banner area ================= -->	
  <section>
	  <div class="container mt-4">
					<h1>Shop</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Shop</li>
            </ol>
          </nav>
			</div>
  </section>
	<!-- ================ end banner area ================= -->


	<!-- ================ category section start ================= -->		  
  <section class="section-margin--small mt-4 mb-5">
    <div class="container">
      <div class="row">
        <div class="col-xl-3 col-lg-4 col-md-5">
          <div class="sidebar-categories">
            <div class="head">Browse Categories</div>
            <ul class="main-categories">
              <li class="common-filter">
                <form action="" method="POST" >
                  
                  <?php 
                    $query="SELECT * from categories";
                    $result=mysqli_query($conn,$query);
                    while($row=mysqli_fetch_assoc($result)){
                      echo '
                        <ul>
                          <li class="filter-list">'.$row["category_name"].'';
                          $query2="SELECT * FROM sub_categories WHERE category_id={$row['category_id']}";
                          $result2=mysqli_query($conn,$query2);
                          while($row2=mysqli_fetch_assoc($result2)){
                            echo'
                              <li>
                                <input class="pixel-radio" type="radio" name="sub_category" value="'.$row2["sub_category_id"].'"><label for="'.$row2["sub_category_id"].'">'.$row2["sub_category_name"].'</label> 
                              </li>
                            ';
                          }
                          echo'  
                          </li>
                        </ul>
                      ';
                    }
                   ?>
                  
                  <input type="submit" name="filter" Value="filter" class="button button-subscribe mr-auto mb-1"></input>
                </form>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-xl-9 col-lg-8 col-md-7">
          <!-- Start Category products -->
          <section class="lattest-product-area pb-40 category-list">
            <div class="row">
              <?php
                if(isset($selected_category_id)){
                  $query="SELECT * FROM products WHERE sub_category_id=$selected_category_id LIMIT $offset, $no_of_records_per_page";
                }
                else{
                  $query="SELECT * FROM products LIMIT $offset, $no_of_records_per_page ";
                }
                $result=mysqli_query($conn,$query);
                while($row=mysqli_fetch_assoc($result)){
                  if($row["discount"] != 1){
                    $price_after_discount=$row["product_price"]-($row["product_price"]*$row["discount"]);
                  }
                  else{
                      $price_after_discount=$row["product_price"];
                  }
                  echo'
                    <div class="col-md-6 col-lg-4">
                      <div class="card text-center card-product">
                        <div class="card-product__img">
                          <img class="card-img" src="'.$row["product_image"].'" alt="">
                          <ul class="card-product__imgOverlay">
                            <li><a href="single-product.php?id='.$row["product_id"].'"><button><i class="fas fa-eye"></i></button></a></li>
                            <li><a href="add_to_cart.php?id='.$row["product_id"].'&price='.$price_after_discount.'"><button><i class="ti-shopping-cart"></i></button></a></li>
                          </ul>
                        </div>
                        <div class="card-body">
                          <h4 class="card-product__title"><a href="single-product.php?id='.$row["product_id"].'">'.$row["product_name"].'</a></h4>
                          ';
                          if($row['discount'] != 1) {
                            echo "<del><p class='card-product__price'>{$row['product_price']} JOD</p></del>";
                            echo "<h6 class='card-product__price' style='color: #384aec'>{$price_after_discount} JOD</h6>";
                          } 
                          else {
                            echo "<h6 class='card-product__price' style='color: #384aec'>{$row['product_price']} JOD</h6>";
                          }
                        echo '
                        </div>
                      </div>
                    </div>
                  ';
                }
              ?>
            </div>
            <?php
            $check= isset($selected_category_id);
            $check? : include("pagination.php");
            
            ?>
          </section>
          <!-- End Best Seller -->
        </div>
      </div>
      
    </div>
    
  </section>
	<!-- ================ category section end ================= -->		  

	<!-- ================ top product area start ================= -->	
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
	<!-- ================ top product area end ================= -->		
  <?php require("includes/public_footer.php"); ?>	  