<?php include 'db.php';

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
			<li><a href="">Products</a></li>
			<li><a href="">Shoping Cart</a></li>
			<li><a href="signup.php">Sign Up</a></li>
			<li><a href="">My Account</a></li>
			<li><a href="">Contact Us</a></li>
		<li id="sbox"> 
			<form method="get" action="search.php" enctype="multipart/form-data">
				<input type="text" placeholder="Search..." name="sbox" />
                 <input type="submit" name="submit" value="search"/>
			</form>
		</li>
		</ul>
	 </div><!-- End of navigation -->
	 <div id="headline">
			<div id="headline_content">
			<b>Welcome Guest!</b>
			<b style="color:yellow;">Shopping Cart </b>
			<span>-Items:- Price:- </span>
			</div>
		</div>
	 <div class="content_wrapper">
		
		<div id="left_content">
			<div id="list_cat">	All Sections</div>
			<ul id="section_list">
			
				<?php 
					$query= "select * from product_category";
					$res=mysqli_query($conn,$query );

						while($row = mysqli_fetch_array($res)){
							$catId=$row['category_id'];
							$catName=$row['category_name'];
						echo "<li><a href='index.php?cat=$catId'>$catName</a></li>";
						}
					?>
			</ul>
		</div>
		<div id="center_content">
			<div id="products_box">
			<br/>
				<?php 
				if(isset($_GET['submit'])){
				$user_query=$_GET['sbox'];
				
				$search_query="SELECT * FROM products WHERE keywords LIKE '%$user_query%'";
				$res=mysqli_query($conn,$search_query);
				echo "<h4 style='padding:5px;'>Products for $user_query search: </h4>";
					while($row_products=mysqli_fetch_array($res)){
						$productId=$row_products['product_id'];
						$productName=$row_products['name'];
						$productPrice=$row_products['price'];
						$productDesc=$row_products['description'];
						$productImage=$row_products['image'];
						echo " <div id='one_product'>
								<h4>$productName</h4>
								<img src='admin/images/$productImage' alt='pro'  style=' width='200px' height=200px'/></br>
								<a href='details.php?pro_id=$productId' style='float:left;'>Details</a>
								<a href='index.php?add_cart=$productId'>
									<button style='float:right;'>Add to Cart</button></a><br/>
								<b>Price: $productPrice </b>
							</div>
						";
					}
				}"<h4> No such product found, try again </h4>";
				?>
				</div>
			</div>	
		</div>
	 
	 <div class="footer">
			<h2 style="color:#000; padding-top:60px; text-align:center;"> &copy copy right 2015 - online-sprts-store. All rights reserved</h2>
		</div>
	 
  </body>
</html>