<?php include 'db.php';
session_start();

if(!$_SESSION['admin']){
header ('location: admin.php?error=Need an admistator ID to view...!');
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
        <h1 >Eagle Sports Store</h1>
		
     </div> <!-- End of header -->
	 <div id="sidebar">
	 <ul>
		<p><li> <a href="addproducts.php">Add Product</a></li></p>
		<p><li> <a href="viewproducts.php">View Product</a></li></p>
		<p><li> <a href="#">Manage Orders</a></li></p>
		<p><li> <a href="logout.php">Log Out</a></li></p>
	 </ul>
	 </div>
	 <div id="signin">
	 <p>
	 <?php 
		if(isset($_GET['logged'])){
		$myuser=$_GET['logged'];
		echo "<h4 style='color:green;'>Welcome $myuser to Admin portal<h4>";
		}
	 ?>
	 </p> 
	</div>
</body>
</html>