<?php 
include 'db.php';
session_start();

	if(!$_SESSION['user']){
		header ('location: signin.php?error=Need an ID to view the content...!');
	}
	else{
		$myuser=$_SESSION['user'];;			
		}
	$get_query= "SELECT * FROM `customers` WHERE `email` = '$myuser'";
				
				$result = mysqli_query($conn,$get_query);
				while($row = mysqli_fetch_array($result)){
					$cus_name=$row['first_name'];
					$cus_id=$row['customer_id'];
				}
?>

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
			<li><a href="">Products</a></li>
			<li><a href="">Shoping Cart</a></li>
			<li><a href="signup.php">Sign Up</a></li>
			<li><a href="">My Account</a></li>
			<li><a href="">Contact Us</a></li>
			<li id="sbox"> <input type="text" placeholder="Search..." name="sbox" />
                 <input type="button" value="search"/></li>
		</ul>
	 </div><!-- End of navigation -->
	 <div id="headline">
			<div id="headline_content">
			<b style="color:yellow;">Shopping Cart </b>
			<span>-Items:- Price:- </span>
			</div>
		</div>
		<div id="cus_box"> 
				<br/>
				 <table align='center' border='2' width="600">
				 <tr> 
					<th align='center' bgcolor='orange' colspan='10'> <h3>Viewing Orders</h2></th>
				 </tr>
				 <tr align='center' >
					<th>Product Name</th>
					<th>Price</th>
					<th>Date</th>
					<th>order Status</th>
				 </tr >
						<?php
						$query= "SELECT * from orders where customer_id='$cus_id'";
						$res=mysqli_query($conn,$query );
						while($row = mysqli_fetch_array($res)){
							$productName=$row['product_name'];
							$productQty=$row['quantity'];
							$ProductPrice=$row['price'];
							$ProductStatus=$row['status'];
						?>
					<tr align='center'>
					<td><?php echo $productName; ?></td>
					<td><?php echo $productQty; ?></td>
					<td><?php echo $ProductPrice; ?></td>
					<td><?php echo $ProductStatus; ?></td>
				 </tr>
					<?php } 
					mysqli_close($conn);?>
				 </table>
			 </div>
			 
		<footer class="footer">
			<h2 style="color:#000; padding-top:60px; text-align:center;"> &copy copy right 2015 - online-sprts-store. All rights reserved</h2>
		</footer>
		</div>
 </body>
 </html>