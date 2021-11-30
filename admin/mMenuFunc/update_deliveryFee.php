<?php include('../../includes/constants.inc.php'); ?>
<?php include('../../includes/header-AdminMenu.inc.php'); ?>
<link rel="stylesheet" href="../../styles/manage.css">
<?php
		if (isset($_SESSION["usersName"]))
		{

		}
		else
		{
			header("location: ../../index.php");
			exit();
		}
	?>
<?php 
	//get the id of selected admin
	$id = $_GET['id'];
	
	
	//query to get data
	$sql = "SELECT * FROM tbl_deliveryFee WHERE id=$id";
	
	//run query
	$res=mysqli_query($conn, $sql);
	
	//check if query runs
	if($res==TRUE) {
		$count = mysqli_num_rows($res); //check if data available
		if($count==1){ //check if have data
			//echo "Admin Available";
			$row = mysqli_fetch_assoc($res);
			$oldpostalcode = $row['postalCode'];
			$olddeliveryfee = $row['deliveryFee'];
			$oldlocation = $row['location'];
			$postalcode = $row['postalCode'];
			$deliveryfee = $row['deliveryFee'];
			$locname= $row['location'];
		}
		else {
			//redirect to admin page
			header('location:'.SITEURL.'admin/manage_deliveryFee.php');
		}
	}
?>
<head><title>Update Delivery Fee</title><link rel="shortcut icon" href="../../img/favicon.png" type="image/png"></head>
<div class ="maincontent">
	<div class="wrapper">
		<div class="column">
			<div class="card">
				<h2>Update Delivery Fee</h2>
				
				<form action="" method = "POST">
					<table class ="tbl-full">
					    <tr>
                            <td>Current Location: </td>
                            <td><?php echo $oldlocation; ?></td>
                        </tr>
                        <tr>
                            <td>New Location: </span></td>
                            <td>
                                <input type="text" name ="nlocname">
                            </td>
                        </tr>
						<tr>
							<td>Current Postal Code: </td>
							<td><?php echo $postalcode; ?></td>
						</tr>
						<tr>
							<td>New Postal Code: </span></td>
							<td>
								<input type="number" name ="newpostC">
							</td>
						</tr>
							<tr>
							<td>Current Delivery Fee: </td>
							<td>₱<?php echo $deliveryfee; ?></td>
						</tr>
						<tr>
							<td>New Delivery Fee: </span></td>
							<td>
								<input type="number" name ="newdelFee">
							</td>
						</tr>
						<tr>
							<td></td>
							<td colspan="2">
								<input type ="hidden" name ="id" value = "<?php echo $id?>">
								<input type="submit" name = "submit" value = "Update" class="btn-secondary">
								<input type="submit" name = "cancel" value = "Cancel" class="btn-tertiary">
							</td>
						</tr>
					</table>
				</form>
				
			</div>
		</div>
	</div>
</div>		
			
	<?php 
	if(isset($_POST['cancel'])){
		header('location:'.SITEURL.'admin/manage_deliveryFee.php');
	}
	if(isset($_POST['submit'])) {
		//echo "Clicked Button";
		
		//get all values from form to update
		
		$id = $_POST['id'];
		$newpostC = $_POST['newpostC'];
		$newdelFee = $_POST['newdelFee'];
		$nloc= $_POST['nlocname'];
		
		if($nloc== "")
		{
            $nloc = $oldlocation;
        }
		if($newpostC == ""){
			$newpostC = $oldpostalcode;
		}
		
		if($newdelFee == ""){
			$newdelFee = $olddeliveryfee;
		}
		
		//query to update admin Left Side Database column name right side is variable name 
		$sql = "UPDATE tbl_deliveryFee SET
		postalCode='$newpostC', deliveryFee='$newdelFee', location = '$nloc' WHERE id='$id'";
		
		//run query 
		$res = mysqli_query($conn, $sql);
		
		//checking
		if($res==TRUE) {
			$_SESSION['update'] = "<div class='success'> Update Successful</div>";
			//redirect to admin page
			header('location:'.SITEURL.'admin/manage_deliveryFee.php');
		}
		else {
			$_SESSION['update'] = "<div class='error'> Update Not Wowrking</div>";
			//redirect to admin page
			header('location:'.SITEURL.'admin/manage_deliveryFee.php');
		}
	}
?>
	
			
		