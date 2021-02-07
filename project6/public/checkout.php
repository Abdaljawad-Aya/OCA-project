<?php
$title = "AMADA | Checkout";
$desc = "we offer many categories of products for many brands with high quality to help you get your order in an easy and simple way.";
require_once("../db_connection.php");
if (!isset($_SESSION)) {
  session_start();
}
if (!isset($_SESSION["user"]) || !isset($_SESSION["order_products"])) {
  header("location:cart.php");
}
$total_price = 0;
function calculate_total($price)
{
  $GLOBALS['total_price'] += $price;
  if ($GLOBALS["total_price"] != 0) {
    $_SESSION["total_price"] = $GLOBALS["total_price"];
  }
}
if (isset($_POST["submit"])) {
  if (isset($_POST["payment"])) {
    if (isset($_SESSION["order_products"])) {
      // Insert into orders tabel
      $customer_id = $_SESSION["user"];
      $total       = $_SESSION["total_price"];
      $order_type  = $_POST["payment"];
      $query       = "INSERT INTO orders(customer_id,total,order_type) VALUES($customer_id,$total,'$order_type')";
      mysqli_query($conn, $query);
      $last_id     = mysqli_insert_id($conn);
      $_SESSION["last_order"] = $last_id;
      foreach ($_SESSION["order_products"] as $product => $value) {
        $quantity  = $_SESSION["order_products"]["$product"]["quantity"];
        $query2    = "INSERT INTO order_products(order_id,product_id,quantity) VALUES($last_id,$product,$quantity)";
        mysqli_query($conn, $query2);
      }
      unset($_SESSION["order_products"]);
      header("location:confirmation.php");
    }
  }
}
require("includes/public_header.php");
?>
<!-- ================ start banner area ================= -->
<section>
  <div class="container my-4">
    <div>
      <h1>Product Checkout</h1>
      <nav aria-label="breadcrumb" class="banner-breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Checkout</li>
        </ol>
      </nav>
    </div>
  </div>
</section>

<!-- ================ end banner area ================= -->

<!-- Paybal -->

<?php
$item_name = 1;
$item_number = 1;
$amount = 1;
$quantity = 1;



?>



<!-- Paybal -->
<!--================Checkout Area =================-->
<?php
$query  = "SELECT * FROM customers WHERE customer_id={$_SESSION['user']}";
$result = mysqli_query($conn, $query);
$row    = mysqli_fetch_assoc($result);
?>
<section class="checkout_area section-margin--small">
  <div class="container">
    <form id="payment" action="" method="post">
      <input type="hidden" name="cmd" value="_cart">
      <input type="hidden" name="business" value="sb-def0n5009037@business.example.com">
      <input type="hidden" name="currency_code" value="USD">
      <input type="hidden" name="upload" value="1">
      <div class="billing_details">
        <div class="row">
          <div class="col-lg-8">
            <h3>Billing Details</h3>
            <div class="row contact_form">
              <div class="col-md-12 form-group p_star">
                <label>First Name</label>
                <input type="text" name="name" class="form-control" value="<?php echo (isset($row['customer_name'])) ? $row['customer_name'] : ''; ?>" required>
              </div>
              <div class="col-md-12 form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="<?php echo (isset($row['customer_email'])) ? $row['customer_email'] : ''; ?>" required>
              </div>
              <div class="col-md-6 form-group p_star">
                <label>Phone number</label>
                <input type="number" name="number" class="form-control" value="<?php echo (isset($row['customer_mobile'])) ? $row['customer_mobile'] : ''; ?>" required>
              </div>
              <div class="col-md-6 form-group p_star">
                <label> Address </label>
                <select name="address" class="country_select" required>
                  <option value="Amman">Amman</option>
                  <option value="Irbid">Irbid</option>
                  <option value="Jarash">Jarash</option>
                </select>
              </div>
              <div class="col-md-12 form-group mb-0">
                <div class="creat_account">
                  <h3>Shipping Notes</h3>
                  <textarea class="form-control" name="message" id="message" rows="1" placeholder="Order Notes"></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="order_box">
              <h2>Your Order</h2>
              <ul class="list">
                <table style="width:100%;">
                  <thead style="color:black">
                    <th>Product</th>
                    <th></th>
                    <th class="text-center">Total</th>
                  </thead>
                  <?php
                  if (isset($_SESSION["order_products"])) {
                    foreach ($_SESSION["order_products"] as $product => $value) {
                      $query = "SELECT * FROM products WHERE product_id=$product";
                      $result = mysqli_query($conn, $query);
                      $row = mysqli_fetch_assoc($result);
                      $quantity = $_SESSION["order_products"][$row["product_id"]]["quantity"];
                      $product_total_price = $_SESSION["order_products"][$row["product_id"]]["total"];
                      calculate_total($_SESSION["order_products"][$row["product_id"]]["total"]);
                      echo '
                                  <tbody>
                                    <td>' . $row["product_name"] . '</td>
                                    <td class="text-center"> x ' . $quantity . '</td>
                                    <td class="text-center">' . $product_total_price . '</td>
                                  </tbody>
                                  
                                  <input id ="item_" type="hidden" name="item_name_' . $item_name . '" value="' . $row["product_name"] . '">
                                  <input type="hidden" name="item_number_' . $item_number . '" value="' . $row["product_id"] . '">
                                  <input type="hidden" name="amount_' . $amount . '" value="' . $row["product_price"] . '">
                                  <input type="hidden" name="quantity_' . $quantity . '" value="' . $_SESSION["order_products"][$row["product_id"]]["quantity"] . '">';


                      $item_name++;
                      $item_number++;
                      $amount++;
                      $quantity++;
                    }
                  }
                  ?>
                </table>
              </ul>
              <ul class="list list_2">
                <li><a href="#">Subtotal <span><?php echo $total_price . " JOD"; ?></span></a></li>
                <li><a href="#">Total <span><?php echo $total_price . " JOD"; ?></span></a></li>
              </ul>
              <div class="payment_item">
                <div class="radion_btn">
                  <input type="radio" id="f-option2" name="payment" value="paypal">
                  <label for="f-option2">Paypal</label>
                  <div class="check"></div>
                </div>
                <div class="radion_btn">
                  <input checked type="radio" id="f-option1" name="payment" value="Cash on Delivery">
                  <label for="f-option1">Cash on Delivery</label>
                  <div class="check"></div>
                </div>
              </div>
              <p>Please check the shipping details and address you entered inorder for the products to be delivered to the right place at the right time.</p>
            </div>
            <div class="creat_account">
              <input type="checkbox" id="f-option4" name="selector">
              <label for="f-option4">I’ve read and accept the </label>
              <a href="#">terms & conditions*</a>
            </div>
            <div class="text-center">
              <input onclick="paypal()" type="submit" name="submit" class="button button-paypal" value="Place Order"></input>
            </div>
          </div>
        </div>
      </div>
  </div>
  </form>
  </div>
</section>
<script script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
</script>
<script>
  var dataform;

  function paypal() {

    if ($("#f-option2").is(':checked')) {

      $("#payment").attr("action", "https://www.sandbox.paypal.com/cgi-bin/websc");
    }
    $("#payment").submit();


  }
</script>
<!--================End Checkout Area =================-->
<?php require("includes/public_footer.php"); ?>