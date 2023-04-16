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
        $username = $_POST["member_username"];
        $password = $_POST["member_password"];
        
        $sql = "SELECT member_first_name, member_last_name, member_username, member_password from member ";
        $sql = $sql . "where member_username = '" . $username . "' and member_password = '". $password . "'";

        echo"i am on line 28";

        $result = $conn->query($sql);

        if($result->num_rows > 0)
        {
            $row = $result->fetch_assoc();
            echo "<h1>City Library Home Screen</h1>";
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


        //Set session variables
            session_start();
            $_SESSION["member_username"] = $username;
            $_SESSION["member_first_name"] = $username;

            $_SESSION["fullname"] = $row["member_first_name"] . " " . $row["member_last_name"];
        }
        else
        {
            echo "Sorry! You don't have a login.";
        }
        $conn->close();
        
    }
?>

    <a href="logout.php">Sign Out</a>
<? require 'site_footer.php'; ?>

    </body>
</html>
