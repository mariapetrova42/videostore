<? $page_title = "Video Store Welcome Page"; ?>

<? require 'site_header.php'; ?>

<!DOCTYPE html>
<html>
  <head>
  <title>Video Store Welcome Page</title>
    <link rel="stylesheet" href="styles.css">

  </head>
  <body>
      <img
        src="../images/videostore.png"
        width="100%"
        height="auto"
        alt="Image of Video Store with DVDs for sale">

<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "VideoStore";
        
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn -> connect_error)
    {
        die("Connection failed: " . $conn -> connect_error);
    }
    else
    {
        if(!isset($_POST["member_username"]) || !isset($_POST["member_password"]) || !isset($_POST["is_admin"])) {
            echo "<h2>Please make sure all fields are filled in </h2>";
        }

        $username = $_POST["member_username"];
        $password = $_POST["member_password"];
        $is_admin = $_POST["is_admin"];

        // echo "username: " . $username . "<br>"; 
        // echo "password: " . $password . "<br>"; 
        
        $sql = "SELECT member_first_name, member_last_name, member_username, member_password from member ";
        $sql = $sql . "where member_username = '" . $username . "' and member_password = '" . $password . "';";

        // echo $sql;
        // echo"<br><br>";
        // echo"i am on line 39";

        $result = $conn->query($sql);

        if($result->num_rows > 0)
        {
            // echo"i am on line 45";

            $row = $result->fetch_assoc();
            echo"<div #wrapper>";
                echo "<h1>Video Store Home Screen</h1>";
                echo "<h2>Welcome, " . $row["member_first_name"] . " " . $row["member_last_name"] . ".</h2>";
                echo "<h3>Please Choose an Option Below</h3>";
                // echo "<ul>";
                // echo "<li> <a href=\"search.php\"> Search for a document </li>";
                // echo "</ul>";
                echo "<ul>";
                echo "<li> <a href=\"search.php\"> Search for a movie </li>";
                echo "<li> <a href=\"search.php\"> Rent a player </li>";
                echo "<li> <a href=\"search.php\"> View items checked out </li>";
                echo "<li> <a href=\"search.php\"> View items reserved </li>";
                echo "</ul>";
            echo"</div>";


        //Set session variables
            session_start();
            $_SESSION["member_username"] = $username;
            $_SESSION["member_first_name"] = $username;

            $_SESSION["fullname"] = $row["member_first_name"] . " " . $row["member_last_name"];
        }
        else
        {
            echo "Sorry! You don't have a login.";
            echo "Create an account account <a href='signup.php'>here!</a>";
        }
        $conn->close();
        
    }
?>

    <br><br>
    <a href="logout.php">Sign Out</a>
<? require 'site_footer.php'; ?>

    </body>
</html>
