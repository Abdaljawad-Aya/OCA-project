<?php
    session_start();
    $product_id       =$_GET["id"];
    $product_price    =$_GET["price"];
    if(isset($_SESSION["order_products"])){
        $_SESSION["order_products"][$product_id]=["quantity"=>1,"total"=>$product_price];
    }
    else{
        $_SESSION["order_products"][$product_id]=["quantity"=>1,"total"=>$product_price];
    }
    // echo "<pre>";
    // print_r($_SESSION["order_products"]);
    // die();
    header("location:cart.php");
?>