<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../styles/logInSubFunc.css">
    <title>Forgot Password</title>
    <link rel="shortcut icon" href="../../../img/favicon.png" type="image/png"
</head>
<body>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <h2>Reset your password</h2>
            <p>An e-mail will be send to you with instructions on how to reset your password.</p>

            <form action = "secReqReset.php" method = "post">

                <input type = "text" name = "frgtEmail" placeholder = "Enter your email address..."><br><br>
                   
                <button type = "submit" name = "sbmtForgot">RECEIVE NEW PASSWORD BY MAIL</button>
            </form><br>

            <?php
                if (isset($_GET["reset"]))
                {
                    if ($_GET["reset"] == "success")
                    {
                        echo "<p>Check your e-mail account!</p>";
                    }
                }
            ?>

            <button><a href="../security.php">Return</a></button>
        </div>
    </div>
</body>
</html>

