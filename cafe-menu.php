<?php include('includes/constants.inc.php'); ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=500, user-scalable=0"/>
    <title>Urban Orchard Café</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@400;700&display=swap" rel="stylesheet">
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
    <link rel="stylesheet" href="styles/cafe-menu.css">
         <link rel="shortcut icon" href="img/favicon.png" type="image/png">
</head>
<body>
<?php $product_ids = array();
		// session_destroy(); //make sure session is empty
		//check if add to cart button has been pressed
		if(filter_input(INPUT_POST, 'add_to_cart')){
			if(isset($_SESSION['shopping_cart'])){
				$count = count($_SESSION['shopping_cart']); //to count how many product is in shopping cart

				$product_ids = array_column($_SESSION['shopping_cart'], 'id'); //sequential array to match array keys to ids

				//pre_r($product_ids);
				if(!in_array(filter_input(INPUT_GET, 'id'), $product_ids)){
					$_SESSION['shopping_cart'][$count] = array
					(
					'id' => filter_input(INPUT_GET, 'id'),
					'name' => filter_input(INPUT_POST, 'name'),
					'price' => filter_input(INPUT_POST, 'price'),
					'quantity' => filter_input(INPUT_POST, 'quantity')
					);
				}
				else{//match array key to product id being added to the cart, if product already exists quantity is increased
					for($i = 0; $i < count($product_ids); $i++){
						if($product_ids[$i] == filter_input(INPUT_GET, 'id')){
							$_SESSION['shopping_cart'][$i]['quantity'] += filter_input(INPUT_POST, 'quantity');//add item quantity to existing quantity
						}
					}
				}

			}
			else{ //if cart does not exist, create first product with array key 0
				$_SESSION['shopping_cart'][0] = array
				(
					'id' => filter_input(INPUT_GET, 'id'),
					'name' => filter_input(INPUT_POST, 'name'),
					'price' => filter_input(INPUT_POST, 'price'),
					'quantity' => filter_input(INPUT_POST, 'quantity')
				);
			}
		}

		//removal of product
		if(filter_input(INPUT_GET, 'action') == 'delete'){
			//loop through all products until it matches id
			foreach($_SESSION['shopping_cart'] as $key => $product){
				if($product['id'] == filter_input(INPUT_GET, 'id')){
					unset($_SESSION['shopping_cart'][$key]); //remove product from shopping cart
				}
			}
			//$_SESSION['shopping_cart'] = array_values($_SESSION['shopping_cart']);
		}

		// pre_r($_SESSION);

		// function pre_r($array){
		// 	echo '<pre>';
		// 	print_r($array);
		// 	echo '</pre>';
		// }
		?>
    
    <Header>
            <nav>
                <input id="nav-toggle" type="checkbox">
                <div class="logo">
                    <img class="logo" src="img/UOC-logo.png" alt="">
                    <a href="index.php">Urban Orchard Café</a>
                </div>
                <ul class="links">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="cafe-menu.php">Menu</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="review.php">Review</a></li>
                    <li><a href="<?php echo SITEURL; ?>ordering/order-guide.php">How to Order</a></li>
                  </ul>
                <label for="nav-toggle" class="icon-burger">
                  <div class="line"></div>
                  <div class="line"></div>
                  <div class="line"></div>
                </label>
              </nav>   
        </Header>
	<div class="container">
	<main>
		<div class="menuSelection">
		 
		<?php //create sql to get category titles and category id
		$sql = "SELECT * FROM tbl_category ORDER BY tbl_category.id ASC";
		$res = mysqli_query($conn, $sql);
		$count = mysqli_num_rows($res);
				
		if($count > 0)
        {
			while($row = mysqli_fetch_assoc($res))
            {
				$category_id = $row['id'];
				$category_title = $row['title'];
				?>
                
				<div class="table-container">
                <h1 class="productName" id="<?php echo $category_title;?>"><?php echo $category_title; ?></h1>

                	<?php
                        $sql2 = "SELECT * FROM tbl_food WHERE category_id = $category_id AND active = 'Yes'";//php to get tbl_food where $category_id = $row2['category_id'] and is active
                        $res2 = mysqli_query($conn, $sql2);
                        $count2 = mysqli_num_rows($res2);
                        
                            if($count2 > 0)
                            {
                                while($row2 = mysqli_fetch_assoc($res2))
                                {
                                        // $prod_id = $row2['id'];
                                        // $prod_title = $row2['title'];
                                        // $prod_price = $row2['price'];
                                        $image_name = $row2['image_name'];
                                        ?>	
										
											<div>										
                                            
                                            <form class="product-container" method="POST" action = "<?php echo SITEURL; ?>cafe-menu.php?action=add&id=<?php echo $row2['id']; ?>" id="addtocart">
                                                <div class="tableProduct" id= "<?php echo $row2['id']; ?>">
                                                    <!-- <a href="<?php echo SITEURL; ?>ordering/order.php?id=<?php echo $prod_id; ?>"> -->
                                                    <?php 
                                                        if($image_name == "")
                                                            echo "<div class = 'error'>No Image Available</div>";
                                                        else
                                                        {//tinanggal ko muna yung a href ng image di ko kasi alam para saan
                                                        ?>
                                                            <img class="productLogo" src="<?php echo SITEURL; ?>img/<?php echo $image_name;?>" >
                                                        <?php
                                                        }
                                                    ?>
                                                    </a>
                                                </div>
												<div class="product-name"><?php echo $row2['title']; ?></div>
                                                <div class="product-description"><?php echo $row2['description']; ?></div>
												<div class="product-price">₱<?php echo $row2['price']; ?></div>
                                                <div class="product-quantity"><input type ="number" name="quantity" class = "form-control-numbers" value="0" min="1"/></div>
												
												<div class="add-product">
												<input type = "hidden" name = "name" value = "<?php echo $row2['title']; ?>">
													<input type = "hidden" name = "price" value = "<?php echo $row2['price']; ?>">
													<input type = "submit" name = "add_to_cart" value = "Add to Cart" class = 'cart-button'/>
												</div>								
                                            </form>
                                        
											</div>                                    
                                    <?php
                                    
                                }
                            }
                            else
                                echo "<div class='error'>No Product Available</div>";
                    ?>
				</div>
                <?php
			}
		}
		else {
			echo "<div class='error'>No Category Available</div>";
		}
		?>
        
		
	</div>
</main>
        <div class="sidebarLeft">
            <div class="sideBarMenu">
                <ul>
					<?php //create sql to get category titles 
						$sql3 = "SELECT * FROM tbl_category ORDER BY tbl_category.id ASC";
						$res3 = mysqli_query($conn, $sql3);
						$count3 = mysqli_num_rows($res3);
						
						if($count3 > 0 ){
							while($row3 = mysqli_fetch_assoc($res3)){
								$category_title = $row3['title'];
								?>
								<a href="#<?php echo $category_title; ?>"><li class="sideBarOptions textColorWhite"><?php echo $category_title; ?></li></a>
								<?php
							}
						}
						else{
							echo "<div class = 'error'>No Categories Available</div>";
						}
					?>

                </ul>
            </div>
        </div>

		<!-- <a href="ordering/cart.php">
			
				<span class="material-icons">shopping_cart</span>
			</div>
		</a> -->

		<a href="ordering/cart.php">
		<div class="cart">
			<i class="fas fa-shopping-cart"></i> 
			<span id="cart-item" class=""></span>
		</div>
		</a>

        <div class="preload">
            <div class="header">
                <button class="header__button" id="btnNav" type="button">
                    <i class="material-icons">restaurant_menu</i>
                </button>
            </div>
            <div class="nav">
                <div class="nav__links">
                    <?php //create sql to get category titles 
						$sql3 = "SELECT * FROM tbl_category ORDER BY tbl_category.id ASC";
						$res3 = mysqli_query($conn, $sql3);
						$count3 = mysqli_num_rows($res3);
						
						if($count3 > 0 ){
							while($row3 = mysqli_fetch_assoc($res3)){
								$category_title = $row3['title'];
								?>
								<a href="#<?php echo $category_title; ?>"><li class="nav__link"><?php echo $category_title; ?></li></a>
								<?php
							}
						}
						else{
							echo "<div class = 'error'>No Categories Available</div>";
						}
					?>
                </div>
                <div class="nav__overlay"></div>
            </div>
            <script src="scripts/sidebar.js"></script>
        </div>
        <script src="scripts/addTocart.js"></script>
        <footer>® Urban Orchard Café</footer> 
    </div>
</body>