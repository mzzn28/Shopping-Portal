<?php 
include 'db.php';
include 'cart.php';


	if(!$_SESSION['user']){
		header ('location: signin.php?error=Need an ID to view the content...!');
	}
	if(isset($_GET['logged'])){
		$myuser=$_GET['logged'];			
		}
	else{
		$myuser=$_SESSION['user'];
	}
	if(isset($_POST['submit'])){
		$total=$_POST['price'];			
		}
		
?>
<?php 
				$get_query= "SELECT * FROM `customers` WHERE `email` = '$myuser'";
				
				$result = mysqli_query($conn,$get_query);
				while($row = mysqli_fetch_array($result)){
					$cus_name=$row['first_name'];
					$cus_id=$row['customer_id'];
				}
?>
	<div id="cusbox">
	
			<form action="checkout.php" method="post" >
				
				<table width="700" align="center" border="2">
				<tr>
					<td><b>Credit card No:</b></td>
					<td><input id="card" name="card" type="text" maxlength="43" style="width:250px; " /></td>
				</tr><tr>
					<td><b>Expiration*:</b></td>
					<td><input id="exdate" name="exdate" type="text" maxlength="120" style="width:300px; " /></td>
				</tr>
				<tr>
					<td><b>Shipping Adress:</b></td>
					<td><textarea rows="4" cols="30" id="adress" name="adress" maxlength="60" style="width:300px;" ></textarea></td>
				</tr>
				<tr>
					<td align="center" colspan="2"><input id="Submit" name="register" type="submit" value="Submit" /></td>
				</tr>
			</table>
			<br />
			</form>
	
	
	
	</div>
	
 </body>
 </html>
 <?php
 
	if(isset($_POST['submit'])){
		$cc_no=$_POST['card'];
		$ex_date=$_POST['exdate'];
		$ship_adress=$_POST['adress'];
		$total_price=$total;
		$place_order="INSERT INTO `orders`( `product_name`, `customer_id`, `quantity`, `price`, `order_date`, `shipping adress`, `card_no`, `expiration date`)
		VALUES ('$p_name','$cus_id','$qty','$total_price',now(),'$ship_adress','$cc_no','$ex_date')";
		$res= mysqli_query($conn, $place_order);
				if($res){
					echo("<script>location.href = 'myaccount.php? order=order has been Placed...! '</script>");
					//header('Location:myaccount.php? logged=$cus_fname');
				}
				else{
					echo "failure";
				}
	
	}
 
 mysqli_close($conn);
 ?>