<?php include 'db.php';
session_start();
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
		<p><b><li> Admin Portal</li></b></p>
		<p><li> <a href="admin.php">Log In</a></li></p>
		<p><li> <a href="logout.php">Log out</a></li></p>
	 </ul>
	 </div>
	 <div id="signin">
	 <br/>
	 <p style="color:blue;text-align:center;"> Please enter user and password to log in</p>
	    <form method="post" action="admin.php">
		 <table border="1" " width="33%" align="center">
			<tr>
				<td width="50%"> Admin Id:</td>
				<td> <input type="text" name="adminid" /></td>
			</tr>
			<tr>
				<td width="50%"> Password:</td>
				<td> <input type="password" name="adminpasword" /></td>
			</tr>
			<tr > 
				<td colspan="2" align="center"> 
					<input type="submit" name="login"value="Log In" style="height:25px; width:50px"/>
				</td>
			</tr>
		 </table>
		 </form>
		 <br/>
		 <center><?php echo @$_GET['error']; ?></center>
	 </div>
</body>
</html>

<?php 
	if(isset($_POST['login'])){
	 //getting the updated data
		$user=$_POST['adminid'];
		$password=$_POST['adminpasword'];
		$_SESSION['admin']=$user;
		
	$loginquery= "select * from admin_user where admin_id= '$user' AND admin_password='$password' ";
	$res= mysqli_query($conn, $loginquery);
	$rowcount=mysqli_num_rows($res);
		
		if($rowcount>0)
		{
			header("location:loggedin.php? logged= $user ");
			echo "sucess";
		}
		else{
		 echo "<p style='color:red'><b>Password or user name is not correct</b></p>";
		}
	}
mysqli_close($conn);
?>