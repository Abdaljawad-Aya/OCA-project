<?php
include('includes/connection.php');

$query    = "select * from categories where category_id = {$_GET['id']}";
$result   = mysqli_query($conn, $query);
$catSet = mysqli_fetch_assoc($result);
$cat_image_src = $catSet['category_image'];
// die($admin_image_src);

if (isset($_POST['submit'])) {
    $cat_name    = $_POST['cat_name'];
    $cat_desc = $_POST['cat_desc'];

    if (!empty($cat_image = $_FILES['cat_image']['name'])) {
        $cat_image = $_FILES['cat_image']['name'];
        $tmp_name    = $_FILES['cat_image']['tmp_name'];
        $path        = '../images/categories/' . $cat_image;
        move_uploaded_file($tmp_name, $path);
    } else {
        $path = $cat_image_src;
    }
    $query = "UPDATE categories set category_name ='$cat_name',
                                category_desc ='$cat_desc',
                                category_image= '$path'
             where category_id = {$_GET['id']}";
    mysqli_query($conn, $query);
    header("location:manage_categories.php");
}


include('includes/admin_header.php'); ?>

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">Manage Category</div>
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Update Category</h3>
                            </div>
                            <hr>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Category Name</label>
                                    <input name="cat_name" type="text" class="form-control" value="<?php echo $catSet['category_name'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Category Description</label>
                                    <input name="cat_desc" type="text" class="form-control" value="<?php echo $catSet['category_desc'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Category Image</label>
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
    </div>
</div>
</div>

<?php include('includes/admin_footer.php'); ?>