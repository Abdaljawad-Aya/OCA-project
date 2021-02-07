<?php
include('includes/connection.php');

$query    = "select * from products where product_id = {$_GET['id']}";
$result   = mysqli_query($conn, $query);
$productSet = mysqli_fetch_assoc($result);
$product_image_src = $productSet['product_image'];
$category = $productSet['sub_category_id'];
$brand = $productSet['brand_id'];

// die($category);
// die($admin_image_src);

if (isset($_POST['submit'])) {

    $product_name    = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $discount    =  $_POST['discount'];
    $product_desc    = $_POST['product_desc'];
    $product_quantity = $_POST['product_qty'];

    if (!empty($product_image = $_FILES['product_image']['name'])) {
        $product_image = $_FILES['product_image']['name'];
        $tmp_name    = $_FILES['product_image']['tmp_name'];
        $path        = '../images/products/'.$product_image;
        move_uploaded_file($tmp_name, $path);
    } else {
        $path = $product_image_src;
    }

    $query = "UPDATE products SET product_name = '$product_name', product_price = '$product_price', discount = $discount, product_desc = '$product_desc',product_image = '$path', product_quantity = $product_quantity , sub_category_id = $category, brand_id = $brand  WHERE product_id = {$_GET['id']} ";

    // die($query);
    mysqli_query($conn, $query);

    // mysqli_query($conn, $query);
    header("location:manage_products.php");
}


include('includes/admin_header.php'); ?>

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">Manage Products</div>
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Update Product</h3>
                            </div>
                            <hr>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Product Name</label>
                                    <input name="product_name" type="text" class="form-control" value="<?php echo $productSet['product_name'] ?>">
                                </div>
                                <div class=" form-group">
                                    <label for="cc-payment" class="control-label mb-1">Product Description</label>
                                    <input name="product_desc" type="text" class="form-control" value="<?php echo $productSet['product_desc'] ?>">
                                </div>
                                <div class=" form-group">
                                    <label for="cc-payment" class="control-label mb-1">Product Price</label>
                                    <input name="product_price" type="number" class="form-control" value="<?php echo $productSet['product_price'] ?>">
                                </div>
                                <div class=" form-group">
                                    <label for="cc-payment" class="control-label mb-1">Quantity</label>
                                    <input name="product_qty" type="number" class="form-control" value="<?php echo $productSet['product_quantity'] ?>">
                                </div>
                                <div class=" form-group">
                                    <label for="cc-payment" class="control-label mb-1">Discount</label>
                                    <input name="discount" type="number" max="1" min="0" step="0.1" class="form-control" value="<?php echo $productSet['discount'] ?>">
                                </div>
                                <div class=" form-group">
                                    <label for="cc-payment" class="control-label mb-1">Product Image</label>
                                    <input name="product_image" type="file" class="form-control">
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-lg btn-info btn-block" style='width:30%;background-color: #384aec' name="submit">
                                        Save
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>

<?php include('includes/admin_footer.php'); ?>