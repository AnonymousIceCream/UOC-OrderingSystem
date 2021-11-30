<?php include('../includes/constants.inc.php'); ?>
<?php include('../includes/header-Admin.inc.php'); ?>
<?php
		if (isset($_SESSION["usersName"]))
		{

		}
		else
		{
			header("location: ../index.php");
			exit();
		}
	?>
<head><title>Manage Delivery Fee</title>
<link rel="shortcut icon" href="../img/favicon.png" type="image/png"></head>
<link rel="stylesheet" href="../styles/manage.css">

<div class="maincontent">
	<div class="wrapper">
	<h1> Manage Delivery Fee </h1>
	<br>
		
	
		<div class="column">
			<div class="card">
			<h3>Add Delivery Fee</h3>
			<?php 
				if(isset($_SESSION['add'])) {
					echo $_SESSION['add']; // display session message
					unset($_SESSION['add']); //removing session message
				}
			?>
			<br>
				<form action="" method="POST">
					<table class="tbl-full">
					    <tr>
    					    <td>Location Name: </td>
                            <td><input type="text" name="loc" placeholder="e.g Caloocan" required></td>
                        </tr>
						<tr>
							<td>Postal Code: </td>
							<td><input  type="number" min="99" name="postalcode" placeholder="0000" required></td>
						</tr>
						<tr>
						    <td>Deivery Fee: </td>
							<td><input type="number" name="delFee" min="1" placeholder="₱1,000,000.00" required></td>
						</tr>
						<tr>
						    <td></td>
							<td>
								<input type="reset" value="Cancel" class="btn-tertiary">
								<input type="submit" name="AdddelFee" value="Add Fee" class="btn-secondary">
							</td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	<?php
	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
function myCustomErrorHandler(int $errNo, string $errMsg, string $file, int $line) {
        echo "Wow my custom error handler got #[$errNo] occurred in [$file] at line [$line]: [$errMsg]";
        // echo '';
        }
		//process value from form and save in database
		//check whether buttons are clicked or not
		if(isset($_POST['AdddelFee'])){
			
			//get data from form
			$postalCode = $_POST['postalcode'];
		    $delFee = $_POST['delFee'];
		    $location = $_POST['loc'];
			
			//query to save data into database left side is name on table made in database columns
			$sql = "INSERT INTO tbl_deliveryFee SET
				postalCode = '$postalCode',
				deliveryFee = '$delFee',
				location = '$location'";
				
			//TO see if query is working
			//echo $sql;
			
			
			// Run query to save data into database
			$res = mysqli_query($conn, $sql) or die(mysqli_error());
			
			//Checking if data is inserted or not
			if($res == TRUE){
				//echo 'IT WORKS MOTHERFUCKER';
				
				//Create session variable to Display Message
				$_SESSION['add'] = "<div class = 'success'>Delivery Fee Added Successfully</div>";
				
				//Redirect to manage admin
				header("location:".SITEURL.'admin/manage_deliveryFee.php');
			}
			else {
				//echo 'PIECE OF SHIT';
				//Create session variable to Display Message
				$_SESSION['add'] = "<div class = 'error'>Failed to Add Delivery Fee</div>";
				
				//Redirect to manage admin
				header("location:".SITEURL.'admin/manage_deliveryFee.php');
			}
		}
	?>
		<div class="column">
			<div class="card">
			<h3>View/Update/Delete Delivery Fee</h3>
			<?php 
				if(isset($_SESSION['delete'])) {
					echo $_SESSION['delete']; // display session message
					unset($_SESSION['delete']); //removing session message
				}
				if(isset($_SESSION['update'])) {
					echo $_SESSION['update']; // display session message
					unset($_SESSION['update']); //removing session message
				}
			?>
			<br>
					<table class="tbl-full">
						<tr>
						    <th>Location</th>
							<th>Postal Code</th>
							<th>Fee</th>
							<th>Options</th>
						</tr>
						
						<?php
							//query to get admin from db
							$sqla = "SELECT * FROM tbl_deliveryFee ORDER BY tbl_deliveryFee.postalCode ASC";
							
							//execute query
							$resa = mysqli_query($conn, $sqla);
							
							//check if query is executed
							if($resa == TRUE) {
								//Count Rows to check for data
								$count = mysqli_num_rows($resa); //function to get all rows
								//Check the num of rows
								if($count > 0) {
									//have rows
									
									//use while loop to get all data
									while($rows = mysqli_fetch_assoc($resa)){
										//get indiv data on the right is coumn names
										$id = $rows['id'];
										$postalC = $rows['postalCode'];
										$deliveryF = $rows['deliveryFee'];
										$locname= $rows['location'];

										
										//display vals in table
									?>
									<tr>
									    <td><?php echo $locname; ?></td>
										<td><?php echo $postalC; ?></th>
										<td>₱<?php echo $deliveryF; ?></th>
										<td>
											<a href="<?php echo SITEURL; ?>admin/mMenuFunc/update_deliveryFee.php?id=<?php echo $id; ?>" class="btn-secondary">Update</a> 
											<a href="<?php echo SITEURL; ?>admin/mMenuFunc/delete_deliveryFee.php?id=<?php echo $id; ?>" class="btn-tertiary">Delete</a>
										</td>
									</tr>
						
								<?php
									}
								}
								else {
									?>
									<tr>
										<td colspan="6"><div class="error">No Fee Found</div></td>
									</tr>
									<?php
								}
							}
						?>
					</table>
			</div>
		</div>
		
	</div>
</div>