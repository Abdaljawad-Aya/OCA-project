<?php
require('includes/connection.php');
include('includes/admin_header.php');

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
?>

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="col-md-12">

            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Category Name</th>
                            <th>Description</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>Image</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM products  INNER JOIN sub_categories on products.sub_category_id = sub_categories.sub_category_id LIMIT $offset, $no_of_records_per_page ";
                        $res_data = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_array($res_data)) {
                            echo "<tr>";
                            echo "<td>{$row['product_id']}</td>";
                            echo "<td>{$row['product_name']}</td>";
                            echo "<td>{$row['sub_category_name']}</td>";
                            echo "<td>{$row['product_desc']}</td>";
                            echo "<td>{$row['product_quantity']}</td>";
                            echo "<td>{$row['product_price']}</td>";
                            echo "<td>" .  "{$row['discount']}" . "</td>";
                            echo "<td><img src='images/products/{$row['product_image']}' width='100' height='140'></td>";
                            echo "<td><a href='edit_products.php?id={$row['product_id']}' class='btn btn-primary'>Edit</a></td>";
                            echo "<td><a href='delete_products.php?id={$row['product_id']}' class='btn btn-danger'>Delete</a></td>";
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

        </div>
    </div>
</div>
<?php
include('includes/admin_footer.php');
?>