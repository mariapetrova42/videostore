<!DOCTYPE html>
<html>
<head><title>Search for a Document</title>
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

    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    // var_dump($member_id);

    session_start();
    if (isset($_SESSION["member_id"])) {
        $member_id = $_SESSION["member_id"];
    }

//Print the list of movies reserved by a customer and their status.

    $sql = "SELECT t.item_id, i.item_type, mv.movie_title, i.rent_p_day, i.rent_p_day * DATEDIFF(CURRENT_DATE, t.tran_date) AS amt_due, t.tran_type
    FROM transaction as t, item as i, movie as mv, member
    WHERE i.status = 'unavailable'
    -- and t.tran_type = 'borrow'

    and t.item_id = i.item_id
    and i.movie_id = mv.movie_id
    and t.member_id = member.member_id

    AND member.member_id = $member_id
    GROUP BY t.tran_type;";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        //session_start();
        if(isset($_SESSION["fullname"]))
           {
           echo "<h1>{$_SESSION['fullname']}";

               echo "'s Items</h1>";
        }

        echo "<table>";
        echo "<tr>";
            echo "<th>Item ID</th>";
            echo "<th>Item Type</th>";
            echo "<th>Movie Title</th>";
            echo "<th>Charge per day</th>";
            echo "<th>Amount due</th>";
            echo "<th>Status</th>";

        echo "</tr>";
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
                echo "<td>" . $row['item_id'] . "</td>";
                echo "<td>" . $row["item_type"] . "</td>";
                echo "<td>" . $row['movie_title'] . "</td>";
                echo "<td>" . $row['rent_p_day'] . "</td>";
                echo "<td>" . $row['amt_due'] . "</td>";
                echo "<td>" . $row['tran_type'] . "</td>";


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



    $conn->close();
?>
