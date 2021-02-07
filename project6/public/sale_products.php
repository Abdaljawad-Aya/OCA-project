<?php
    $sale_tag = "
        position: absolute;
        top: -20px;
        left: 5px;
        width: 70px;
        height: 70px;
        border-radius: 50%;
        text-align: center;
        line-height: 70px;
        color: #FFFFFF;
        font-size: 18px;
        font-weight: 500;
        text-transform: capitalize;
        background-color: #384aec;
        z-index: 2;
    ";
?>
<section class="section-margin calc-60px" id="sale_section">
    <div class="container">
        <div class="section-intro pb-60px">
            <p>On Sale</p>
            <h2>Sale <span class="section-intro__style">Product</span></h2>
        </div>
        <div class="row">
            <?php
                $query  = "SELECT * FROM products WHERE discount < 1.0 LIMIT 8";
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
                        echo "<div style='{$sale_tag}'>sale!</div>";
                        echo "<div class='card text-center card-product'>";
                            echo "<div class='card-product__img'>";
                                echo "<img class='card-img' src=".$row['product_image']." alt=".$row['product_name'].">";
                                echo " <ul class='card-product__imgOverlay'>";
                                    echo'
                                    <li><a href="single-product.php?id='.$pro_id.'"><button><i class="fas fa-eye"></i></button></a></li>
                                    <li><a href="add_to_cart.php?id='.$pro_id.'&price='.$price_after_discount.'"><button><i class="ti-shopping-cart"></i></button></a></li>
                                    ';
                                echo "</ul>";
                            echo "</div>";
                            echo "<div class='card-body'>";
                            echo "<h4 class='card-product__title'><a href='single-product.php?id=$pro_id'>{$row['product_name']}</a></h4>";
                            echo "<p class='card-product__price'><del>".$row['product_price']."JOD"."</del></p>";
                            echo "<p class='card-product__price' style='color: #384aec'>".($row['product_price'] - ($row['product_price'] * $row['discount']))."JOD"."</p>";
                            echo "</div>";
                        echo "</div>";
                    echo "</div>";
                }
            ?>
        </div>
    </div>
</section>
