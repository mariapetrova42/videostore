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
        if(!isset($_POST["member_username"]) || !isset($_POST["member_password"])) {
            echo "<h2>Please make sure all fields are filled in </h2>";
        }

        $username = $_POST["member_username"];
        $password = $_POST["member_password"];
        $is_admin = $_POST["is_admin"];

        // echo "username: " . $username . "<br>";
        // echo "password: " . $password . "<br>";

        // $sql = "SELECT member_id, member_first_name, member_last_name, member_username, member_password from member ";
        // $sql = $sql . "where member_username = '" . $username . "' and member_password = '" . $password . "';";

        $sql = "SELECT member_id, member_first_name, member_last_name, member_username, member_password from member where member_username = '". $username ."' and member_password = '" . $password ."';";


        // echo $sql;

        // $member_id = "SELECT member_id from member where member_username = '". $username ."' and member_password = '" . $password ."';";

        // echo "MEMBER ID";
        // echo $member_id;

        // echo $sql;
        // echo"<br><br>";
        // echo"i am on line 39";

        $result = $conn->query($sql);

        if($result->num_rows > 0)
        {
            // echo"i am on line 45";

            $row = $result->fetch_assoc();
            echo"<div id='wrapper'>";
                echo "<h1>Video Store Home Screen</h1>";
                echo "<h2>Welcome, " . $row["member_first_name"] . " " . $row["member_last_name"] . ".</h2>";
                echo "<h3>Please Choose an Option Below</h3>";
                // echo "<ul>";
                // echo "<li> <a href=\"search.php\"> Search for a document </li>";
                // echo "</ul>";
                echo "<ul>";
                    // echo "<a href=\"borrowed_items.php\"> Items Borrowed </a>";
                    // echo "<a href=\"borrowed_items.php\"> Items Borrowed </a>";
                    // echo"<br><br>";
                    echo "<li> <a href=\"borrowed_items.php\"> View your borrowed items </a></li>";
                    echo "<li> <a href=\"search.php\"> Search for an item to return or borrow </a></li>";
                    //echo "<li> <a href=\"borrow.php\"> Rent a player </a></li>";
                    //echo "<li> <a href=\"return.php\"> Return a movie </a></li>";

                // echo "<li> <a href=\"search.php\"> View items reserved </li>";
                echo "</ul>";


        //Set session variables
            session_start();
            $_SESSION["member_username"] = $username;
            // $_SESSION["member_first_name"] = $username;

            $_SESSION["fullname"] = $row["member_first_name"] . " " . $row["member_last_name"];


            $_SESSION["member_id"] = $row["member_id"];

            // echo "member_id";
            // var_dump($_SESSION["member_id"]);


            //admin
            $sql_admin = "SELECT is_admin FROM member WHERE member_username = '" . $username . "' AND member_password = '" .$password . "' AND is_admin = 1;";


            $result_admin = $conn->query($sql_admin);

            if($result_admin->num_rows > 0){
                $admin_row = $result_admin->fetch_assoc();

            // echo "<br> sql admin: " . $sql_admin . " <br>";
            // echo "<br> row['is_admin']: " . $admin_row["is_admin"] . " <br>";

            if ($admin_row["is_admin"] == 1){

                echo "<h1>Admin Functionalities</h1>";
                echo "<h3>Please Choose an Option Below</h3>";
                echo "<ul>";
                //echo "<li> <a href=\"add_movie.php\"> Add a movie </li>";
                echo "<li> <a href=\"search.php\"> Search for an item </li>";
                echo "<li> <a href=\"add_customer.php\"> Find a customer </li>";
                echo "<li> <a href=\"info.php\"> Additional Admin Info</li>";
                echo "</ul>";
            }
        }
        echo "<a href='logout.php'>Sign Out</a>";

        }
        else
        {
            echo "Sorry! You don't have a login. ";
            echo "Create an account <a href='signup.php'>here!</a>";

            echo "<br><br>";

            echo "Try logging in again <a href='index.php'>here.</a>";

        }


        $conn->close();


    }
?>

    <br><br>
<? require 'site_footer.php';
?>
</div>


    </body>
</html>
