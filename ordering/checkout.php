<?php
        include('../includes/constants.inc.php');
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        function myCustomErrorHandler(int $errNo, string $errMsg, string $file, int $line) {
        echo "Wow my custom error handler got #[$errNo] occurred in [$file] at line [$line]: [$errMsg]";
        // echo '';
        }

        $cart_total = 0.0;
        $allItems = '';
        $items = [];
       // $deliveryfee = 50; 
        $total = 0.0;
       // $grand_total += $deliveryfee;
        $pname = '';
        $pqty = '';
        $total = '';

        if(!empty($_SESSION['shopping_cart']))
        {
            foreach($_SESSION['shopping_cart'] as $key => $product)
            {
                $id = $product['id'];
                $pname = $product['name'];
                $pqty = $product['quantity'];
                $cart_total += floatval($product['quantity']) * floatval($product['price']);
                $items[] = "$pname($pqty)";
            }
        }
        $allItems = implode(', ', $items);
    ?>
    <!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Urban Orchard Café</title>
            
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
        <link rel="stylesheet" href="../styles/cafe-menu.css">
             <link rel="shortcut icon" href="../img/favicon.png" type="image/png">
    </head>
    <body>
        <style>
            /*Remove Slider */
            /* Chrome, Safari, Edge, Opera */
            input::-webkit-outer-spin-button,
            input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
            }

            /* Firefox */
            input[type=number] {
            -moz-appearance: textfield;
            }
        </style>
        <div class="container2 row justify-content-center">
            <div class="col-lg-5 px-0 pb-1" id="order">
                <h4 class="text-center text-secondary p-2">Complete your order!</h4>
                <div class="jumbotron p-3 mb-2 text-center">
                    <h1 class="lead"><b>Product(s): </b><?= $allItems;?></h6>
                    <h1 class="lead"><b>Cart Total: ₱</b><?= $cart_total;?></h6>
                    <!-- <h1 class="lead"><b>Delivery Fee: ₱</b><?= $deliveryfee;?></h6> -->
                    <!--<h1 class="lead"><b>Please Note that the Delivery Fee is not included in the Grand Total </b></h6>-->
                </div>
                <form action="" method="post" id="placeOrder" class= "m-4">
                    <input type="hidden" name="products" value="<?= $allItems; ?>">
                    <input type="hidden" name="cart_total" value="<?= $cart_total; ?>">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Enter E-Mail" required>
                    </div>
                    <div class="form-group">
                        <input type="tel" name="phone" class="form-control" placeholder="Enter Phone" required>
                    </div>
                    <div class="form-group">
                        <textarea name="address" class="form-control" rows="3" cols="10" placeholder="Enter Delivery Address Here..."></textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" name="city" class="form-control" placeholder="Enter City" required>
                    </div>
                    <div class="form-group">
                         <select name="postalcode" class="form-control" required>
                            <option value="" hidden>-Select Postal Code-</option>
                            <?php 
                                //Get Categories from tbl_category
                                $sql = "SELECT * FROM tbl_deliveryFee ORDER BY tbl_deliveryFee.postalCode ASC";
                                $res = mysqli_query($conn, $sql);

                                //count rows to find if have categories
                                $count = mysqli_num_rows($res);

                                //if count > 0 categories available
                                if($count > 0){
                                    while($row = mysqli_fetch_assoc($res)){
                                        //get details of category
                                        $zipcode = $row['postalCode'];
                                        $loc = $row['location'];
                                        // $dfeeTEST = $rowTEST['delivery_fee'];
                                        ?>
                                        <option value="<?php echo $zipcode; ?>"><?php echo $loc; ?> - <?php echo $zipcode; ?></option>
                                        <?php
                                    }
                                }
                                else{
                                    ?>
                                    <option value="0">No Postal Code Available</option>
                                    <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" name="region" class="form-control" placeholder="Enter Region" required>
                    </div>
                    <div class="form-group">
                        <select name="pmode" class="form-control">
                            <option value="" hidden>-Select Payment Mode-</option>
                            <option value="Cash On Delivery" selected>Cash On Delivery</option>
                        </select>
                    </div>
                    <div class="form-group">
                    <input type="submit" name="submit" value="Place Order" class="btn btn-success btn-block rounded-pill">
                </div>
                </form>
            </div>
        </div>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

        <script type="text/javascript">
            $(document).ready(function() {
                // Sending Form data to the server
                $("#placeOrder").submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url: '../includes/action.inc.php',
                    method: 'post',
                    data: $('form').serialize() + "&action=order",
                    success: function(response) {
                    $("#order").html(response);
                    }
                });
                });
            });
        </script>        
    </body>
</html>