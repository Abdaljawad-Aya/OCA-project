<?php 
    $title = "AMADA | Search";
    $desc = "we offer many categories of products for many brands with high quality to help you get your order in an easy and simple way.";
    require("../db_connection.php");
    require("includes/public_header.php");
?>

<section class="related-product-area section-margin--small mt-0">
        <div class="container">
            <div class="section-intro pb-60px">
                <h2> <span class="section-intro__style">Results</span></h2>
            </div>
            <div class="row mt-30">
                <?php
                
                    $k = $_REQUEST['search'];


                    $terms = str_replace('+',' ',$k);

                    $query = "
                    SELECT *
                    FROM categories c
                    INNER JOIN sub_categories s_c ON
                    c.category_id=s_c.category_id

                    INNER JOIN products p ON
                    s_c.sub_category_id=p.sub_category_id
                    INNER JOIN brands b ON
                    p.brand_id =b.brand_id

                    WHERE
                    p.product_name LIKE '%$terms%' || 
                    c.category_name LIKE '%$terms%' || 
                    s_c.sub_category_name LIKE '%$terms%'  
                    ";
                    $result = mysqli_query($conn, $query);

                    if($result->num_rows<1){
                        echo"
                        <div class='col-sm-6 col-xl-3 mb-4 mb-xl-0'>
                            <div class='single-search-product-wrapper'>
                                <p>No Results found</p>
                            </div>
                            <a href='shop.php'><div class='btn'>Go Shop</div></a>
                        </div>
                    ";  

                    }

                
                while($product=mysqli_fetch_assoc($result)){
                    $name=ucfirst($product["product_name"]);
                    echo"
                        <div class='col-sm-6 col-xl-3 mb-4 mb-xl-0'>
                            <div class='single-search-product-wrapper'>
                                <div class='single-search-product d-flex'>
                                <a href='single-product.php?id={$product["product_id"]}'><img src='{$product["product_image"]}' alt=''></a>
                                <div class='desc'>
                                    <a href='single-product.php?id={$product["product_id"]}' class='title'>{$name}</a>
                                    <div class='text-center'>{$product["brand_name"]}</div>
                                    <div class='price'>{$product["product_price"]} JOD</div>
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

    <?php include("./includes/public_footer.php");?>
