<?php
session_start();
include 'db.php';

$pro_id=$_GET['add_cart'];	
$i=0;
$found=false;

	if (!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) < 1) { 
		$_SESSION["cart_array"] = array(0 => array("item_id" => $pro_id, "quantity" => 1));
	} 
	else {
		foreach ($_SESSION["cart_array"] as $each_item) { 
		      $i++;
		      while (list($key, $value) = each($each_item)) {
				  if ($key == "item_id" && $value == $p_id) {
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
	$cart_qty=0;	   
	foreach ($_SESSION["cart_array"] as $each_item) {
		$cart_qty += $each_item['quantity'];
	}
	header('Location: details.php? qty=$cart_qty & pro_id=$p_id');
?>