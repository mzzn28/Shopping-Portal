<?php 
include 'db.php';
session_start();

	if(!$_SESSION['user']){
		header ('location: signin.php?error=Need an ID to view the content...!');
	}
	if(isset($_GET['logged'])){
		$myuser=$_GET['logged'];			
		}
	else{
		$myuser=$_SESSION['user'];
	}
?>
<?xml version = "1.0" encoding = "utf-8" ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

   <head> 
		<title>Sports Store </title>
		<link rel="stylesheet" type="text/css" href="main.css" media="all">
		
   </head>
 <body>
	<div>
	<div class="header_wrapper">       
        <img src="logo.png" alt="Social  Logo" style="float:left;" width="300px" height="110px"  />
		<img src="sports.png" alt="products image" style="float:right; width="400px" height="110px"  />
     </div> <!-- End of header -->
	 <div id="navigation">
		<ul class="navbar">
			<li><a href="index.php">Home</a></li>
			<li><a href="cart.php">Shoping Cart</a></li>
			<li><a href="signup.php">Sign Up</a></li>
			<li><a href="myaccount.php">My Account</a></li>
			<li><a href="aboutus.html">about us</a></li>
			<li><div id="sbox">
			<form method="get" action="search.php" enctype="multipart/form-data">
				<input type="text" placeholder="Search..." name="sbox" />
                 <input type="submit" name="submit" value="search"/>
			</form>
			</div>></li>
		</ul>
	 </div><!-- End of navigation -->
	
		<div id="cus_box">
		<br/>
			<center style="color:red"><?php echo @$_GET['update']; ?></center><br/>
			<?php 
				$get_query= "SELECT * FROM `customers` WHERE `email` = '$myuser'";
				
				$result = mysqli_query($conn,$get_query);
				while($row = mysqli_fetch_array($result)){
					$cus_name=$row['first_name'];
					$cus_id=$row['customer_id'];
				}
			?>
			<?php echo "<h4 style='color:green;'> Welcome $cus_name to our store </h4>"; ?>
			<div id="cus_list">
				<table >
					<tr><td><a href="vieworders.php? user= '.$cus_id.' " >View Previous Orders</a></td></tr>
					<tr><td><a href="changepassword.php">change password</a></td></tr>
					<tr><td><a href="cart.php">Go to Shoping Cart</a></td></tr>
					<tr><td><a href="logout.php">Logout</a></td></tr>
				</table>
			</div>
				
			
		</div>
		<footer class="footer">
			<h2 style="color:#000; padding-top:60px; text-align:center;"> &copy copy right 2015 - online-sprts-store. All rights reserved</h2>
		</footer>
		</div>
 </body>
 </html>