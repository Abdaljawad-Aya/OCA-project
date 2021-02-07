<?php 
    $title = "AMADA | Products";
    $desc = "you can find multi-products for many high brands they offer their products on our site";
    require("includes/public_header.php"); 
?>
<section>
	<div class="container mt-4">
				<div>
					<h1><?php echo $_GET["name"] ?> Sub-Category</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#"><?php echo $_GET["name"] ?></a></li>
              <li class="breadcrumb-item active" aria-current="page">Products</li>
            </ol>
          </nav>
				</div>
			</div>
  </section>
<section class="section-margin--small mt-4 mb-5">
    <div class="container">
        <div class="row">
            <div class='col-xl-12 col-md-9 col-lg-12'>
                <section class='lattest-product-area pb-40 category-list'>
                    <div class='row'>
                        <?php 
                            $sql = "SELECT * FROM products WHERE sub_category_id = {$_GET['id']}";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                if($row["discount"] != 1){
                                    $price_after_discount=$row["product_price"]-($row["product_price"]*$row["discount"]);
                                }
                                else{
                                    $price_after_discount=$row["product_price"];
                                }
                                $pro_id = $row['product_id'];
                                echo "<div class='col-md-6 col-lg-4'>";
                                echo "<div class='card text-center card-product'>";
                                    echo "<div class='card-product__img'>";
                                    echo "<img class='card-img' src=".$row['product_image']." alt=".$row['product_name'].">";
                                    echo "<ul class='card-product__imgOverlay'>";
                                    echo'
                                    <li><a href="single-product.php?id='.$pro_id.'"><button><i class="fas fa-eye"></i></button></a></li>
                                    <li><a href="add_to_cart.php?id='.$pro_id.'&price='.$price_after_discount.'"><button><i class="ti-shopping-cart"></i></button></a></li>
                                    ';
                                    echo "</ul>";
                                    echo "</div>";
                                    echo "<div class='card-body'>";
                                    echo "<h5>".$row['product_name']."</h5>";
                                    echo "<div style='height:100px;overflow:hidden'><p class='card-product__title' style='text-align:left'><a href='single-product.php?id=$pro_id'>".$row['product_desc']."</a></p></div>";
                                    if($row['discount'] != 1) {
                                        echo "<p class='card-product__price'><del>".$row['product_price']."</del> JOD</p>";
                                        echo "<p class='card-product__price mt-2' style='color: #384aec'>".($row['product_price'] - ($row['product_price'] * $row['discount']))." JOD</p>";
                                    } else {
                                        echo "<p class='card-product__price mt-2' style='color: #384aec'>".$row['product_price']." JOD</p>";
                                    }
                                    echo "</div>";
                                echo "</div>";
                                echo "</div>";
                            }
                            ?>
                    </div>
                </section>
            </div>
        </div>
    </div>
</section>	
<?php require("includes/public_footer.php"); ?>