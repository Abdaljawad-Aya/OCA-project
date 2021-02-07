<?php
	$title = "AMADA | Login";
	$desc = "we offer many categories of products for many brands with high quality to help you get your order in an easy and simple way.";
	require_once("../db_connection.php");
	session_start();
	if(!isset($_SESSION)){
		session_start();
	}
	if ((isset($_SESSION['user']))){
		header('location:index.php');
	} 
	$email = $password = "";
	$emailErr = $passwordErr = "";

	//filtering the input function
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
                $emailErr = "Invalid User";
            }
        }
        
        
        if (empty($_POST["password"])) {
            $passwordErr = "password is required";
        } else {
            $password = test_input($_POST["password"]);
            // check if password only contains letters and whitespace
            if (!preg_match("/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).{8,32}$/", $password)) {
                $passwordErr = "Invalid User";
            }
        }
        
        
        // Check input errors before inserting in database
        if (empty($passwordErr) && empty($emailErr)) {

			//search 
            $query = "SELECT 
			customer_id FROM customers
			WHERE customer_email = '$email' AND 
			customer_password = '$password'";

			$result=mysqli_query($conn, $query);

            if ($row  = mysqli_fetch_assoc($result)) {
			$_SESSION['user'] =$row['customer_id'];
			header("location:index.php");

			} else {
                $emailErr= "Invalid User";				
            }
        }
    }
    require("includes/public_header.php");

    ?>


  <!--================Login Box Area =================-->
	<section class="login_box_area section-margin" style="margin-top:20px;">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<div class="hover">
							<h4>New to our website?</h4>
							<p>There are advances being made in science and technology everyday, and a good example of this is the</p>
							<a class="button button-account" href="register.php">Create an Account</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>Log in to enter</h3>

						<form class="row login_form" method="POST" action="#/" id="contactForm" >
							<div class="col-md-12 form-group">
								<input type="email" class="form-control" id="name" name="email" placeholder="email" onfocus="this.placeholder = ''" value="<?php echo $email;?>"
								onblur="this.placeholder = 'Email'"><span style="color: red;" class="error "><?php echo $emailErr;?></span>
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="name" name="password" placeholder="Password" onfocus="this.placeholder = ''" 
								value="<?php echo $password;?>" onblur="this.placeholder = 'Password'"><span style="color: red;" class="error "> <?php echo $passwordErr;?></span>
							</div>
							<!-- <div class="col-md-12 form-group">
							</div> -->
							<div class="col-md-12 form-group">
								<button type="submit"
								name="submit" value="submit" class="button button-login w-100">Log In</button>
								<!-- <a href="#">Forgot Password?</a> -->
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->


<?php include("./includes/public_footer.php");?>