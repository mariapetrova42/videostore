<!DOCTYPE html>
<html>
<head>
    <title>Reserve Item</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>

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

    session_start();
    if (isset($_SESSION["member_username"]) && $_SESSION["member_username"]!=""){
        // echo $_SESSION["fullname"];
        // echo "<br>";
        $member_id = $_SESSION["member_id"];
        // echo $member_id;
        // echo "<br>";
        // echo "<br>";
        $item_id = $_GET["itemid"];
        // echo $item_id;

        $tran_date = date('Y-m-d');
        $store_id = rand(1, 3);

        $insert = "insert into transaction(tran_date, tran_type, item_id, Store_id, member_id) values ('$tran_date', 'reserve', $item_id, $store_id, $member_id);";
	
		$result1 = $conn->query($insert);

        $update = "UPDATE item SET status = 'unavailable' WHERE item_id = $item_id;";

		$result2 = $conn->query($update);

        echo "<h1>Return Completed!</h1>";
        echo "Reserve to <a href=\"welcome.php\">Home</a>.";

    }
    else{
        echo"You do not belong here.";
        echo "<a href=\"index.php\">Login</a> to continue.";
    }
    $conn->close();


?>
	</div>


</body>
</html>