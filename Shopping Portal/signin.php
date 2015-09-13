<?php include 'db.php';
session_start();
?>
<?xml version = "1.0" encoding = "utf-8" ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

   <head> 
		<title>Sports Store </title>
		<link rel="stylesheet" type="text/css" href="main.css" media="all">
		<script type="text/javascript">
			function ValidateForm(frm) {
				if (frm.username.value == "") {alert('User Name is required.');frm.username.focus();return false;}
				if (frm.userpassword.value == "") {alert('Password* is required.');frm.userpassword.focus();return false;}
				
			return true; }
			
			</script>
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
		<br/>
		<div id="signin">
		<center style="color:red"><?php echo @$_GET['error']; ?></center><br/>
			<h3 style="padding:3px;">Please enter user ID and Password to continue:</h3><br/>
			<form method="post" action="signin.php" onsubmit="return ValidateForm(this);">
				<table border="1" " width="40%" align="center">
					<tr>
						<td style="width:400px;"> User Email:</td>
						<td> <input type="text" name="username" /></td>
					</tr>
					<tr>
						<td style="width:400px;"> Password:</td>
						<td> <input type="password" name="userpassword" /></td>
					</tr>
					<tr > 
						<td colspan="2" align="center"> 
							<input type="submit" name="login"value="Log In" style="height:25px; width:50px"/>
						</td>
					</tr>
				 </table>
		 </form>
		
			 <?php 
				if(isset($_POST['login'])){
				 //getting the updated data
					$user=$_POST['username'];
					$password=$_POST['userpassword'];
					
					
				$loginquery= "select * from customers where email= '$user' AND password='$password' ";
				$res= mysqli_query($conn, $loginquery);
				$rowcount=mysqli_num_rows($res);
					
					if($rowcount>0)
					{
						header("location:myaccount.php? logged= $user ");
						$_SESSION['user']=$user;
						echo "sucess";
					}
					else{
					 echo "<p style='color:red'><b>Password or user name is not correct</b></p>";
					}
				}
				mysqli_close($conn);
			?>
			
			 <br/>
			<p>If you are not register Please <a href="signup.php"><b>Sign Up</b></a></p>
		</div>
		<div class="footer">
			<h2 style="color:#000; padding-top:60px; text-align:center;"> &copy copy right 2015 - online-sprts-store. All rights reserved</h2>
		</div>
 </body>
 </html>
