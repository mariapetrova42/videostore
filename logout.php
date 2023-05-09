<!DOCTYPE html>
<html>
<head>
    <title>Logout</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    
<?php
     session_start();
     if(isset($_SESSION["member_username"]) && $_SESSION["member_first_name"]!="")
        {
            // echo "<h1>$_SESSION["fullname"]</h1>";
        echo "<h1>{$_SESSION['fullname']}";

            // echo $_SESSION["fullname"];
            echo " logged out successfully.</h1>";
            session_destroy();
     }  
?>
    <br>
    <a href="index.php">Back to sign in</a>

</body>
</html>