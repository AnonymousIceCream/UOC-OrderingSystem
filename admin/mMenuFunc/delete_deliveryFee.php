<?php 
	include('../../includes/constants.inc.php'); 
	//Get ID of admin to be deleted
	$id = $_GET['id'];

// Create Query to Delete Admin 
	$sql = "DELETE FROM tbl_deliveryFee WHERE id=$id";

//Run query
	$res = mysqli_query($conn, $sql);
	
//Check if query successful
	if($res == TRUE){
		//echo "SUCCESS";
//Session variable for message
		$_SESSION['delete'] = "<div class='success'>Fee Deleted</div>";
		header('location:'.SITEURL.'admin/manage_deliveryFee.php');
	
	}
	else {	
		
		$_SESSION['delete'] = "<div class='error'>Failed Deletion</div>";
		header('location:'.SITEURL.'admin/manage_deliveryFee.php');
	}

?>