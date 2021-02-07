<?php
include('./includes/connection.php');

if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}
$no_of_records_per_page = 3;
$offset = ($pageno - 1) * $no_of_records_per_page;
$total_pages_sql = "SELECT COUNT(*) FROM sub_categories ";
$result = mysqli_query($conn, $total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);

if (isset($_POST['submit'])) {
    $sub_cat_image = $_FILES['sub_cat_image']['name'];
    $tmp_name    = $_FILES['sub_cat_image']['tmp_name'];
    $path        = '../images/subCat/'. $sub_cat_image;
    move_uploaded_file($tmp_name, $path);

    $sub_cat_name    = $_POST['sub_cat_name'];
    $sub_cat_desc = $_POST['sub_cat_desc'];
    $cat_select   = $_POST['cat_select'];

    // echo $sub_cat_name."<br>";
    // echo $sub_cat_desc."<br>";
    // echo $cat_select."<br>";
    // die();

    $query = "INSERT INTO sub_categories(sub_category_name, sub_category_desc, sub_category_image, category_id)
             values('$sub_cat_name','$sub_cat_desc','$path', $cat_select)";
    mysqli_query($conn, $query);
    header("location:manage_sub_cat.php");
}
include('includes/admin_header.php'); ?>

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">Manage Sub-Categories</div>
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Creat Sub-Category</h3>
                            </div>
                            <hr>
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="control-label mb-1">Sub-Category Name</label>
                                    <input name="sub_cat_name" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="control-label mb-1">Sub-Category Description</label>
                                    <input name="sub_cat_desc" type="text" class="form-control">
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="select" class=" form-control-label">Category</label>
                                    </div>
                                    <div class="col-12 col-lg-12">
                                        <select name="cat_select" id="select" class="form-control">

                                            <?php $query  = "SELECT * FROM categories";
                                            $result = mysqli_query($conn, $query);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo '<option value="'.$row['category_id'].'">'.$row["category_name"].'</option>';
                                            } ?>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label mb-1">Sub-Category Image</label>
                                    <input name="sub_cat_image" type="file" class="form-control">
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
                            <th>Image</th>
                            <th>Category Name</th>
                            <th>Description</th>
                            <th></th>
                            <th></th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query  = "SELECT * from sub_categories INNER JOIN categories on sub_categories.category_id = categories.category_id LIMIT $offset, $no_of_records_per_page";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>{$row['sub_category_id']}</td>";
                            echo "<td>{$row['sub_category_name']}</td>";
                            echo "<td><img src='{$row['sub_category_image']}' width='100' height='140'></td>";
                            echo "<td>{$row['category_name']}</td>";
                            echo "<td colspan='3'>{$row['sub_category_desc']}</td>";
                            echo "<td><a href='edit_sub_categories.php?id={$row['sub_category_id']}' class='btn btn-primary'>Edit</a></td>";
                            echo "<td><a href='delete_sub_categories.php?id={$row['sub_category_id']}' class='btn btn-danger'>Delete</a></td>";
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