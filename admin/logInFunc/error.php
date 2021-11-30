<?php include('../../includes/constants.inc.php'); ?>
<?php
	if (isset($_SESSION["username"]))
	{

	}
	else
	{
		header("location: ../../index.php");
		exit();
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/logInSubFunc.css">
    <title>Error</title>
    <link rel="shortcut icon" href="../../img/favicon.png" type="image/png"
</head>
<body>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <?php
                if (isset($_GET["error"]))
                {
                    if ($_GET["error"] == "emptyinput")
                    {
                        echo "<p>Fill in all input fields!</p>";
                    }
                    elseif ($_GET["error"] == "invalidUid")
                    {
                        echo "<p>Choose a proper username!</p>";
                    }
                    elseif ($_GET["error"] == "invalidEmail")
                    {
                        echo "<p>Choose a proper email!</p>";
                    }
                    elseif ($_GET["error"] == "passwordMisMatch")
                    {
                        echo "<p>Password mismatch!</p>";
                    }   
                    elseif ($_GET["error"] == "NameTaken")
                    {
                        echo "<p>Name taken!</p>";
                    }   
                    elseif ($_GET["error"] == "stmtFailed")
                    {
                        echo "<p>Something went wrong, try again!</p>";
                    }   
                }

                if (isset($_GET["error"]))
                {
                    if ($_GET["error"] == "emptyinput")
                    {
                        echo "<p>Fill in all input fields!</p>";
                    }
                    elseif ($_GET["error"] == "wrongLogIn")
                    {
                        echo "<p>Incorrect login information!</p>";
                    }
                    elseif ($_GET["error"] == "wrongPassword")
                    {
                        echo "<p>Incorrect Password!</p>";
                    }
                }
            ?>
            <button><a href="logIn.php">Return</a></button>
        </div>
    </div>
</body>
</html>