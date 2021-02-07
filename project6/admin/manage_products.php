<?php
include('./includes/connection.php');

if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}
$no_of_records_per_page = 3;
$offset = ($pageno - 1) * $no_of_records_per_page;

$total_pages_sql = "SELECT COUNT(*) FROM products";
$result = mysqli_query($conn, $total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);

if (isset($_POST['submit'])) {
    $product_image = $_FILES['product_image']['name'];
    $tmp_name    = $_FILES['product_image']['tmp_name'];
    $path        = '../images/products/'. $product_image;
    move_uploaded_file($tmp_name, $path);

    $product_name    = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $discount    =  $_POST['discount'];
    $product_desc    = $_POST['product_desc'];
    $product_quantity = $_POST['product_qty'];
    $brand_select   = $_POST['brand_select'];
    $cat_select = $_POST['cat_select'];

    $query = "INSERT INTO products (product_name, product_price, discount,product_desc, product_image, product_quantity, sub_category_id, brand_id)
             values('$product_name',$product_price,$discount,'$product_desc','$path',$product_quantity, $cat_select, $brand_select)";
    mysqli_query($conn, $query);
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
                                <h3 class="text-center title-2">Creat Product</h3>
                            </div>
                            <hr>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Product Name</label>
                                    <input name="product_name" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Product Description</label>
                                    <input name="product_desc" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Product Price</label>
                                    <input name="product_price" type="number" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Quantity</label>
                                    <input name="product_qty" type="number" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Discount</label>
                                    <input name="discount" type="number" max="1" min="0" step="0.1" class="form-control">
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="select" class=" form-control-label">Sub-Category</label>
                                    </div>
                                    <div class="col-12 col-lg-12">
                                        <select name="cat_select" id="select" class="form-control">

                                            <?php $query  = "select * from sub_categories";
                                            $result = mysqli_query($conn, $query);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo '<option value="' . $row['sub_category_id'] . '">' . $row["sub_category_name"] . '</option>';
                                            } ?>

                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="select" class=" form-control-label">Brand</label>
                                    </div>
                                    <div class="col-12 col-lg-12">
                                        <select name="brand_select" id="select" class="form-control">

                                            <?php $query  = "select * from brands";
                                            $result = mysqli_query($conn, $query);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo '<option value="' . $row['brand_id'] . '">' . $row["brand_name"] . '</option>';
                                            } ?>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
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

        <div class="col-md-12">
            <!-- DATA TABLE-->
            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Category Name</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query  = "SELECT * from products INNER JOIN sub_categories on products.sub_category_id = sub_categories.sub_category_id LIMIT $offset, $no_of_records_per_page ";
                        $result = mysqli_query($conn, $query);

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr style='height:50px;overflow:hidden'>";
                            echo "<td>{$row['product_id']}</td>";
                            echo "<td>{$row['product_name']}</td>";
                            echo "<td><img src='{$row['product_image']}' width='100' height='140'></td>";
                            echo "<td>{$row['sub_category_name']}</td>";
                            echo "<td>{$row['product_desc']}</td>";
                            echo "<td>{$row['product_quantity']}</td>";
                            echo "<td>{$row['product_price']}</td>";
                            echo "<td>" .  "{$row['discount']}" . "</td>";
                            echo "<td><a href='edit_products.php?id={$row['product_id']}' class='btn btn-primary' style='padding: 5px 23px; margin-bottom: 0.5rem' >Edit</a>
                             <a href='delete_products.php?id={$row['product_id']}' class='btn btn-danger'>Delete</a></td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
                <nav>
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="?pageno=1">First</a></li>
                        <li class="page-item <?php if ($pageno <= 1) {
                                                    echo 'disabled';
                                                } ?>">
                            <a class="page-link" href="<?php if ($pageno <= 1) {
                                                            echo '#';
                                                        } else {
                                                            echo "?pageno=" . ($pageno - 1);
                                                        } ?>">Prev</a>
                        </li>
                        <li class="page-item <?php if ($pageno >= $total_pages) {
                                                    echo 'disabled';
                                                } ?>">
                            <a class="page-link" href="<?php if ($pageno >= $total_pages) {
                                                            echo '#';
                                                        } else {
                                                            echo "?pageno=" . ($pageno + 1);
                                                        } ?>">Next</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
                    </ul>
                </nav>
            </div>
            <!-- END DATA TABLE-->
        </div>
    </div>
</div>

<?php include('includes/admin_footer.php'); ?>