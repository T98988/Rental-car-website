<?php
  session_start();
 $dbuser="root";
$dbpass="";
$host="localhost:3307";
$db="vehiclebookings";
$mysqli=new mysqli($host,$dbuser, $dbpass, $db);
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

</style>
 
<body>
<header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="#"><img class="logo"  src="Astro cars.png" style="height:160px; width:190px;" ></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              
            <li class="nav-item"> <a class="nav-link" href="home.php">Home
                     <span class="sr-only">(current)</span>
                    </a>
                </li> 

                <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                <li class="nav-item active"><a class="nav-link" href="services.php">Services</a></li>
                   <li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li>
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
      <!-- Image Header -->
  <center><img class="img-fluid rounded mb-4" src="assets/images/srimg.png" alt=""></center>

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">Services
    </h1>

  
    
    <!-- Marketing Icons Section -->
    <div class="row">
      <div class="col-lg-4 mb-4">
        <div class="card h-100">
          <h4 class="card-header">Enhanced Transport Modes</h4>
          <div class="card-body">
            <p class="card-text">
              We Improve access to public transport for all people and organizations by strengthening
              he condition s for sustainable transport modes.
            </p>
          </div>
          
        </div>
      </div>
      <div class="col-lg-4 mb-4">
        <div class="card h-100">
          <h4 class="card-header">Faster And Safe Travels</h4>
          <div class="card-body">
            <p class="card-text">
              Our Travels reduce traffic growth and congestion by achieving a mode shift from private
              motorized vehicle trips to a more efficient and sustainable mode of transport.
            </p>
          </div>
          
        </div>
      </div>
      <div class="col-lg-4 mb-4">
        <div class="card h-100">
          <h4 class="card-header">Networking</h4>
          <div class="card-body">
            <p class="card-text">
              Create an efficient multimodal public transport network that will facilitate the
              interconnection and interoperability of associated transport network.
            </p>
          </div>
          
        </div>
      </div>
    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->
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

</body>

</html>
