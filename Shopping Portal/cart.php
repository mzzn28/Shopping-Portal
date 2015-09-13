<?php
session_start();
include 'db.php';

if (isset($_POST['pid'])) {
    $pro_id = $_POST['pid'];

$i=0;
$found=false;

	if (!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) < 1) { 
		$_SESSION["cart_array"] = array(0 => array("item_id" => $pro_id, "quantity" => 1));
	} 
	else {
		foreach ($_SESSION["cart_array"] as $each_item) { 
		      $i++;
		      while (list($key, $value) = each($each_item)) {
				  if ($key == "item_id" && $value == $pro_id) {
					 echo "<script>alert('that is aleardy there');</script>"; 
					 echo "Hi\n";
					 $found=true;
				  } 
		      } 
	    } 
	
	}
	 if ($found == false) {
			   array_push($_SESSION["cart_array"], array("item_id" => $pro_id, "quantity" => 1));
		   }
	}
	
?>
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
	<div id="cus_box">
		<br/>
		<?php 
			 if (!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) < 1) {
					echo "<h2 align='center'>Your shopping cart is empty</h2>";
				}else{
		
		?>
		<table cellpadding="5px" cellspacing="1px" style="font-family:Verdana, Geneva, sans-serif; font-size:11px; background-color:#E1E1E1" width="50%">
			<tr>
				<th style="text-align:center">Product Name</th>
				<th style="text-align:left">Product price</th>
				<th style="text-align:left">Qty</th>
			</tr>
			<?php
					$carttotal=0;
					foreach ($_SESSION["cart_array"] as $each_item) { 
						$item_id = $each_item['item_id'];
						$qty= $each_item['quantity'];
						$res = mysqli_query($conn,"SELECT * FROM products WHERE product_id='$item_id' LIMIT 1");
					while ($row = mysqli_fetch_array($res)) {
						$p_name = $row["name"];
						$price = $row["price"];

						echo " <tr><td > $p_name </td>";
						echo " <td > $price </td>";
						echo " <td >$qty </td></tr>";
					
					
					}
					$itemprice=$price;
					$carttotal= $itemprice + $carttotal;
					}
						echo " <tr><td ><b>Your Total is: $carttotal </b></td></tr>";
				
			?>
		</table>
		
		<br/>
		<div>		
					<a href="index.php"><b>Continue Shopping</b></a>
					<br/>
					<form id="form2" name="form2" method="post" action="checkout.php">
						<input type="hidden" name="price" id="price" value="<?php echo $carttotal; ?>" />
						<input type='submit' value= "check-out" name='submit' border='0' style='width:120px; float:right;'>
					</form>
		</div>
	</div>
		
 </body>
 </html>
 <?php
 }
 ?>
 
 