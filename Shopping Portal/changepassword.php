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
			<li><a href="">Products</a></li>
			<li><a href="">Shoping Cart</a></li>
			<li><a href="signup.php">Sign Up</a></li>
			<li><a href="">My Account</a></li>
			<li><a href="">Contact Us</a></li>
			
		</ul>
	 </div><!-- End of navigation -->
		<div id="cus_box">
			<form method="POST" action="changepassword.php?edit_form=<?php echo $cus_id; ?>" >
				<table>
					<tr>
						<td>Current Password: </td>
						<td><input type="password" name="cpassword" /></td>
					</tr>
					<tr>
						<td>New Password: </td>
						<td><input type="password" name="npassword" /></td>
					</tr>
					<tr>
						<td>Re-enter New Password:</td>
						<td><input type="password" name="npassword1" /></td>
					</tr><tr/><td/>
					<tr>
						<td colspan="2" align="center"> 
						<input type="submit" name="changeit" value="Update" /></td>
					</tr>
			
				 </table>
			</form>
			
		</div>
		<footer class="footer">
			<h2 style="color:#000; padding-top:60px; text-align:center;"> &copy copy right 2015 - online-sprts-store. All rights reserved</h2>
		</footer>
		</div>
 </body>
 </html>
 <?php 
				if(isset($_POST['changeit'])){
				 //getting the updated data
					$edit_entry=$_GET['edit_form'];
					$oldpass=$_POST['cpassword'];
					$npassword=$_POST['npassword'];	
					$npassword1=$_POST['npassword1'];	
					echo $npassword1;
					if($npassword!=$npassword1){
						echo("<script>alert( 'new paswords did not match...!')</script>");
					}else{
					
						$update_query=" UPDATE customers SET password='$npassword' where customer_id='$edit_entry' AND password= '$oldpass' ";
						//$res = mysqli_query($conn, $update_query);
						
						if(mysqli_query($conn, $update_query)){
							echo("<script>location.href = 'myaccount.php?update= Password changed successfully...!'</script>");	
							}
						else{
							echo("<script> alert( 'Error: paswords did not match...!')</script>");	
							}
					}
				}

		mysqli_close($conn);
					
?>