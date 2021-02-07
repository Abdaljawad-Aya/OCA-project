<?php
include('includes/connection.php');

$query    = "select * from customers where customer_id = {$_GET['id']}";
$result   = mysqli_query($conn, $query);
$customerSet = mysqli_fetch_assoc($result);
$customer_image_src = $customerSet['customer_image'];


echo $customerSet['customer_image'];

if (isset($_POST['submit'])) {
    $email    = $_POST['customer_email'];
    $password = $_POST['customer_password'];
    $fullname = $_POST['customer_name'];
    $location = $_POST['customer_location'];

    if (!empty($customer_image = $_FILES['image']['name'])) {

        $customer_image = $_FILES['image']['name'];
        $tmp_name    = $_FILES['image']['tmp_name'];
        $path        = '../images/customers/'.$customer_image;
        move_uploaded_file($tmp_name, $path);
        // header("location:manage_customers.php");
    } else {
        $path = $customer_image_src;
    }


    $query = "UPDATE customers set customer_name = '$fullname',
        customer_email = '$email',
        customer_password = '$password',
        customer_location = '$location',
        customer_image= '$path'
    where customer_id = {$_GET['id']}";
    mysqli_query($conn, $query);
    header("location:manage_customers.php");
}


include('includes/admin_header.php'); ?>

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">Manage Customers</div>
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Update Customers</h3>
                            </div>
                            <hr>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="control-label mb-1">Customer Email</label>
                                    <input name="customer_email" type="text" class="form-control" value="<?php echo $customerSet['customer_email'] ?>">
                                </div>
                                <div class="form-group">
                                    <label  class="control-label mb-1">customer New Password</label>
                                    <input name="customer_password" type="password" class="form-control" value="<?php echo $customerSet['customer_password'] ?>">
                                </div>
                                <div class="form-group">
                                    <label  class="control-label mb-1">customer Full Name</label>
                                    <input name="customer_name" type="text" class="form-control" value="<?php echo $customerSet['customer_name'] ?>">
                                </div>
                                <div class="form-group">
                                    <label class="control-label mb-1">customer Adress</label>
                                    <input name="customer_location" type="text" class="form-control" value="<?php echo $customerSet['customer_location'] ?>">
                                </div>
                                <div class="form-group">
                                    <label class="control-label mb-1">Customer Image</label>
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
</div>

<?php include('includes/admin_footer.php'); ?>