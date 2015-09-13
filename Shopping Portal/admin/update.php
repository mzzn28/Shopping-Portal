<?php 
include 'db.php';
session_start();
if(!$_SESSION['admin']){
header ('location: admin.php?error=need an admistator ID to view...!');
}
if(isset($_GET['edit'])){
$edit_data=$_GET['edit'];
?>

<?xml version = "1.0" encoding = "utf-8" ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title> Admin Portal </title>
		<link rel="stylesheet" type="text/css" href="styles.css"/>
		<script type="text/javascript">

			function checkblank() {
				 var price= document.forms["updateform"]["price"].value;
				 var instock= document.forms["updateform"]["instock"].value;
	
					if( price==""||instock==""){
						alert("Please fill all the fields");
						return false;
					}
	   return true;  
	}
</script>
</head>
<body>
	<div id="header">       
        <h1 > Sports Store</h1>
		
     </div> <!-- End of header -->
	 <div id=sidebar>
	 <ul>
		<p><li> <a href="viewproducts.php">View Products</a></li></p>
		<p><li> <a href="#">Manage Orders</a></li></p>
		<p><li> <a href="">Log Out</a></li></p>
	 </ul>
	 </div>
	 <form method="post" name="updateform" action="update.php?edit_form=<?php echo $edit_data; ?>" onsubmit= "return checkblank();" enctype="multipart/form-data">
	 <div id="addertable"> 
		 <table width="700" align="center" border="1">
		 
		<?php 
				$get_query= "select *from products where product_id=$edit_data";
				
				$result = mysqli_query($conn,$get_query);
				while($row = mysqli_fetch_array($result)){
				
					$productId=$row['product_id'];
					$productName=$row['name'];
					$price=$row['price'];
					$inStock=$row['in_stock'];
				}
			}
			?>
				 <tr >
				<th colspan="2">Update Product</th>
			 </tr>
			<tr>
				<td> Product ID: </td>
				<td>
					<?php echo $productId; ?>
				</td>
			</tr>
			<tr>
				<td> Product Name </td>
				<td>
					<?php echo $productName; ?>
				</td>
			</tr>
			<tr>
				<td> Product Price: </td>
				<td>
					<input type="text" name="price" value="<?php echo $price; ?>"/>
				</td>
			</tr>
			<tr>
				<td> Product Stock Qty: </td>
				<td>
					<input type="text" name="instock" value="<?php echo $inStock; ?>"/>
				</td>
			</tr>
			
			<tr>
				<td colspan="2" align="center">
					<input type="submit" name="submit" value=" Update Product"/>
				</td>
			</tr>
		 </table>
	 </div>
	 </form>
</body>
</html>
<?php
if(isset($_POST['submit'])){
				 //getting the updated data
				    $edit_entry=$_GET['edit_form'];
					$productPrice=$_POST['price'];
					$productInStock=$_POST['instock'];
					//echo  $productInStock;
					//echo  $productPrice;
					
					$update_query=" UPDATE products SET price='$productPrice', in_stock= '$productInStock' where product_id='$edit_entry' ";
					//$res = mysqli_query($conn, $update_query);
					
					if(mysqli_query($conn, $update_query)){
						echo("<script>location.href = 'viewproducts.php?update= Record updated sucessfully...!'</script>");	
						}
					else{
						echo("<script>location.href = 'viewproducts.php?update= not updated, error...!'</script>");	
						}
				}

			mysqli_close($conn);
?>
