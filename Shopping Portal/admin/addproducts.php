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
		<link rel="stylesheet" type="text/css" href="styles.css"/>
		<script type="text/javascript">

			function checkblank() {
				 var name= document.forms["adder"]["productName"].value;
				 var cat= document.forms["adder"]["productcategory"].value;
				 var price= document.forms["adder"]["price"].value;
				 var instock= document.forms["adder"]["instock"].value;
				 var keywords= document.forms["adder"]["keywords"].value;
				 var desc= document.forms["adder"]["description"].value;
				 var image= document.forms["adder"]["image"].value;
				
					if(name=="" || cat==""|| price==""||instock==""||keywords==""||desc==""||image==""){
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
		<p><li> <a href="logout.php">Log Out</a></li></p>
	 </ul>
	 </div>
	 <form method="post" name="adder" action="addproducts.php" onsubmit= "return checkblank();" enctype="multipart/form-data">
	 <div id="addertable"> 
		 <table width="700" align="center" border="1">
			 <tr >
				<th colspan="2">Insert New Product</th>
			 </tr>
			<tr>
				<td> Product Name: </td>
				<td>
					<input type="text" name="productName"/>
				</td>
			</tr>
			<tr>
				<td> Product Category: </td>
				<td>
					<select name="productcategory">
					<option value="" >Select One</option>
					<?php 
					$query= "select * from product_category";
					$res=mysqli_query($conn,$query );

						while($row = mysqli_fetch_array($res)){
							$catId=$row['category_id'];
							$catName=$row['category_name'];
						echo "<option value=$catId>$catName</option>";
						}
					?>
					</select>
				</td>
			</tr>
			<tr>
				<td> Product Price: </td>
				<td>
					<input type="text" name="price"/>
				</td>
			</tr>
			<tr>
				<td> Product Stock Qty: </td>
				<td>
					<input type="text" name="instock"/>
				</td>
			</tr>
			<tr>
				<td> Load an image: </td>
				<td>
					<input type="file" name="image"/>
				</td>
			</tr>
			<tr>
				<td> Product keywords: </td>
				<td>
					<input type="text" name="keywords"/>
				</td>
			</tr>
			<tr>
				<td> Product Description: </td>
				<td>
					<textarea rows="2" cols="25" name="description"></textarea>
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					<input type="submit" name="add_products" value=" Add Product"/>
				</td>
			</tr>
		 </table>
	 </div>
	 </form>
</body>
</html>

<?php 
	if(isset($_POST['add_products'])){
	 //text data
		$productName=$_POST['productName'];
		$productCat=$_POST['productcategory'];
		$productPrice=$_POST['price'];
		$productInStock=$_POST['instock'];
		$productKeywords=$_POST['keywords'];
		$productDesc=$_POST['description'];
		echo "Hi $productCat";
	 // image data
		$productImage=$_FILES['image']['name'];
		
		$d_image=$_FILES['image']['tmp_name'];
		
	//uploading images:
		move_uploaded_file($d_image,"images/$productImage");
	//inserting into DB
		$insert_query="INSERT INTO products (name, category_id, description, price, in_stock, image, date,keywords) 
		VALUES ('$productName', '$productCat', '$productDesc', '$productPrice', '$productInStock', '$productImage',NOW(), '$productKeywords')";
		$run_query=mysqli_query($conn, $insert_query);
		
		if($run_query){
			echo "<script>alert('Product added successfully $productCat ')</script>";
		}
	}

mysqli_close($conn);

?>