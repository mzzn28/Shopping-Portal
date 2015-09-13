<?php include 'db.php';
session_start();
if(!$_SESSION['admin']){
header ('location: admin.php?error=need an admistator ID to view...!');
}

?>
<?xml version = "1.0" encoding = "utf-8" ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title> Admin Portal </title>
		<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	<div id="header">       
        <h1 > Sports Store</h1>
		
     </div> <!-- End of header -->
	 <div id=sidebar>
	 <ul>
		<p><li> <a href="addproducts.php">Add Product</a></li></p>
		<p><li> <a href="#">Manage Orders</a></li></p>
		<p><li> <a href="logout.php">Log Out</a></li></p>
	 </ul>
	 </div>
	 <h3> Welcome to admin Panel</h3>
	 <div id="viewtable"> 
	     <center><span style="color:red; font-size: 18pt"> 
			<?php echo @$_GET['deleted']; ?>
			<center style="color:red"><?php echo @$_GET['update']; ?></center><br/>
		 </span></center>
		 <table align='center' border='2' width="600">
		 <tr> 
			<th align='center' bgcolor='orange' colspan='10'> <h3>Viewing All products</h2></th>
		 </tr>
		 <tr align='center' >
			<th>Serial No</th>
			<th>Product ID</th>
			<th>Product Name</th>
			<th>Price</th>
			<th>InStock</th>
			<th>update</th>
			<th>Delete</th>
		 </tr >
				<?php

				$query= "SELECT * FROM products";
				$res=mysqli_query($conn,$query );
				$count=1;
				while($row = mysqli_fetch_array($res)){
				$productId=$row['product_id'];
				$productName=$row['name'];
				$price=$row['price'];
				$inStock=$row['in_stock'];
				?>
			<tr align='center'>
			<td><?php echo $count; $count ++; ?></td>
			<td><?php echo $productId ?></td>
			<td><?php echo $productName ?></td>
			<td><?php echo $price ?></td>
			<td><?php echo $inStock ?></td>
			<td><a href="update.php?edit=<?php echo $productId; ?>">update</a></td>
			<td> <a href="delete.php?del=<?php echo $productId; ?>">Delete</a></td>
		 </tr>
		<?php } 
		mysqli_close($conn);?>
		 </table>
	 </div>
</body>
</html>