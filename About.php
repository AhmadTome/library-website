<?php include_once './webservices/API.php';
if(isset($_GET['action'])){
if($_GET['action']=='logout'){
    unset($_SESSION['user']);
    $message='you logged out succesfully';
}
if($_GET['action']=='book_added_succesfully'){
    $message='your Book has been added';
}

}

?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>About Us</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="js/jquery.js" type="text/javascript" ></script>

	<style>
.form{
    background-color: #6d8187 ;
	padding: 10px;
	width: 550px;
	border-radius: 20px;
}

.pt-60 {
  padding-top: 60px;
}

.pt-50 {
  padding-bottom: 50px;
}

  .col-md-6 {
    flex: 0 0 50%;
    max-width: 50%;
  }

  .bold {
font-weight:bold;
}
  .text-uppercase {
  text-transform: uppercase !important;



</style>


    </head>
    <body>
    <center>
        <div class="container">
         <?php include_once './header.php'; ?>


						<div class="pt-50 col-md-6 " style="margin-top: 40px;">
							<img  src="images/about-img.png" alt="">
						</div>


						<div class="pt-60 pt-50">
							<div class="form">

								<h1  class="text-uppercase" style="color:#ffffff" >Contact Us</h1>
								<P><a href = "mailto:library-support@tu.edu.sa" style="color:#000000 ">library-support@tu.edu.sa</a></P>
							</div>
						</div>

	</div>




<?php include_once './footer.php'; ?>

    </center>
</body>
</html>
