<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "mzaman";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if(isset($_GET['del'])){
	$delete_data=$_GET['del'];
	echo "Hi $delete_data";
	$delete_query= "delete from products where product_id='$delete_data'";
	
	$result=mysqli_query($conn, $delete_query);
		if ($result){
		echo "after run";
		echo("<script>location.href = 'viewproducts.php?deleted= Record Deleted...!'</script>");	
		
	}
	else{echo "fail";}
}

?>