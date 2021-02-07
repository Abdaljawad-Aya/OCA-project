
<!--================ Hero Carousel start =================-->
<section class="section-margin mt-0" id="categories_section">
    <div class="owl-carousel owl-theme hero-carousel cat-sec">
    <?php
        $query  = "SELECT * FROM categories LIMIT 3";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $catId   = $row['category_id'];
            $catName = $row['category_name'];
            echo "<div class='hero-carousel__slide'>";
                echo "<img src=".$row['category_image']." alt=".$row['category_name']." class='img-fluid cat_img'>";
                echo "<a href='sub_categories.php?id=$catId&name=$catName' class='hero-carousel__slideOverlay'>";
                    echo "<h3>".$row['category_name']."</h3>";
                echo "</a>";
            echo "</div>";
        }
    ?>
    </div>
</section>
<!--================ Hero Carousel end =================-->
