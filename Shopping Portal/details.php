<?php
session_start();
include 'db.php';


//$cart=$_GET['qty'];
$product_id=$_GET['pro_id'];
	
?>
<?xml version = "1.0" encoding = "utf-8" ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

   <head> 
		<title> My Sports Store </title>
		<link rel="stylesheet" type="text/css" href="main.css" media="all">
   </head>
 <body>
	
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
			<li><a href="aboutus.html">Contact Us</a></li>
			<li><div id="sbox">
			<form method="get" action="search.php" enctype="multipart/form-data">
				<input type="text" placeholder="Search..." name="sbox" />
                 <input type="submit" name="submit" value="search"/>
			</form>
			</div>></li>
		</ul>
	</div><!-- End of navigation -->
	 <div id="headline">
			<div id="headline_content">
			<b>Welcome Guest!</b>
			<b style="color:yellow;">Shopping Cart </b>
			</div>
		</div>
	 <div class="content_wrapper">
			<div id="products_dbox">
				<?php 
				$get_query="SELECT * FROM `products` where product_id=$product_id";
				$res=mysqli_query($conn,$get_query);
					$row_products=mysqli_fetch_array($res);
						$productId=$row_products['product_id'];
						$productName=$row_products['name'];
						$productPrice=$row_products['price'];
						$productDesc=$row_products['description'];
						$productImage=$row_products['image'];
						echo " <div id='one_dproduct'>
								<br/><br/>
								<img src='admin/images/$productImage' alt='pro'  style=' width='200px' height=200px; padding-top:5px;'/></br>
								<h4>$productName</h4>
								<p>$productDesc</p>
								<b>Price: $productPrice </b>
						";
					mysqli_close($conn);
				?>
						
						<form id="form1" name="form1" method="post" action="cart.php">
								<input type="hidden" name="pid" id="pid" value="<?php echo $productId; ?>" />	
								<input type='image' name='submit' border='0' src='addtocart.png' alt='PayPal' style='width:150px; float:right;'><br/>
						</form>
							</div>
						
				
				
				</div>
				<div>
					<a href="index.php"><b>Go Back</b></a>
				</div>
			
			</div>	
		
	 
	 <div class="footer">
			<h2 style="color:#000; padding-top:60px; text-align:center;"> &copy copy right 2015 - online-sprts-store. All rights reserved</h2>
		</div>
	 
  </body>
</html>