

<?php
$host = "localhost:3307";
$username = "root";
$password = "";
$database = "project";

$successMessage = "";
$name = $email = $phone = $subject = $message = "";
$nameErr = $emailErr = $phoneErr = $subjectErr = $messageErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    $conn = mysqli_connect($host, $username, $password, $database);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if (empty($name)) {
        $nameErr = "Name is required";
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $nameErr = "Only letters and white space allowed";
    }

    if (empty($email)) {
        $emailErr = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
    }

    if (empty($phone)) {
        $phoneErr = "Phone is required";
    } elseif (!is_numeric($phone) || strlen($phone) != 10) {
        $phoneErr = "Invalid phone number format";
    }

    if (empty($subject)) {
        $subjectErr = "Subject is required";
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $subject)) {
        $subjectErr = "Only letters and white space allowed";
    }

    if (empty($message)) {
        $messageErr = "Message is required";
    }

    if (empty($nameErr) && empty($emailErr) && empty($phoneErr) && empty($subjectErr) && empty($messageErr)) {
        $sql = "INSERT INTO contact_form (name, email, phone, subject, message) VALUES ('$name', '$email', '$phone', '$subject', '$message')";
        if (mysqli_query($conn, $sql)) {
            $successMessage = "Your message is submitted successfully we will contact with you soon!";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

 
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <title>Rental car</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <style>




/* Header Style */
header {
	position: absolute;
	z-index: 99999;
	width: 100%;
	height: 190px;
	background-color:black;
	-webkit-transition: all 0.3s ease-in-out 0s;
    -moz-transition: all 0.3s ease-in-out 0s;
    -o-transition: all 0.3s ease-in-out 0s;
    transition: all 0.3s ease-in-out 0s;
}
header .navbar {
	padding: 17px 0px;
}
.background-header .navbar {
	padding: 17px 0px;
}
.background-header {
	top: 0;
	position: fixed;
	background-color: #fff!important;
	box-shadow: 0px 1px 10px rgba(0,0,0,0.1);
}
.background-header .navbar-brand h2 {
	color: #121212!important;
}
.background-header .navbar-nav a.nav-link {
	color: #1e1e1e!important;
}
.background-header .navbar-nav .nav-link:hover,
.background-header .navbar-nav .active>.nav-link,
.background-header .navbar-nav .nav-link.active,
.background-header .navbar-nav .nav-link.show,
.background-header .navbar-nav .show>.nav-link {
	color: #f33f3f!important;
}
.navbar .navbar-brand {
	float: 	left;
	margin-top: -12px;
	outline: none;
}
.navbar .navbar-brand h2 {
	color: #fff;
	text-transform: uppercase;
	font-size: 24px;
	font-weight: 700;
	-webkit-transition: all .3s ease 0s;
    -moz-transition: all .3s ease 0s;
    -o-transition: all .3s ease 0s;
    transition: all .3s ease 0s;
}
.navbar .navbar-brand h2 em {
	font-style: normal;
	color: #f33f3f;
}
#navbarResponsive {
	z-index: 999;
}
.navbar-collapse {
	text-align: center;
}
.navbar .navbar-nav .nav-item {
	margin: 0px 15px;
}
.navbar .navbar-nav a.nav-link {
	text-transform: capitalize;
	font-size: 15px;
	font-weight: 500;
	letter-spacing: 0.5px;
	color: #fff;
	transition: all 0.5s;
	margin-top: 5px;
}
.navbar .navbar-nav .nav-link:hover,
.navbar .navbar-nav .active>.nav-link,
.navbar .navbar-nav .nav-link.active,
.navbar .navbar-nav .nav-link.show,
.navbar .navbar-nav .show>.nav-link {
	color: #fff;
	padding-bottom: 25px;
	border-bottom: 3px solid #f33f3f;
}
.navbar .navbar-toggler-icon {
	background-image: none;
}
.navbar .navbar-toggler {
	border-color: #fff;
	background-color: #fff;	
	height: 36px;
	outline: none;
	border-radius: 0px;
	position: absolute;
	right: 30px;
	top: 20px;
}
.navbar .navbar-toggler-icon:after {
	content: '\f0c9';
	color: #f33f3f;
	font-size: 18px;
	line-height: 26px;
	font-family: 'FontAwesome';
}


/* Responsive Style */

@media (max-width: 992px) {
	.navbar .navbar-brand {
		position: absolute;
		left: 30px;
		top: 32px;
	}
	.navbar .navbar-brand {
		width: auto;
	}
	.navbar:after {
		display: none;
	}
	#navbarResponsive {
	    z-index: 99999;
	    position: absolute;
	    top: 180px;
	    left: 0;
	    width: 100%;
	    text-align: center;
	    background-color: #fff;
	    box-shadow: 0px 10px 10px rgba(0,0,0,0.1);
	}
	.navbar .navbar-nav .nav-item {
		border-bottom: 1px solid #eee;
	}
	.navbar .navbar-nav .nav-item:last-child {
		border-bottom: none;
	}
	.navbar .navbar-nav a.nav-link {
		padding: 15px 0px;
		color: #1e1e1e!important;
	}
	.navbar .navbar-nav .nav-link:hover,
	.navbar .navbar-nav .active>.nav-link,
	.navbar .navbar-nav .nav-link.active,
	.navbar .navbar-nav .nav-link.show,
	.navbar .navbar-nav .show>.nav-link {
		color: #f33f3f!important;
		border-bottom: none!important;
		padding-bottom: 15px;
	}
	.product-item .down-content h4 {
		margin-bottom: 10px;
	}
	.product-item .down-content h6 {
		margin-bottom: 20px;
	}
}





.container1{
	max-width: 1170px;
	margin:auto;
}
.row{
	display: flex;
	flex-wrap: wrap;
}
ul{
	list-style: none;
	position: relative;
	left: -30px;
}
.footer{
	background-color:black;
    padding: 70px 0;
}
.footer-col{
   width: 25%;
   padding: 0 15px;
}
.footer-col h4{
	font-size: 18px;
	color: #ffffff;
	text-transform: capitalize;
	margin-bottom: 35px;
	font-weight: 500;
	position: relative;
}
.footer-col h4::before{
	content: '';
	position: absolute;
	left:200;
	bottom: -10px;
	background-color: #e91e63;
	height: 2px;
	box-sizing: border-box;
	width: 50px;
}
.footer-col ul li:not(:last-child){
	margin-bottom: 10px;
}
.footer-col ul li a{
	font-size: 16px;
	text-transform: capitalize;
	color: #ffffff;
	text-decoration: none;
	font-weight: 300;
	color: #bbbbbb;
	display: block;
	transition: all 0.3s ease;
}
.footer-col ul li a:hover{
	color: #ffffff;
	padding-left: 8px;
}
.footer-col .social-links a{
	display: inline-block;
	height: 40px;
	width: 40px;
	background-color: rgba(255,255,255,0.2);
	margin:0 10px 10px 0;
	text-align: center;
	line-height: 40px;
	border-radius: 50%;
	color: #ffffff;
	transition: all 0.5s ease;
}
.footer-col .social-links a:hover{
	color: #24262b;
	background-color: #ffffff;
}

/*responsive*/
@media(max-width: 767px){
  .footer-col{
    width: 50%;
    margin-bottom: 30px;
    text-align: center;

}
}
@media(max-width: 574px){
  .footer-col{
    width: 100%;
  

}
}
.container2 {
  max-width: 1200px;
  margin: 0 auto;
  padding: 20px;
  display: flex;
  flex-direction: column;
  align-items: center;
}

.section {
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
  margin-bottom: 20px;
}

.section img {
  max-width: 100%;
  height: auto;
}

@media (min-width: 768px) {
  .section {
    flex-direction: row;
    justify-content: space-between;
    align-items: flex-start;
    text-align: left;
  }

  .section img {
    max-width: 50%;
  }

  .section .text {
    max-width: 40%;
  } 
}
  p {
  font-size: 16px;
    text-align: justify;
}

/* Find Us */

.find-us {
	margin-top: 100px;
}

.find-us p {
	border-bottom: 1px solid #eee;
	padding-bottom: 30px;
	margin-bottom: 30px;
}

.find-us h4 {
	font-size: 17px;
	color: #1a6692;
	margin-bottom: 20px;
}

.find-us .left-content {
	margin-left: 30px;
}



/* Send Message */

.send-message {
	margin-top: 100px;
}

.contact-form select,
.contact-form .form-control {
	font-size: 14px;
	width: 100%;
	height: 44px;
	display: inline-block;
	line-height: 42px;
	border: 1px solid #eee;
	border-radius: 0px;
	margin-bottom: 30px;
}

.contact-form select:focus,
.contact-form .form-control:focus {
	box-shadow: none;
	border: 1px solid #eee;
}

.contact-form textarea {
	font-size: 14px;
	width: 100%;
	min-width: 100%;
	min-height: 120px;
	height: 120px;
	max-height: 180px;
	border: 1px solid #eee;
	border-radius: 0px;
	margin-bottom: 30px;
}

.contact-form textarea:focus {
	box-shadow: none;
	border: 1px solid #eee;
}

.contact-form button.filled-button {
	background-color: #f33f3f;
	color: #fff;
	font-size: 14px;
	text-transform: capitalize;
	font-weight: 300;
	padding: 10px 20px;
	border-radius: 5px;
	display: inline-block;
	transition: all 0.3s;
	border: none;
	outline: none;
	cursor: pointer;
}

.contact-form button.filled-button:hover {
	background-color: #121212;
	color: #fff;
}

.accordion {
	margin-left: 30px;
}

.accordion a {
	cursor: pointer;
	font-size: 17px;
	color: #1a6692!important;
	margin-bottom: 20px;
	transition: all .3s;
}

.accordion a:hover {
	color: #f33f3f!important;
}

.accordion a.active {
  color: #f33f3f!important;
}

.accordion li .content {
  display: none;
  margin-top: 10px;
}

.accordion li:first-child {
	border-top: 1px solid #eee;
}

.accordion li {
	border-bottom: 1px solid #eee;
	padding: 15px 0px;
}

.section-background { 
	background: #f1f1f1; 
}

.section {
	padding: 30px 0;
}

.section p {
	margin-bottom: 15px;
}

.section .section-heading {
	margin-bottom: 45px;
}


/* Responsive Style */
@media (max-width: 768px) {
	.banner .text-content {
		width: 90%;
		margin-left: 5%;
	}
	.banner .text-content h4 {
		font-size: 22px;
	}

	.banner .text-content h2 {
		font-size: 36px;
		letter-spacing: 0.5px;
	}
	.banner-item-01,
	.banner-item-02,
	.banner-item-03 {
		padding: 180px 0px;
	}
	.page-heading .text-content h4 {
		font-size: 22px;
	}

	.page-heading .text-content h2 {
		font-size: 36px;
		letter-spacing: 0.5px;
	}
	.section-heading a {
		float: none;
		margin-top: 0px;
		display: block;
		margin-bottom: 20px;
	}
	.product-item .down-content h4 {
		margin-bottom: 20px!important;
	}
	.best-features .left-content {
		margin-bottom: 30px;
	}
	.call-to-action .inner-content {
		text-align: center;
	}
	.call-to-action .inner-content .filled-button {
		text-align: center;
		width: 100%;
		margin-top: 20px;
	}
	.about-features img {
		margin-bottom: 30px;
	}
	.service-item {
		margin-bottom: 30px;
	}
	.find-us #map {
		margin-bottom: 30px;
	}
	.find-us .left-content {
		margin-left: 0px;
	}
	.send-message .accordion {
		margin-top: 30px;
		margin-left: 0px;
	}
}
.error { color: red; }
        .success { color: blue; }
</style>
    

  </head>

  <body>

    

   
    <!-- Header -->
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="#"><img class="logo"  src="Astro cars.png" style="height:160px; width:190px;" ></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="home.php">Home
                      <span class="sr-only">(current)</span>
                    </a>
                </li> 

                  <li class="nav-item"> <a class="nav-link" href="about.php">About</a></li>
                <li class="nav-item"><a class="nav-link" href="services.php">Services</a></li>
                  <li class="nav-item active"><a class="nav-link" href="contact.php">Contact Us</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Booking</a></li>          
<li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Login</a>
                    
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="admin-login.php">Admin Login</a>
                      <a class="dropdown-item" href="user-login.php">Client Login</a>
             
                    </div>
                </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

    <!-- Page Content -->

      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
         <center>
              <h1>Contact Us</h1>
        </center>
            </div>
          </div>
        </div>
      </div>
    </div>

 <div class="find-us">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Our Location on Maps</h2>
            </div>
          </div>
          <div class="col-md-8">

            <div id="map">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d24142.47060359279!2d73.1246361832833!3d22.287918221399188!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395fc877db07754d%3A0xae632f0b3fbb9f30!2sNavrachana%20University!5e0!3m2!1sen!2sin!4v1696660852343!5m2!1sen!2sin"" width="100%" height="330px" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
          </div>
          <div class="col-md-4">
            <div class="left-content">
              <h4>About our office</h4>
              <p>Our office is staffed by a team of dedicated professionals who are passionate about ensuring you have the best car rental experience possible. Whether you're a seasoned traveler or a first-time renter, our knowledgeable staff is here to assist you with any inquiries, concerns, or preferences you may have. From vehicle selection to rental agreement details, they've got you covered.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
<div class="send-message">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Send us a Message</h2>
            </div>
          </div>
		  <br>
		  <br>
          <div class="col-md-8">
            <div class="contact-form" id="contact-form">
			<p class="success"><?php echo $successMessage; ?></p>
              <form id="contact" method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="name" type="text" class="form-control" id="name" placeholder="Full Name"  value="<?php echo $name; ?>">
					  	<span class="error"><?php echo $nameErr; ?></span>
						  <br>
				  <br>
                    </fieldset>
                  </div>
				 
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="email" type="email" class="form-control" id="email" placeholder="E-Mail " value="<?php echo $email; ?>">
					  <span class="error"><?php echo $emailErr; ?></span>
					  <br>
					  <br>
                    </fieldset>
                     
                  </div>
				  <br>
				  <br>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="phone" type="int" class="form-control" id="email" placeholder="Phone-number "  value="<?php echo $phone; ?>">
					  <span class="error"><?php echo $phoneErr; ?></span>
					 <br>
					 <br>
                    </fieldset>
                  
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="subject" type="text" class="form-control" id="subject" placeholder="Subject"  value="<?php echo $subject; ?>" >
					
					  <span class="error"><?php echo $subjectErr; ?></span>
					<br>
					<br>
                    </fieldset>
                  
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your Message" <?php echo $message; ?>></textarea>
					  <span class="error"><?php echo $messageErr; ?></span>
					  <br>
					  <br>
                    </fieldset>
					
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <button type="submit" id="form-submit" class="filled-button" value="Send Message">Send Message</button>
                    </fieldset>
                  </div>
                </div>
              </form>
            </div>
          </div>
<br>
<br>
<br>
          <div class="col-md-4">
            <img src="assets/images/team_01.jpg" class="img-fluid" alt="" style="height:300px";>

            <h5 class="text-center" style="margin-top: 15px;">John Doe</h5>
          </div>
        </div>
      </div>
    </div>
<br>
<br>
<br>
<footer class="footer">
  	 <div class="container1">
  	 	<div class="row">
  	 		<div class="footer-col">
  	 			<h4>quick links</h4>
  	 			<ul>
  	 			<li><a href="#">Home</a></li>
  	 			<li><a href="#">About</a></li>
  	 			<li><a href="#">Services</a></li>
  	 			<li><a href="#">Contact</a></li>
                                <li><a href="#">Booking</a></li>
  	 			</ul>
  	 		</div>
  	 		<div class="footer-col">
  	 			<h4>terms of use</h4>
  	 			<ul>
  	 				<li><a href="#">ask questions</a></li>
  	 				<li><a href="#">about us</a></li>
  	 				<li><a href="#"> privacy policy</a></li>
  	 				<li><a href="#">terms of use</a></li>
  	 			</ul>
  	 		</div>
  	 		<div class="footer-col">
  	 			<h4>contact info</h4>
  	 			<ul>
  	 				<li><a href="#">phone:9876594210</a></li>
  	 				<li><a href="#">Email:XYZ@gmail.com</a></li>
  	 				<li><a href="#">Address:vadodara, india - 112004</a></li>
  	 			</ul>
  	 		</div>
  	 		<div class="footer-col">
  	 			<h4>follow us</h4>
  	 			<div class="social-links">
  	 				<a href="#"><i class="fab fa-facebook-f" ></i></a>
  	 				<a href="#"><i class="fab fa-twitter"></i></a>
  	 				<a href="#"><i class="fab fa-instagram" ></i></a>
  	 				<a href="#"><i class="fab fa-linkedin-in"></i></a>
  	 			</div>
  	 		</div>
  	 	</div>
  	 </div>
  </footer>

 


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
  </body>
</html>