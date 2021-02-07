<?php
include('includes/connection.php');

$query    = "select * from sub_categories where sub_category_id = {$_GET['id']}";
$result   = mysqli_query($conn, $query);
$subCat_Set = mysqli_fetch_assoc($result);
$subCat_image_src = $subCat_Set['sub_category_image'];
$category = $subCat_Set['category_id'];
// die($category);
// die($admin_image_src);

if (isset($_POST['submit'])) {

    $subCat_name = $_POST['sub_cat_name'];
    $subCat_desc = $_POST['sub_cat_desc'];
    if (!empty($sub_cat_image = $_FILES['sub_cat_image']['name'])) {
        $sub_cat_image = $_FILES['sub_cat_image']['name'];
        $tmp_name    = $_FILES['sub_cat_image']['tmp_name'];
        $path        = '../images/subCat/' . $sub_cat_image;
        move_uploaded_file($tmp_name, $path);
    } else {
        $path = $subCat_image_src;
    }

    $query = "UPDATE sub_categories SET sub_category_name = '$subCat_name', sub_category_desc = '$subCat_desc', sub_category_image = '$path', category_id = '$category' WHERE sub_category_id = {$_GET['id']} ";

    // die($query);
    mysqli_query($conn, $query);

    // mysqli_query($conn, $query);
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
                                <h3 class="text-center title-2">Update Sub-Categories</h3>
                            </div>
                            <hr>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Sub-Category Name</label>
                                    <input name="sub_cat_name" type="text" class="form-control" value="<?php echo $subCat_Set['sub_category_name'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Sub-Category Description</label>
                                    <input name="sub_cat_desc" type="text" class="form-control" value="<?php echo $subCat_Set['sub_category_desc'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Sub-Category Image</label>
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

    </div>
</div>
</div>

<?php include('includes/admin_footer.php'); ?>