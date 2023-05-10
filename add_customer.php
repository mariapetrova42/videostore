<!DOCTYPE html>
<html>
<head>
    <title>Update customer</title>
	<link rel="stylesheet" href="styles.css">

    <style>



		table, th, td, tr {
			border: solid grey;
			border-collapse:collapse;
			padding: 7px 11px;
			background-color: #77adb9;
			color: #1c0909;
        }
    </style>

	<script>
			function submit()
			{
				document.getElementById("submitButton").type = "submit";
				//document.getElementById("myForm").submit();
			}
	</script>
</head>
<body>
	<img src="../images/videostore.png" width="100%" height="auto" alt="Image of Video Store with DVDs for sale">
	<div id="wrapper">
	<h1>Search for a Customer</h1>

	<form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="myForm">

    Customer ID: <input type="text" name="cid" id="cid"/>

		<br><br>
		Customer Name:  <input type="text" name="cname" id="cname"/>

		<br><br>

		<input type="button" value = "Submit" onclick='submit()' id="submitButton"/>
	</form>

	<br>
	<br>
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
    //echo "Connected successfully<br>";



	if(isset($_GET["cid"]) ||isset($_GET["cname"]) )
	{
    $cid = isset($_GET["cid"])?$_GET["cid"]:"";
		$cname = isset($_GET["cname"])?$_GET["cname"]:"";

    if (!empty($_GET['cid']))
			// $sql = "select * from movie where movie_title like '%$title%'";
			$sql = "SELECT m.member_id, m.member_first_name, m.member_last_name FROM member as m WHERE LOWER(member_id) LIKE LOWER('%$cid%');";
		if (!empty($_GET['cname']))
			// $sql = "SELECT * FROM movie WHERE movie_actor1 LIKE '%" . $actor . "%' OR movie_actor2 LIKE '%" . $actor . "%'";
			$sql = "SELECT m.member_id, m.member_first_name, m.member_last_name FROM member as m WHERE LOWER(member_first_name) LIKE LOWER('%$cname%') OR LOWER(member_last_name) LIKE LOWER('%$cname%');";


		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			echo "<center><table>";
			echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>First Name</th>";
				echo "<th>Last Name</th>";
			echo "</tr>";
			// output data of each row
			while($row = $result->fetch_assoc()) {
				echo "<tr>";
          echo "<td>" . $row['member_id'] . "</td>";
          echo "<td>" . $row['member_first_name'] . "</td>";
					echo "<td>" . $row['member_last_name'] . "</td>";


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
	</div>


</body>
</html>
