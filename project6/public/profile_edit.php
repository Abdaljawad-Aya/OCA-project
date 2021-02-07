<?php 
$title = "AMADA | Edit Profile";
$desc = "we offer many categories of products for many brands with high quality to help you get your order in an easy and simple way.";
require_once("../db_connection.php");
if(!isset($_SESSION)){
    session_start();
}
// f - date
if(!isset($_SESSION['user'])){
    header("location:index.php");
}else{
    $user_id=$_SESSION['user'];
}
// query to marge 4 Tables

$user_date="
SELECT
customer_email,
customer_name,
customer_password,
customer_mobile,
customer_location,
customer_image
FROM customers 
WHERE customer_id= '{$user_id}'
";


$res=mysqli_query($conn,$user_date);

$row= mysqli_fetch_assoc($res);


//----------------- form validation 

// assign  old data  to variable 
	$id=$user_id;
	
	$name = $email = $password = $old_password 
	=$mobile = $location = $image
	= "";
    
	$nameErr = $emailErr = $passwordErr = $old_passwordErr=$mobileErr = $locationErr = $imageErr
	= "";
    
    //validation processes
    
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    if (isset($_POST['submit'])) {
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = test_input($_POST["name"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
                $nameErr = "Only letters and white space allowed";
            }
        }
        
        if (empty($_POST["location"])) {
            $locationErr = "location is required";
        } else {
            $location = ucfirst(test_input($_POST["location"]));
            // check if location only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z-' ]*$/", $location)) {
                $locationErr = "Only letters and white space allowed";
            }
        }
        
        if (empty($_POST["mobile"])) {
            $mobileErr = "mobile is required";
        } else {
            $mobile = test_input($_POST["mobile"]);
            // check if mobile only contains letters and whitespace
            if (!preg_match("/^[0][7][7,8,9]\d{7}$/", $mobile)) {
                $mobileErr = "Only Jordanian NO. are allowed";
            }
        }
        
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }
        }
        
        if (empty($_POST["password"])) {
            $passwordErr = "password is required";
        } else {
            $password = test_input($_POST["password"]);
            // check if password only contains letters and whitespace
            if (!preg_match("/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).{8,32}$/", $password)) {
                $passwordErr = "Password Require that at least one lowercase ,uppercase,number within 8 digit";
            }
        }
        
        if (empty($_POST["old_password"])) {
            $old_passwordErr = "old password is required";
        } else {
            $old_password = test_input($_POST["old_password"]);
            // check if password only contains letters and whitespace
            if (!preg_match("/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).{8,32}$/", $password)) {
                $old_passwordErr = "Password Require that at least one lowercase ,uppercase,number within 8 digit";
            }
            else if ($old_password!=$row['customer_password'] && empty($old_passwordErr)&&empty($password) ){
                $old_passwordErr="passwords does not match";
                $passwordErr="passwords does not match";

            }
        }
        
        if (!isset($_FILES['image'])) {
            $imageErr = "img is required";
        } else {
            $img_name  =  $_FILES['image']['name'];
            $img_size  =  $_FILES['image']['size'];
            $tmp_name  =  $_FILES['image']['tmp_name'];
            $error     =  $_FILES['image']['error'];
            // validation of img size and others
            if ($error === 0) {
                if ($img_size > 125000000) {
                    $em = "Sorry, your file is too large.";
                    // header("Location: products_manage.php?error=$em");
                    echo("<div>$em</div>");
                } else {
                    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                    $img_ex_lc = strtolower($img_ex);
        
                    $allowed_exs = array("jpg", "jpeg", "png");
        
                    if (in_array($img_ex_lc, $allowed_exs)) {
                        // $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                        $img_upload_path = '../images/customers/'.$img_name;
                        move_uploaded_file($tmp_name, $img_upload_path);
                        $image=$img_upload_path;
                    } else {
                        $em = "You can't upload files of this type";
                        // header("Location: index.php?error=$em");
                        echo("<div>$em</div>");
                    }
                }
            } else {
                $em = "unknown error occurred!";
                // header("Location: index.php?error=$em");
                echo("<div>$em</div>");
            }
        }
        // Check input errors before inserting in database
        if (empty($nameErr) && empty($passwordErr)&& empty($emailErr)) {

            if (!isset($img_upload_path)){
                $image=$row['customer_image'];
            }
            
            // Prepare an Update statement
            $edit_sql = "UPDATE customers SET 
            customer_id='$id', 
            customer_name='$name',
            customer_email='$email',
			customer_password='$password',
			customer_location='$location',
			customer_mobile	='$mobile',
			customer_image	='$image'
			where customer_id='$id'&& customer_password='$old_password'";
            mysqli_query($conn, $edit_sql);
            
            function function_alert($msg)
            {
                return "
				<script type='text/javascript'>
				alert('$msg');
				window.location.href = 'admins_manage.php';
				</script>";
            }
            echo(function_alert("Change Done Successfully "));
            
            header("location:profile.php");
        }
    }
    require("./includes/public_header.php");
?>
	<!-- ================ start banner area ================= -->	
    <section>
        <div class="container my-4">
            <div>
        <!-- <h>Product Checkout</h> -->
        <nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Profile</a></li>
            <li class="breadcrumb-item active" aria-current="page">Account</li>
        </ol>
        </nav>
    </div>
</div>
</section>
<!-- ================ end banner area ================= -->



<!--================Profile Area =================-->
	<section class="blog_area single-post-area py-1px ">
        <div class="container">
					<div class="row">
                        <div class="col-lg-4">
							<div class="blog_right_sidebar">
                                <!--================ Personal Card Area =================-->
								<aside class=" single_sidebar_widget author_widget">
									<img class="author_img rounded-circle" 
									width="100" height="100"src="<?php echo (isset($row['customer_image'] ))?$row['customer_image']:"https://uybor.uz/borless/uybor/img/user-images/user_no_photo_300x300.png";?>" alt= "<?php $n= (isset($row['customer_name'] ))?$row['customer_name']:$name;echo ucfirst($n);?>" >
											<h4>
												<?php $n= (isset($row['customer_name'] ))?$row['customer_name']:$name;
											echo ucfirst($n);
											?>
											</h4>
											<h4>
												<?php echo (isset($row['customer_mobile'] ))?$row['customer_mobile']:'Please add your Phone No. !';   ?>
											</h4>
											<h4>
												<?php echo (isset($row['customer_location'] ))?$row['customer_location']:'Please add your location !';   ?>
											</h4>
											<br>
											<div class="my-3">
												<a  href="profile_edit.php"><button class="btn btn-info">Profile Edit</button></a>
											</div>
											<div>
												<a  href="profile.php"><button class="btn btn-info">← Back</button></a>
											</div>
											
											
											<!--================ Personal Card Area =================-->
									</div>
							</div>
							<div class="col-lg-8 posts-list">
								<div class="card">
									<div class="card-body">
										<form method="post" action='' style="display: grid;justify-content:center;"
										enctype="multipart/form-data"
										>
											<label for="validationServer01">Name</label>
											<input type="text" name="name" 
											value="<?php echo (isset($row['customer_name'] ))?$row['customer_name']:null;?>">
											<span  style="color:red;" class="error"> <?php echo $nameErr;?></span>
											<br>

											<label for="validationServer01">Email</label>
											<input type="text" name="email" value="<?php echo (isset($row['customer_email'] ))?$row['customer_email']:null;?>">
											<span style="color:red;"  class="error"> <?php echo $emailErr;?></span>
											<br>
											<br>


											<label for="validationServer01">Old Password</label>
											<input type="text" class="form-control is-valid" id="validationServer01" placeholder="old_password" name="old_password" value="<?php echo $old_password;?>">
											<span  style="color:red;" class="error"> <?php echo $passwordErr;?></span>
											<br>
											<br>
											<label for="validationServer01"> Password</label>
											<input type="text" class="form-control is-valid" id="validationServer01" placeholder="password" name="password" value="<?php echo $password;?>">
											<span  style="color:red;" class="error"> <?php echo $passwordErr;?></span>
											<br>
											<br>
											
											<label for="validationServer01"> Mobile No.</label>
											<input type="text" class="form-control is-valid" id="validationServer01" placeholder="mobile" name="mobile" value="<?php echo (isset($row['customer_mobile'] ))?$row['customer_mobile']:null;?>">
											<span  style="color:red;" class="error"><?php echo $mobileErr;?></span>
											<br>
											<br>
											
											<label for="validationServer01"> Location</label>
											<input type="text" class="form-control is-valid" id="validationServer01" placeholder="location" name="location" value="<?php echo (isset($row['customer_location'] ))?$row['customer_location']:null;?>">
											<span  style="color:red;" class="error"><?php echo $locationErr;?></span>
											<br>
											<br>
											
											<label for="validationServer01"> Image</label>
											<input type="file" class="form-control is-valid" id="validationServer01" placeholder="image" name="image" value="<?php echo (isset($row['customer_image'] ))?$row['customer_image']:null;?>">
											<span class="error"> <?php echo $imageErr;?></span>
											<br>
											<br>
											
											<input style="width: 23rem;" type="submit" name='submit'  value='submit' class="btn btn-primary">
										</form>
									</div>
								</div>
							
							
							</div>
						</div>
					</div>
	</section>
	<!--================Blog Area =================-->
  
<?php require('./includes/public_footer.php');?>
  <script src="vendors/jquery/jquery-3.2.1.min.js"></script>
  <script src="vendors/bootstrap/bootstrap.bundle.min.js"></script>
  <script src="vendors/skrollr.min.js"></script>
  <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
  <script src="vendors/nice-select/jquery.nice-select.min.js"></script>
  <script src="vendors/jquery.ajaxchimp.min.js"></script>
  <script src="vendors/mail-script.js"></script>
  <script src="js/main.js"></script>
</body>
</html>