<?php include('includes/constants.inc.php'); ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>
    <link rel="stylesheet" href="styles/index.css">

    <script src="js/bootstrap.min.js"></script>

    <title>Urban Orchard Café</title>
     <link rel="shortcut icon" href="img/favicon.png" type="image/png">
</head>

<body> 
  <script src="scripts/unload.js"></script>
    <!-- Navbar Section Starts Here -->
  <?php include('includes/header.inc.php'); ?>
    <!-- Navbar Section Ends Here -->
    
    <!-- Carousel -->
    <div id="homeCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="img/coffee-slide-1.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="img/coffee-slide-2.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="img/coffee-slide-3.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="img/coffee-slide-4.jpg" class="d-block w-100" alt="...">
          </div>
        </div>
        
        <a class="carousel-control-prev" href="#homeCarousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next" href="#homeCarousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </a>
    </div>
      <div class="mustTry2">
        <p>
            <?php
                if(isset($_SESSION['completion']))
                {
                    echo $_SESSION['completion'];
                    unset($_SESSION['completion']);
                }
                if(isset($_SESSION['order']))
                {
                    echo $_SESSION['order'];
                    unset($_SESSION['order']);
                }
                if(isset($_SESSION['delivery']))
                {
                    echo $_SESSION['delivery'];
                    unset($_SESSION['delivery']);
                }
                if(isset($_SESSION['back']))
                {
                    echo $_SESSION['back'];
                    unset($_SESSION['back']);
                }
                if(isset($_SESSION['test'])){
                  echo $_SESSION['test'];
                  unset($_SESSION['test']);
                }
            ?>
          </p>
      </div>

    <!-- Categories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <div class="mustTry">
                <h1>Must try <span>flavors</span></h1>
            </div>
			<?php //sql to tbl_food where featured = 'yes'
				$sql = "SELECT * FROM tbl_food WHERE featured = 'Yes'";
				$res = mysqli_query($conn, $sql);
				$count = mysqli_num_rows($res);
				
				if($count > 0){
					while($row = mysqli_fetch_assoc($res)){
						$category_id = $row['id'];
						$prod_title = $row['title'];
						$image_name = $row['image_name'];
						?>
						<a href="<?php echo SITEURL; ?>cafe-menu.php#<?php echo $category_id; ?>">
							<div class="box-3 float-container">
								<?php 
									if($image_name ==""){
										echo "<div class = 'error'>No Image Available</div>";
									}
									else{
										?>
										<img src="<?php echo SITEURL; ?>img/<?php echo $image_name?>" alt="<?php echo $prod_title; ?>" class="img-responsive img-curve">

										<?php
									}
								?>
								
								<h3 class="float-text text-white"><?php echo $prod_title; ?></h3>
							</div>
						</a>
						<?php
					}
				}
				else{
					echo "<div class = 'error'> No Featured</div>";
				}
			?>
           

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <section class="food-menu">
        <p class="text-center">
            <a href="<?php echo SITEURL; ?>cafe-menu.php">See All Foods</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->
    
    <!-- footer Section Starts Here -->
    <footer>
        <div class="footer-mobile">
            <h1>Address</h1>
            <p>104 9th Street Corner 12th<br>Avenue, East Grace Park,<br>Caloocan, Philippines</p>
            
            <h1>Contact Information</h1>
            <p><br>Cell: 09277027997<br>Email: UOC.Management@gmail.com</p>
        </div>

        <div class="footer-sm-mobile">
          <h1>Social Media</h1>
          <a href="https://www.facebook.com/UrbanOrchardCafe">
              <img src="img/facebook.png" alt="facebook icon"/>
          </a>
          <a href="https://www.instagram.com/urbanorchard.ph/?hl=en">
              <img src="img/instagram.png" alt="instagram icon"/>
          </a>
        </div>

        <div class="footer-desktop">
          <ul>
            <li>
              <h1>Address</h1>
              <br>
              <p>104 9th Street Corner 12th<br>Avenue, East Grace Park,<br>Caloocan, Philippines</p>
            </li>
          </ul>
  
          <ul>
            <li>
              <h1>Contact Information</h1>
              <br>
              <p><br>Cell: 09277027997<br>Email: UOC.Management@gmail.com</p>
            </li>
          </ul>
  
          <ul>
            <li>
              <h1>Social Media</h1>
              <a href="https://www.facebook.com/UrbanOrchardCafe">
                  <img src="img/facebook.png" alt="facebook icon"/>
              </a>
              <a href="https://www.instagram.com/urbanorchard.ph/?hl=en">
                <img src="img/instagram.png" alt="instagram icon"/>
              </a>
            </li>
          </ul>
  
          <ul>
            <li>
              <!-- replace with login.php after authentication has been implemented -->
              <a href="admin/securityLogIn/security.php"><h1 id = "manage">For Management</h1></a><br><br>
            </li>
          </ul>
        </div>
    </footer>
    <!-- footer Section Ends Here -->
</body>