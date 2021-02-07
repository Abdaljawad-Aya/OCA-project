<?php 
    $title = "AMADA | Sub-Categories";
    $desc = "Our site  offers top-quality products  for multi categories and products";
    require("includes/public_header.php");
?>
<!-- ================ start banner area ================= -->	
<section>
	<div class="container my-4">
				<div>
					<h1><?php echo $_GET["name"] ?> Category</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#"><?php echo $_GET["name"] ?></a></li>
              <li class="breadcrumb-item active" aria-current="page">Sub-Categories</li>
            </ol>
          </nav>
				</div>
			</div>
  </section>

	<!-- ================ end banner area ================= -->  
<div class="product_image_area mt-2 pt-2">
    <div class="container">
        <div class="row s_product_inner">
            <?php
                $sql = "SELECT *
                FROM sub_categories
                INNER JOIN categories 
                ON sub_categories.category_id = categories.category_id 
                WHERE sub_categories.category_id={$_GET['id']}";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) { 
                    $cat_Id = $row['category_id'];
                    $sub_cat_Id = $row['sub_category_id'];
                    $sub_cat_name = $row['sub_category_name'];
                    echo "<div class='col-lg-3 col-md-3 m-auto'>";
                        echo "<div class='owl-carousel owl-theme s_Product_carousel'>";
                            echo "<div class='single-prd-item'>";
                                echo "<img class='card-img' src=".$row['sub_category_image']." alt=".$row['sub_category_name'].">";
                            echo "</div>";
                        echo "</div>";
                        echo " <div class='s_product_text'>";
                            echo "";
                            echo "<ul class='list'>";
                                echo "<li><a class='active' href='products.php?id=$sub_cat_Id&name=$sub_cat_name'><h3 class='mb-0'>".$row['sub_category_name']."</h3></a></li>";
                            echo "</ul>";
                            echo "<p style='height: 120px;  overflow-y:hidden'>".$row['sub_category_desc']."</p>";
                            echo "<div class='product_count mt-4'>";
                                echo"<a class='button primary-btn' href='products.php?id=$sub_cat_Id&name=$sub_cat_name'>Browse Now</a>";
                            echo "</div>";
                        echo "</div>";
                    echo "</div>";
                }
            ?>
        </div>
    </div>
</div>
<?php require("includes/public_footer.php"); ?>