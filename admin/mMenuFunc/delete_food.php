<?php include('../../includes/constants.inc.php'); ?>
<?php include('../../includes/header-AdminMenu.inc.php'); ?>

<?php 
	if(isset($_GET['id']) AND isset($_GET['image_name'])){
		//delete
		//echo "Process to Delete";
		
		//get id and img name
		$id = $_GET['id'];
		$image_name = $_GET['image_name'];
		
		
		//remove image if available
		//check if there is an image
		if($image_name != ""){
			//has image
			//get image pathinfo
			$path = "../../img/".$image_name;
			
			//remove file from folder
			$remove = unlink($path);
			
			//check if removal successful
			if($remove == False){
				//failed to remove
				$_SESSION['imgupload'] = "<div class='error'>Failed to Remove Image</div>";
				header('location:'.SITEURL.'admin/manage-food.php');
				die();
			}
		}
		
		//delete food from database
		$sql = "DELETE FROM tbl_food WHERE id=$id";
		$res = mysqli_query($conn, $sql);
		
		//check if query successful
		if($res == True){
			//food deleted
			$_SESSION['delete'] = "<div class='success'>Food Deleted</div>";
			header('location:'.SITEURL.'admin/manage_food.php');
		}
		else{
			//failed to delete food
			$_SESSION['delete'] = "<div class='error'>Food Not Deleted</div>";
			header('location:'.SITEURL.'admin/manage_food.php');
		}
		
	}
	else{
		//redirect to manage food
		//echo "Redirect";
		$_SESSION['unauthorized'] = "<div class = 'error'>Unauthorized Access</div>";
		header('location:'.SITEURL.'admin/manage_food.php');
	}
	
?>