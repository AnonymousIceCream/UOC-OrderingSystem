<?php include('../../includes/constants.inc.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/logInSubFunc.css">
    <title>Reset Password</title>
    <link rel="shortcut icon" href="../../img/favicon.png" type="image/png"
</head>
<body>
    <div class="container" id="container">
        <div class="form-container sign-up-container">

            <?php
                $selector = $_GET["selector"];
                $validator = $_GET["validator"];

                if (empty($selector) || empty($validator))
                {
                    echo "Could not validate your request!!";
                }
                else 
                {
                    if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false)
                {
            ?>

            <form action = "../../includes/resetPass.inc.php" method = "post">

                <input type = 'hidden' name = 'selector' value = "<?php echo $selector; ?>">
                <input type = 'hidden' name = 'validator' value = "<?php echo $validator; ?>">

                <input type = "password" name = "newPass" placeholder = "Enter new password..."><br><br>
                <input type = "password" name = "reNewPass" placeholder = "Repeat new password..."><br><br>
                <button type = "submit" name = "sbmtReset">RESET PASSWORD</button>
            </form>
                
            <?php
                    }    
                }
            ?>
        </div>
    </div>
</body>
</html>

