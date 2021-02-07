<?php 
    $title = "AMADA | Cart";
    $desc = "we offer many categories of products for many brands with high quality to help you get your order in an easy and simple way.";
    if(!isset($_SESSION)){
        session_start();
    }
  unset($_SESSION["order_prducts"]);
  $total_price=0;
  function calculate_total($price){
      $GLOBALS['total_price'] += $price;
      if($GLOBALS["total_price"] != 0){
          $_SESSION["total_price"]=$GLOBALS["total_price"];
		}
    }
    if(isset($_POST["checkout"])){
        if(isset($_SESSION["user"])){
            if(isset($_SESSION["order_products"])){
                header("location:checkout.php");
            }
        }
        else{
            header("location:login.php");
        }
    }
    require("includes/public_header.php");
    ?> 
<!-- ================ start banner area ================= -->	
<section>
	  <div class="container my-4">
					<h1>Shopping Cart</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
            </ol>
          </nav>
			</div>
  </section>
<!-- ================ end banner area ================= -->



<!--================Cart Area =================-->
<section class="cart_area">
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col"></th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(isset($_SESSION["order_products"])){
                                foreach($_SESSION["order_products"] as $product=>$value){
                                    $query="SELECT * FROM products WHERE product_id=$product";
                                    $result=mysqli_query($conn,$query);
                                    $row=mysqli_fetch_assoc($result);
                                    if($row["discount"] != 1){
                                        $price_after_discount=$row["product_price"]-($row["product_price"]*$row["discount"]);
                                    }
                                    else{
                                        $price_after_discount=$row["product_price"];
                                    }
                                    calculate_total($_SESSION["order_products"][$row["product_id"]]["total"]);
                                    echo'
                                    <form action="update_cart.php?id='.$row["product_id"].'&price='. $price_after_discount.'" method="POST">
                                        <tr>
                                            <td>
                                                <div class="media">
                                                    <div class="d-flex">
                                                        <img src="'.$row["product_image"].'" alt="" style="width:100px">
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="media">
                                                    <div class="media-body">
                                                        <p>'.$row["product_name"].'</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <h5>'.$price_after_discount.' JOD</h5>
                                            </td>
                                            <td>
                                                <div class="product_count">
                                                    <input type="number" name="quantity" maxlength="12" min="1" value="'.$_SESSION["order_products"][$row["product_id"]]["quantity"].'" title="Quantity:"
                                                        class="input-text qty">
                                                </div>
                                            </td>
                                            <td>
                                                <h5>'.$_SESSION["order_products"][$row["product_id"]]["total"].' JOD</h5>
                                            </td>
                                            <td>
                                                <button type="submit" name="save" class="button"><i class="fas fa-save"></i></button>
                                            </td>
                                            <td><a href="delete_from_cart.php?id='.$row["product_id"].'"><i class="fas fa-times"></i></a></td>
                                        </tr>
                                    </form>
                                    ';
                                }
                            }
                        ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><h5>Subtotal</h5></td>
                            <td><h5><?php echo $total_price." JOD";?></h5></td>
                        </tr>
                        <tr class="out_button_area">
                            <td class="d-none-l"></td>
                            <td class=""></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <form action="" method="POST">
                                    <div class="checkout_btn_inner d-flex align-items-center">
                                        <a class="button gray_btn" href="shop.php">Continue Shopping</a>
                                        <input type="submit" name="checkout" class="button primary-btn ml-2" value="Proceed to Checkout"></input>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<!--================End Cart Area =================-->
<?php require("includes/public_footer.php"); ?>
