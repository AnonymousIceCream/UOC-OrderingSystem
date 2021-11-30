<link rel="stylesheet" href="../styles/header_Manage.css">
<body>
<div class="menu textcenter"> 
	<div class="wrapper">
		<ul>
		    <li><a href="../home.php">Home</a></li>
		    <li><a href="../manage_deliveryFee.php">Delivery Fee</a></li>
			<li><a href="../manage_category.php">Category</a></li>
			<li><a href="../manage_food.php">Food</a></li>
			<li><a href="../manage_order.php">Order</a></li>
			<?php
                if (isset($_SESSION["usersName"]))
                {
                    echo "<li><a href = '../../includes/logOut.inc.php'>Log Out</a></li>";
                }
            ?>
		</ul> 
	</div>
</div>
</body>