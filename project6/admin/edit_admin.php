<?php
include('includes/connection.php');
$query    = "select * from admins where admin_id = {$_GET['id']}";
$result   = mysqli_query($conn, $query);
$adminSet = mysqli_fetch_assoc($result);
// die(print_r($adminSet));
$admin_image_src = $adminSet['admin_image'];
$admin_email=$adminSet["admin_email"];
$admin_password=$adminSet["admin_password"];
$admin_name=$adminSet['admin_name'];
// die($admin_image_src);

if (isset($_POST['submit'])) {

    $email    = $_POST['admin_email'];
    $password = $_POST['admin_password'];
    $fullname = $_POST['admin_name'];

    if (!empty($admin_image = $_FILES['image']['name'])) {
        $admin_image = $_FILES['image']['name'];
        $tmp_name    = $_FILES['image']['tmp_name'];
        $path        = '../images/'.$admin_image;
        move_uploaded_file($tmp_name,$path);
    } else {
        $path = $admin_image_src;
    }
    $query = "UPDATE admins SET admin_name    ='$fullname',
                                admin_email ='$email',
                                admin_password ='$password',
                                admin_image= '$path'
             WHERE admin_id = {$_GET['id']}";
    mysqli_query($conn, $query);
    header("location:manage_admin.php");
}


include('includes/admin_header.php'); ?>

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">Manage Admin</div>
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Update Admin</h3>
                            </div>
                            <hr>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="control-label mb-1">Admin Email</label>
                                    <input name="admin_email" type="text" class="form-control" value="<?php echo $admin_email ?>">
                                </div>
                                <div class="form-group">
                                    <label class="control-label mb-1">Admin New Password</label>
                                    <input name="admin_password" type="password" class="form-control" value="<?php echo $admin_password ?>">
                                </div>
                                <div class="form-group">

                                    <label class="control-label mb-1">Admin Full Name</label>
                                    <input name="admin_name" type="text" class="form-control" value="<?php echo $admin_name ?>">
                                </div>
                                <div class="form-group">
                                    <label class="control-label mb-1">Admin Image</label>
                                    <input name="image" type="file" class="form-control">
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

<?php include('includes/admin_footer.php'); ?>