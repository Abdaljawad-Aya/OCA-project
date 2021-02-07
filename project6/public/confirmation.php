  <?php


  $title = "AMADA | Confirmation";
  $desc = "we offer many categories of products for many brands with high quality to help you get your order in an easy and simple way.";
  require("includes/public_header.php");
  if (!isset($_SESSION["user"])) {
    header("location:cart.php");
  }
  if (isset($_SESSION['order_products'])) {
    unset($_SESSION["order_products"]);
    echo "<script> document.getElementById('cart_count').innerHTML= 0 </script>";
  }
  $total_price = 0;
  function calculate_total($price)
  {
    $GLOBALS['total_price'] += $price;
    if ($GLOBALS["total_price"] != 0) {
      $_SESSION["total_price"] = $GLOBALS["total_price"];
    }
  }
  if (isset($_SESSION["last_order"])) {
    $query  = "SELECT * FROM orders WHERE order_id={$_SESSION['last_order']}";
    $result = mysqli_query($conn, $query);
    $order  = mysqli_fetch_assoc($result);
    $query2 = "SELECT * FROM products INNER JOIN order_products ON products.product_id=order_products.product_id WHERE order_products.order_id={$_SESSION['last_order']}";
    $result2 = mysqli_query($conn, $query2);
  }

  ?>
  <!-- ================ start banner area ================= -->
  <section>
    <div class="container mt-4">
      <div>
        <h1>Order Confirmation</h1>
        <nav aria-label="breadcrumb" class="banner-breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Order Confirmation</li>
          </ol>
        </nav>
      </div>
    </div>
  </section>
  <!-- ================ end banner area ================= -->

  <!--================Order Details Area =================-->
  <section class="order_details section-margin--small mt-4">
    <div class="container">
      <p class=" billing-alert">Thank you. Your order has been received.</p>
      <div class="row mb-5">
        <div class="col-md-6 col-xl-4 mb-4 mb-xl-0">
          <div class="confirmation-card">
            <h3 class="billing-title">Order Info</h3>
            <table class="order-rable">
              <tr>
                <td>Order number</td>
                <td>: <?php echo $order["order_id"] ?></td>
              </tr>
              <tr>
                <td>Date</td>
                <td>: <?php echo $order["purchase_date"] ?></td>
              </tr>
              <tr>
                <td>Total</td>
                <td>: <?php echo $order["total"] ?></td>
              </tr>
              <tr>
                <td>Payment method</td>
                <td>: <?php echo $order["order_type"] ?></td>
              </tr>
            </table>
          </div>
          <div class="checkout_btn_inner d-flex mt-4">
            <a class="button" href="shop.php">Continue Shopping</a>
          </div>
        </div>
        <div class="col-md-6 col-xl-8 mb-4 mb-xl-0">
          <div class="order_details_table mt-0">
            <h2>Order Details</h2>
            <div class="table-responsive">
              <table class="table">
                <thead style="color:black">
                  <th>Product</th>
                  <th></th>
                  <th class="text-center">Total</th>
                </thead>
                <?php
                while ($order_products = mysqli_fetch_assoc($result2)) {
                  $quantity = $order_products["quantity"];
                  $product_total_price = ($order_products["product_price"] - ($order_products["product_price"] * $order_products["discount"])) * $quantity;
                  calculate_total($product_total_price);
                  echo "
                  <tbody>
                  <tr>
                  <td>{$order_products['product_name']}</td>
                  <td class='text-center'> x0{$quantity}</td>
                  <td class='text-center'>{$product_total_price} JOD</td>
                  </tr>
                  ";
                }
                echo "
                <tr>
                  <td style='color:black'>SUBTOTAL</td>
                  <td class='text-center'></td>
                  <td class='text-center'>{$total_price} JOD</td>
                </tr>
                <hr>
                <tr>
                  <td style='color:black'>TOTAL</td>
                  <td class='text-center'></td>
                  <td class='text-center' style='color:black'>{$total_price} JOD</td>
                </tr>
                </tbody>
              ";
                ?>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================End Order Details Area =================-->
  <?php
  require("includes/public_footer.php");
  ?>