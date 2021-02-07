<section class="section-margin calc-60px" id="featured_section">
    <div class="container">
        <div class="section-intro pb-60px">
            <p>Top Products</p>
            <h2> Featured <span class="section-intro__style"> Product</span></h2>
        </div>
        <div class="row">
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
            LIMIT 8";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                if($row["discount"] != 1){
                    $price_after_discount=$row["product_price"]-($row["product_price"]*$row["discount"]);
                }
                else{
                    $price_after_discount=$row["product_price"];
                }
                $pro_id = $row['product_id'];
                echo "<div class='col-md-6 col-lg-4 col-xl-3'>";
                    echo "<div class='card text-center card-product'>";
                        echo "<div class='card-product__img'>"; ?>
                        <?php echo "<img class='card-img' src=".$row['product_image']." alt=".$row['product_name'].">";?>
                        <?php echo " <ul class='card-product__imgOverlay'>";
                            echo'
                            <li><a href="single-product.php?id='.$pro_id.'"><button><i class="fas fa-eye"></i></button></a></li>
                            <li><a href="add_to_cart.php?id='.$pro_id.'&price='.$price_after_discount.'"><button><i class="ti-shopping-cart"></i></button></a></li>
                            ';
                        echo "</ul>";
                        echo "</div>";
                        echo "<div class='card-body'>";
                        echo "<h4 class='card-product__title'><a href='single-product.php?id=$pro_id'>{$row['product_name']}</a></h4>";
                        if($row['discount'] != 1) {
                            echo "<p class='card-product__price'><del>".$row['product_price']."</del> JOD</p>";
                            echo "<p class='card-product__price' style='color: #384aec'>".($row['product_price'] - ($row['product_price'] * $row['discount']))." JOD</p>";
                        } else {
                            echo "<p class='card-product__price' style='color: #384aec'>".$row['product_price']." JOD</p>";
                        }
                        echo "</div>
                    </div>
                </div>";
            }
        ?>
        </div>
    </div>
</section>
