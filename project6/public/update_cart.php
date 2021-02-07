<?php
    session_start();
    $product_id    =$_GET["id"];
    $quantity=$_POST["quantity"];
    $total_price=$_GET["price"]*$quantity;
    if(isset($_SESSION["order_products"])){
        $_SESSION["order_products"][$product_id]=["quantity"=>$quantity,"total"=>$total_price];
    }
    else{
        $_SESSION["order_products"][$product_id]=["quantity"=>$quantity,"total"=>$total_price];
    }
    header("location:cart.php");
?>