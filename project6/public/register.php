<?php
$title = "AMADA | Register";
$desc = "we offer many categories of products for many brands with high quality to help you get your order in an easy and simple way.";
if(!isset($_SESSION)){
	session_start();
	require_once("../db_connection.php");
}
if ((isset($_SESSION['user'])))
	{
		header('location:index.php');
	}
?>

<?php 

//email for testing 
// $email ='rami@mail.com'; $password = "12qw!@QW";

	$email = $password = "";
	$emailErr = $passwordErr = "";

	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
// validation 
    if (isset($_REQUEST['submit'])) {

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
        
        

        // Check input errors before inserting in database
        if (empty($passwordErr) && empty($emailErr)) {
            $query = "SELECT 
			customer_email,
			customer_password FROM customers
			WHERE customer_email = '$email' AND 
			customer_password = '$password'";
            echo'<pre>';
            $result=mysqli_query($conn, $query);

            if (($result)->num_rows>0) {
                // this value is already exist
                $emailErr= "This email {$email} is is already exist ";
            } else {
                // Prepare an insert customer to database
                $sql = "INSERT INTO customers (customer_email,
				customer_password) VALUES ('$email' ,'$password')";

				mysqli_query($conn, $sql);
						// route the user to landing page with session customer id value  of id  
				$query3 = "SELECT customer_id FROM customers WHERE customer_email = '$email'";
				$email = $password = "";
				$result3 = mysqli_query($conn,$query3);
				$row    = mysqli_fetch_assoc($result3);
				$_SESSION['user'] =$row['customer_id'];
				header("location:index.php");
            }
        }
    }
    
	?>

<?php require("includes/public_header.php");?>

  <!--================Login Box Area =================-->
	<section class="login_box_area section-margin" style="margin-top:20px;">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<div class="hover">
							<h4>Already have an account?</h4>
							<p>There are advances being made in science and technology everyday, and a good example of this is the</p>
							<a class="button button-account" href="login.php">Login Now</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner register_form_inner">
						<h3>Create an account</h3>

						<form class="row login_form" action="" method="POST" id="register_form" >

							<div class="col-md-12 form-group">
								<label for="">Email</label>
								<input type="text" class="form-control" id="email" name="email" 
								value="<?php echo $email;?>"
								placeholder="Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address'">
								<span style="color: red;" class="error "> <?php echo $emailErr;?></span>
							</div>
							
             				<div class="col-md-12 form-group">
								<label for="">Password</label>
								<input type="password" class="form-control" id="password" name="password" placeholder="Password" value="<?php echo $password;?>" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'"><span style="color: red;" class="error "> <?php echo $passwordErr;?></span>
            				</div>
							<div class="col-md-12 form-group">
								<button type="submit" name="submit" value="submit" class="button button-login w-100">Register</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->



  <!--================ Start footer Area  =================-->	
	<footer>
		<div class="footer-area footer-only">
			<div class="container">
				<div class="row section_gap">
					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="single-footer-widget tp_widgets ">
							<h4 class="footer_title large_title">Our Mission</h4>
							<p>
								So seed seed green that winged cattle in. Gathering thing made fly you're no 
								divided deep moved us lan Gathering thing us land years living.
							</p>
							<p>
								So seed seed green that winged cattle in. Gathering thing made fly you're no divided deep moved 
							</p>
						</div>
					</div>
					<div class="offset-lg-1 col-lg-2 col-md-6 col-sm-6">
						<div class="single-footer-widget tp_widgets">
							<h4 class="footer_title">Quick Links</h4>
							<ul class="list">
								<li><a href="#">Home</a></li>
								<li><a href="#">Shop</a></li>
								<li><a href="#">Blog</a></li>
								<li><a href="#">Product</a></li>
								<li><a href="#">Brand</a></li>
								<li><a href="#">Contact</a></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-2 col-md-6 col-sm-6">
						<div class="single-footer-widget instafeed">
							<h4 class="footer_title">Gallery</h4>
							<ul class="list instafeed d-flex flex-wrap">
								<li><img src="img/gallery/r1.jpg" alt=""></li>
								<li><img src="img/gallery/r2.jpg" alt=""></li>
								<li><img src="img/gallery/r3.jpg" alt=""></li>
								<li><img src="img/gallery/r5.jpg" alt=""></li>
								<li><img src="img/gallery/r7.jpg" alt=""></li>
								<li><img src="img/gallery/r8.jpg" alt=""></li>
							</ul>
						</div>
					</div>
					<div class="offset-lg-1 col-lg-3 col-md-6 col-sm-6">
						<div class="single-footer-widget tp_widgets">
							<h4 class="footer_title">Contact Us</h4>
							<div class="ml-40">
								<p class="sm-head">
									<span class="fa fa-location-arrow"></span>
									Head Office
								</p>
								<p>123, Main Street, Your City</p>
	
								<p class="sm-head">
									<span class="fa fa-phone"></span>
									Phone Number
								</p>
								<p>
									+123 456 7890 <br>
									+123 456 7890
								</p>
	
								<p class="sm-head">
									<span class="fa fa-envelope"></span>
									Email
								</p>
								<p>
									free@infoexample.com <br>
									www.infoexample.com
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!--================ End footer Area  =================-->



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