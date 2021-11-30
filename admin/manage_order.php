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
	<head>
<title>Manage Orders</title>
<link rel="shortcut icon" href="../img/favicon.png" type="image/png">
</head>
<link rel="stylesheet" href="../styles/manageorder.css">

<div class="maincontent">
    <div class="wrapper">
            <h1> Manage Order </h1>
            <br>
            <div class="card">
                <?php
                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }
                ?>

<table class="tbl-full">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Postal Code</th>
                        <th>Region</th>
                        <th>Items</th>
                        <th>Payment Mode</th>
                        <th>Date/time</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>

                    <?php
                        //Get All orders
                        $sql = "SELECT * FROM tbl_orders ORDER BY order_ID DESC";//Display Latest Orders
                        //Execute Query
                        $res = mysqli_query($conn, $sql);
                        //Count rows
                        $count = mysqli_num_rows($res);

                        if($count>0)
                        {
                            //Order available
                            while($row=mysqli_fetch_assoc($res))
                            {
                                //Get All orders details
                                $order_ID = $row['order_ID'];
                                $name = $row['name'];
                                $email = $row['email'];
                                $phonenumber = $row['phonenumber'];
                                $address = $row['address'];
                                $city = $row['city'];
                                $postalcode = $row['postalcode'];
                                $region = $row['region'];
                                $order_items = $row['order_items'];
                                $paymentmode = $row['paymentmode'];
                                $order_date = $row['order_date'];
                                $grand_total = $row['grand_total'];
                                $order_status = $row['order_status'];
                                ?>

                                <tr>
                                    <td><?php echo $name;?></td>
                                    <td><?php echo $email;?></td>
                                    <td><?php echo $phonenumber;?></td>
                                    <td><?php echo $address;?></td>
                                    <td><?php echo $city;?></td>
                                    <td><?php echo $postalcode;?></td>
                                    <td><?php echo $region;?></td>
                                    <td><?php echo $order_items;?></td>
                                    <td><?php echo $paymentmode;?></td>
                                    <td><?php echo $order_date;?></td>
                                    <td><?php echo $grand_total;?></td>
                                    <td><?php echo $order_status;?></td>
                                    <td>
                                        <a href="mOrderFunc/update_order.php?order_ID=<?php echo $order_ID;?>"><button class="btn-secondary">Update</button></a>
                                        <a href="mOrderFunc/delete_order.php?order_ID=<?php echo $order_ID;?>"><button class="btn-tertiary">Delete</button></a>
                                    </td>
                                </tr>

                                <?php
                            }
                        }
                        else
                        {
                            //order not available
                            echo "<tr><td colspan='12' class='error'>Orders Not available</td></tr>";
                        }
                    ?>
                </table>
            </div>
    </div>
</div>