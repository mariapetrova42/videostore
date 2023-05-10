<!DOCTYPE html>
<html>
<head><title>Search for a Document</title></head>
    <link rel="stylesheet" href="styles.css">
    <style>

    table, th, td, tr {
			border: solid grey;
			border-collapse:collapse;
			padding: 7px 5px;
			background-color: #77adb9;
			color: #1c0909;
        }
    </style>

<body>

  <img src="../images/videostore.png" width="100%" height="auto" alt="Image of Video Store with DVDs for sale">
	<div id="wrapper">


	<!-- <a href='searchVRG_fancy.php?artistName=&nation=United States'>Click here for American Artists</a> -->
    <br>

<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "VideoStore";



    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    // var_dump($member_id);

    session_start();
    if (isset($_SESSION["member_id"])) {
        $member_id = $_SESSION["member_id"];
    }

//Print the list of stores

    $sql = "SELECT s.store_id, s.store_city, s.store_phone, s.store_street1, s.store_street2, s.store_zipcode, s.store_state
    FROM store as s;";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        //session_start();
        if(isset($_SESSION["fullname"]))
           {
           echo "<h1>Administration Info</h1>";


        }

        echo "<br><br><h3>Store Locations</h3><table>";
        echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>City</th>";
            echo "<th>Phone</th>";
            echo "<th>Street 1</th>";
            echo "<th>Street 2</th>";
            echo "<th>Zip</th>";
            echo "<th>State</th>";


        echo "</tr>";
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
                echo "<td>" . $row['store_id'] . "</td>";
                echo "<td>" . $row['store_city'] . "</td>";
                echo "<td>" . $row['store_phone'] . "</td>";
                echo "<td>" . $row['store_street1'] . "</td>";
                echo "<td>" . $row['store_street2'] . "</td>";
                echo "<td>" . $row['store_city'] . "</td>";
                echo "<td>" . $row['store_state'] . "</td>";


            echo "</tr>";


        // header("Location: welcome.php");


        }
        echo "</table>";
    }
    else {
        echo "0 results";
        echo "<h1>You have no items</h1>";

    }

    echo "<br>";

    //-----------------------------------------------------------------------------------------------

    $sql = "SELECT m.member_id, m.member_first_name, m.member_last_name, m.member_username, COUNT(CASE WHEN t.tran_type = 'borrow' THEN 1 ELSE 0 END) as num_borr
from member as m, transaction as t
where t.member_id = m.member_id
GROUP by m.member_id
ORDER by num_borr DESC
LIMIT 0,10
;";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        //session_start();
        if(isset($_SESSION["fullname"]))
           {
           echo "";


        }

        echo "<br><br><h3>Top 10 Renters</h3><table>";
        echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>First Name</th>";
            echo "<th>Last Name</th>";
            echo "<th>Username</th>";
            echo "<th>Items Borrowed</th>";


        echo "</tr>";
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
                echo "<td>" . $row['member_id'] . "</td>";
                echo "<td>" . $row['member_first_name'] . "</td>";
                echo "<td>" . $row['member_last_name'] . "</td>";
                echo "<td>" . $row['member_username'] . "</td>";
                echo "<td>" . $row['num_borr'] . "</td>";


            echo "</tr>";


        // header("Location: welcome.php");


        }
        echo "</table>";
    }
    else {
        echo "0 results";
        echo "<h1>You have no items</h1>";

    }

    echo "<br>";


    // echo "<a href='welcome.php'>Back to Account</a>";


    //-----------------------------------------------------------------------------------------------

    $sql = "SELECT m.movie_id, m.movie_title, m.movie_year, COUNT(CASE WHEN t.tran_type = 'borrow' THEN 1 ELSE 0 END) as num_borr
from movie as m, transaction as t
where t.member_id = m.movie_id
GROUP by m.movie_id
ORDER by num_borr DESC
LIMIT 0,10
;
";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        //session_start();
        if(isset($_SESSION["fullname"]))
           {
           echo "";


        }

        echo "<br><br><h3>Top 10 Movies Rented</h3><table>";
        echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>Title</th>";
            echo "<th>Year</th>";
            echo "<th>Times Borrowed</th>";


        echo "</tr>";
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
                echo "<td>" . $row['movie_id'] . "</td>";
                echo "<td>" . $row['movie_title'] . "</td>";
                echo "<td>" . $row['movie_year'] . "</td>";
                echo "<td>" . $row['num_borr'] . "</td>";


            echo "</tr>";


        // header("Location: welcome.php");


        }
        echo "</table>";
    }
    else {
        echo "0 results";
        echo "<h1>You have no items</h1>";

    }

    echo "<br>";



    $conn->close();
?>

<h1>Search Movie of the Year</h1>

<form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="myForm">

  Year:  <input type="text" name="yr" id="yr"/>
  <br><br>

  <input type="button" value = "Submit" onclick='submit()' id="submitButton"/>
</form>

<br>
<br>

<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "VideoStore";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }


    if(isset($_GET["yr"]))
    {
      $yr = isset($_GET["yr"])?$_GET["yr"]:"";


      if (!empty($_GET['yr']))
        // $sql = "select * from movie where movie_title like '%$title%'";
        $sql = "SELECT m.movie_id, m.movie_title, m.movie_year, COUNT(CASE WHEN t.tran_type = 'borrow' THEN 1 ELSE 0 END) as num_borr,
EXTRACT(year FROM t.tran_date) AS yer
from movie as m, transaction as t
where t.member_id = m.movie_id and EXTRACT(year FROM t.tran_date) LIKE 'yr'
GROUP by m.movie_id, yer
ORDER by num_borr DESC
LIMIT 0,10
;
";

      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        echo "<center><table>";
        echo "<tr>";
          echo "<th>ID</th>";
          echo "<th>Title</th>";
          echo "<th>Movie Year</th>";
          echo "<th>Times Borrowed</th>";
        echo "</tr>";
        // output data of each row
        while($row = $result->fetch_assoc()) {
          echo "<tr>";
            echo "<td>" . $row['novie_id'] . "</td>";
            echo "<td>" . $row['movie_title'] . "</td>";
            echo "<td>" . $row['movie_year'] . "</td>";
            echo "<td>" . $row['num_borr'] . "</td>";


          echo "</tr>";

        }
        echo "</table><center><br><br>";
      }
      else {
        echo "0 results<br><br>";
      }
      }
      $conn->close();
  ?>


  </body>
  </html>
