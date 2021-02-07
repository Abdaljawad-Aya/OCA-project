<!-- ================ Hot items ================= --> 
<?php
    $hot_tag = "
        position: absolute;
        top: 0px;
        left: -15px;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        text-align: center;
        line-height: 60px;
        color: #FFFFFF;
        font-size: 18px;
        font-weight: 500;
        text-transform: capitalize;
        background-color: #384AEC;
        z-index: 2;
    ";
?>
<section class="section-margin calc-60px" id="hot_section">
    <div class="container">
        <div class="section-intro pb-60px">
            <p>Up To 50% Off</p>
            <h2>Hot <span class="section-intro__style">Products</span></h2>
        </div>
        <div class="owl-carousel owl-theme" id="bestSellerCarousel">
            <?php
                $query  = "SELECT * FROM products WHERE discount >= 0.5 AND discount <= 0.9 LIMIT 10";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    if($row["discount"] != 1){
                        $price_after_discount=$row["product_price"]-($row["product_price"]*$row["discount"]);
                    }
                    else{
                        $price_after_discount=$row["product_price"];
                    }
                    $pro_id = $row['product_id'];
                    echo "<div class='card text-center card-product'>";
                        echo "<div style='{$hot_tag}'>Hot!</div>";
                            echo "<div class='card-product__img'>";
                                echo "<img class='card-img' src=".$row['product_image']." alt=".$row['product_name'].">";
                                echo "<ul class='card-product__imgOverlay'>";
                                echo'
                                <li><a href="single-product.php?id='.$pro_id.'"><button><i class="fas fa-eye"></i></button></a></li>
                                <li><a href="add_to_cart.php?id='.$pro_id.'&price='.$price_after_discount.'"><button><i class="ti-shopping-cart"></i></button></a></li>
                                ';
                                echo "</ul>";
                            echo "</div>";
                            echo " <div class='card-body'>";
                                echo "<h4 class='card-product__title'><a href='single-product.php?id=$pro_id'>".$row['product_name']."</a></h4>";
                                echo "<p class='card-product__price'><del>".$row['product_price']."</del> JOD</p>";
                                echo "<p class='card-product__price' style='color: #384AEC'>"."$".($row['product_price'] - ($row['product_price'] * $row['discount']))." JOD</p>";
                        echo "</div>";
                    echo "</div>";
                }
            ?>
        </div>
    </div>
</section>