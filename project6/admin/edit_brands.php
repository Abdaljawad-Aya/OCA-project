<?php
include('includes/connection.php');

$query    = "select * from brands where brand_id = {$_GET['id']}";
$result   = mysqli_query($conn, $query);
$brandSet = mysqli_fetch_assoc($result);
$brand_image_src = $brandSet['brand_logo'];
// die($admin_image_src);

if (isset($_POST['submit'])) {

    $name = $_POST['brand_name'];

    if (!empty($brand_image = $_FILES['brand_image']['name'])) {
        $brand_image = $_FILES['brand_image']['name'];
        $tmp_name    = $_FILES['brand_image']['tmp_name'];
        $path        = '../images/brands/' . $brand_image;
        move_uploaded_file($tmp_name, $path);
    } else {
        $path = $brand_image_src;
    }
    $query = "update brands set brand_name ='$name',
                                brand_logo = '$path'
             where brand_id = {$_GET['id']}";
    mysqli_query($conn, $query);
    header("location:manage_brands.php");
}


include('includes/admin_header.php'); ?>

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">Manage Brands</div>
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Update Brand</h3>
                            </div>
                            <hr>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Brand Name</label>
                                    <input name="brand_name" type="text" class="form-control" value="<?php echo $brandSet['brand_name'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Brand Image</label>
                                    <input name="brand_image" type="file" class="form-control">

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