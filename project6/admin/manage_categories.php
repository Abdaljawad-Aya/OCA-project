<?php
include('includes/connection.php');
include('includes/admin_header.php'); 
if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}
$no_of_records_per_page = 3;
$offset = ($pageno - 1) * $no_of_records_per_page;

$total_pages_sql = "SELECT COUNT(*) FROM categories";
$result = mysqli_query($conn, $total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);


if (isset($_POST['submit'])) {

    $cat_image = $_FILES['cat_image']['name'];
    $tmp_name    = $_FILES['cat_image']['tmp_name'];
    $path        = "../images/categories/".$cat_image;

    move_uploaded_file($tmp_name,$path);

    $cat_name   = $_POST['cat_name'];
    $cat_desc = $_POST['cat_desc'];


    $query = "INSERT INTO categories (category_name,category_desc,category_image)
             values('$cat_name','$cat_desc','$path')";
    mysqli_query($conn, $query);
}

?>

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">Manage Categories</div>
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Creat Categories</h3>
                            </div>
                            <hr>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="control-label mb-1">Category Name</label>
                                    <input name="cat_name" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="control-label mb-1">Category Description</label>
                                    <input name="cat_desc" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="control-label mb-1">Category Image</label>
                                    <input name="cat_image" type="file" class="form-control">

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

        <div class="col-lg-12">
            <!-- DATA TABLE-->
            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th></th>
                            <th></th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query  = "SELECT * FROM categories LIMIT $offset, $no_of_records_per_page";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>{$row['category_id']}</td>";
                            echo "<td>{$row['category_name']}</td>";
                            echo "<td><img src='{$row['category_image']}' width='100' height='140'></td>";
                            echo "<td colspan='3'>{$row['category_desc']}</td>";
                            echo "<td><a href='edit_categories.php?id={$row['category_id']}' class='btn btn-primary'>Edit</a></td>";
                            echo "<td><a href='delete_categories.php?id={$row['category_id']}' class='btn btn-danger'>Delete</a></td>";
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