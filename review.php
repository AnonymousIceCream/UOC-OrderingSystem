<?php  require_once('includes/configReview.inc.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>
    <link rel="stylesheet" href="styles/review.css">
    <title>Urban Orchard Café</title>
     <link rel="shortcut icon" href="img/favicon.png" type="image/png">
</head>
<body>
<script src="scripts/unload.js"></script>
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
              </ul>
            <label for="nav-toggle" class="icon-burger">
              <div class="line"></div>
              <div class="line"></div>
              <div class="line"></div>
            </label>
          </nav>
        </Header>
    <div class="container">
        <div style="padding-top:50px"> </div>
        <main>
          <?php
            mysqli_query($conn, "DELETE FROM poll WHERE submissionDate < CURDATE() - INTERVAL 6 MONTH");

            $result = mysqli_query($conn,"SELECT * FROM poll");

            while($row = mysqli_fetch_array($result))
              {
                $view = $row['feedback'];
                $name = $row['name'];
                $comments = $row['suggestions'];
          ?>
        <div class="reviews-container">
            <!--CONTAINER OF REVIEWER---------------------------->
            <div class="round-container-reviews">
                <!--NAME OF REVIEWER----------------------------->
                <div class="reviewerName"> <?php echo $name; ?></div>
                <!--RATING OF REVIEWER--------------------------->
                <div class="reviewerRate"> <?php echo $view; ?></div>
                <!--COMMENT OF REVIEWER-------------------------->
                <div class="reviewerComment"> <?php echo $comments; ?></div>
            </div>
            <?php
            }
            ?>
            <div class="reviws-padding"></div>
        </div>

        <div class="submission-box-container">
            <form action="includes/feedback.inc.php" method="post" class="form-container">
                <p class="comment-heading">How do you rate Urban Orchard Cafe?</p><br>
                <div class="rating">
                    <div class="cotainerbox">
                        <label class="container-rating">
                            <input type="radio" name="view" value="excellent" id="excellent" required >
                            <span class="checkmark">Excellent</span>
                          </label>
                    </div>
                    <div class="cotainerbox">
                        <label class="container-rating">
                            <input type="radio" name="view" value="good" id="good" required >
                            <span class="checkmark">Good</span>
                          </label>
                    </div>
                    <div class="cotainerbox">
                        <label class="container-rating">
                            <input type="radio" name="view" value="neutral" id="neutral" required >
                            <span class="checkmark">Neutral</span>
                          </label>
                    </div>
                    <div class="cotainerbox">
                        <label class="container-rating">
                            <input type="radio" name="view" value="poor" id="poor" required >
                            <span class="checkmark">Poor</span>
                          </label>
                    </div>

                </div>

                <div class="row">
                    <label for="" class="col-25">Name</label>
                    <input type="text" class="col-75" id= "userName" name="name">
                </div>
                <div class="row">
                    <label for="" class="col-25">Comment</label>
                    <textarea name="comments" style="height:50px"> </textarea>
                </div>
                <div class="comment-btn">
                    <input type="submit" class="sumbitBtn" value="Enter">

                </div>
            </form>
        </div>
        </main>
    <footer>® Urban Orchard Café</footer>
    </div>
</body>
</html>
