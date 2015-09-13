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
			<li><a href="cart.php">Shoping Cart</a></li>
			<li><a href="signup.php">Sign Up</a></li>
			<li><a href="myaccount.php">My Account</a></li>
			<li><a href="aboutus.html">Contact Us</a></li>
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
		
		<div id="signup">
			<h3 style="padding:3px;">New User:Sign Up</h3>
			<br/>
			<p>Please fill the below form and start shopping</p>
			<br/>
			<form action="signup.php" method="post" onsubmit="return ValidateForm(this);">
				<center style="color:red"><?php echo @$_GET['error']; ?></center><br/>
				<table width="700" align="center" border="2">
				<tr>
					<td><b>First, Last Name*:</b></td>
					<td>
					<input id="FirstName" name="FirstName" type="text" maxlength="60" style="width:146px; " />
					<input id="LastName" name="LastName" type="text" maxlength="60" style="width:146px;" />
					</td>
				</tr><tr>
					<td><b>Email address*:</b></td>
					<td><input id="email" name="email" type="text" maxlength="60" style="width:300px;" /></td>
				</tr><tr>
					<td><b>Password*:</b></td>
					<td><input id="password" name="password" type="password" maxlength="43" style="width:250px;  " /></td>
				</tr>
				<tr><tr>
					<td><b>Re enter Password*:</b></td>
					<td><input id="password1" name="password1" type="password" maxlength="43" style="width:250px;  " /></td>
				</tr>
					<td><b>Cell Phone:</b></td>
					<td><input id="phone" name="phone" type="text" maxlength="43" style="width:250px;  " /></td>
				</tr><tr>
					<td><b>Fax:</b></td>
					<td><input id="Fax" name="Fax" type="text" maxlength="43" style="width:250px; " /></td>
				</tr><tr>
					<td><b>Address 1*:</b></td>
					<td><input id="StreetAddress1" name="StreetAddress1" type="text" maxlength="120" style="width:300px; " /></td>
				</tr><tr>
					<td><b>City*:</b></td>
					<td><input id="City" name="City" type="text" maxlength="120" style="width:300px; " /></td>
				</tr><tr>
					<td><b>State/Province:</b></td>
					<td><input id="State" name="State" type="text" maxlength="120" style="width:300px;" /></td>
				</tr><tr>
					<td><b>Zip/Postal Code:</b></td>
					<td><input id="Zip" name="Zip" type="text" maxlength="30" style="width:100px; " /></td>
				</tr><tr>
					<td><b>Country*:</b></td>
					<td><input id="Country" name="Country" type="text" maxlength="120" style="width:300px;" /></td>
				</tr><tr></tr>
				<tr>
					<td align="center" colspan="2"><input id="Submit" name="register" type="submit" value="Submit" /></td>
				</tr><tr>
				<td>*  required fields. &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>
				</tr>
			</table>
			<br />
			</form>
		</div>
		
		<div class="footer">
			<h2 style="color:#000; padding-top:60px; text-align:center;"> &copy copy right 2015 - online-sprts-store. All rights reserved</h2>
		</div>
		</div>
 </body>
 <script type="text/javascript">
			function ValidateForm(frm) {
				if (frm.FirstName.value == "") {alert('First Name is required.');frm.FirstName.focus();return false;}
				if (frm.LastName.value == "") {alert('Last Name is required.');frm.LastName.focus();return false;}
				if (frm.email.value == "") {
					alert('Email address is required.');
					frm.email.focus();
					return false;
					}
				if (frm.password.value == "") {alert('Password is required.');frm.password.focus();return false;}
				if (frm.password1.value == "") {alert('re enter password is required.');frm.password1.focus();return false;}
				if (frm.password.value != frm.password1.value) {alert('both passwords dont match');frm.password1.focus();return false;}
				if (frm.email.value.indexOf("@") < 1 || frm.email.value.indexOf(".") < 1) {alert('Please enter a valid email address.');frm.email.focus();return false;}
				if (frm.StreetAddress1.value == "") {alert('Address is required.');frm.StreetAddress1.focus();return false;}
				if (frm.City.value == "") {alert('City is required.');frm.City.focus();return false;}
				if (frm.Country.value == "") {alert('Country is required.');frm.Country.focus();return false;}
			return true; }
			
			</script>
</html>
<?php 
		if(isset($_POST['register'])){
				 //getting data
					$cus_fname=$_POST['FirstName'];
					$cus_lname=$_POST['LastName'];
					$cus_email=$_POST['email'];
					$cus_password=$_POST['password'];
					$cus_phone=$_POST['phone'];
					$cus_adress=$_POST['StreetAddress1'];
					$cus_city=$_POST['City'];
					$cus_state=$_POST['State'];
					$cus_zip=$_POST['Zip'];
					$cus_country=$_POST['Country'];
					echo "Hi $cus_city";
					$_SESSION['user']=$cus_email;
				
		//if user exist
		$if_exist= "SELECT * FROM `customers` WHERE `email` = '$cus_email'";
		$result= mysqli_query($conn, $if_exist);
			if(mysqli_num_rows($result) != 0){
				echo("<script>location.href = 'signup.php? error=User already exist '</script>");
			}
			else{
				$regquery= "INSERT INTO `customers` ( first_name, last_name, phone, email, password, adress, city, zipcode, state, country) 
				VALUES ('$cus_fname','$cus_lname','$cus_phone','$cus_email','$cus_password','$cus_adress','$cus_city','$cus_zip','$cus_state','$cus_country')";
				$res= mysqli_query($conn, $regquery);
				if($res){
					echo("<script>location.href = 'myaccount.php? logged=$cus_fname '</script>");
					//header('Location:myaccount.php? logged=$cus_fname');
				}
				
			}
		}
		mysqli_close($conn);
?>