<!DOCTYPE html>
<html>
<head>
    <title>Search Movies</title>
	<link rel="stylesheet" href="styles.css">

    <style>

        /* table, th, td, tr {
            border: solid grey;
			border-collapse:collapse;
        } */

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
	<h1>Search for an Item</h1>

	<form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="myForm">

    Item Type: (DVD, BluRay, Player)  <input type="text" name="itype" id="itype"/>
		<br><br>
		Movie:  <input type="text" name="movie_title" id="movie_title"/>
		<br><br>
		Genre: <input type="text" name="movie_genre" id="movie_genre"/>
		<br><br>
		Director: <input type="text" name="movie_director" id="movie_director"/>
		<br><br>
		Actor: <input type="text" name="movie_actor" id="movie_actor"/>
		<br><br>
		<!-- Actor 2: <input type="text" name="movie_actor" id="movie_actor2"/> -->

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

	// if(isset($_GET["movie_title"]) || isset($_GET["movie_genre"]) || isset($_GET["movie_director"]) || isset($_GET["movie_actor"])){
	// $array1 = array("movie_title", "movie_genre", "movie_director", "movie_actor");

	// echo"hello";

	// $array2 = array();
	// for($x = 0; $x <= strlen($array); $x += 1){
	// 	if(isset($_GET[$array[i]]))
	// 	$array2 = [$x];
	// }
	// $sql = "select * from movie where" ;


	// echo $sql;

	// 	$sql;
	// 	for($i = 0; $i <=strlen($array2); $i +=1){
	// 		$sql +=  "$array[$i] like %" . "$array[$i]";
	// 	}

	// 	if (strlen($array) > 1){
	// 		for($i = 0; $i <=strlen($array); $i +=1){
	// 			$sql +=  "AND $array[$i] like % $array[$i]";
	// 		}
	// }



	if(isset($_GET["itype"]) ||isset($_GET["movie_title"]) || isset($_GET["movie_genre"]) || isset($_GET["movie_director"]) || isset($_GET["movie_actor1"]))
	{
    $type = isset($_GET["itype"])?$_GET["itype"]:"";
		$title = isset($_GET["movie_title"])?$_GET["movie_title"]:"";
		$genre = isset($_GET["movie_genre"])?$_GET["movie_genre"]:"";
		$director = isset($_GET["movie_director"])?$_GET["movie_director"]:"";
		$actor = isset($_GET["movie_actor"])?$_GET["movie_actor"]:"";


    if (!empty($_GET['itype']))
			// $sql = "select * from movie where movie_title like '%$title%'";
			$sql = "SELECT item.item_type, m.movie_title, m.movie_genre, m.movie_director, m.movie_actor1, m.movie_actor2, item.status FROM movie as m, item WHERE LOWER(item_type) LIKE LOWER('%$type%') AND item.movie_id = m.movie_id";
		if (!empty($_GET['movie_title']))
			// $sql = "select * from movie where movie_title like '%$title%'";
			$sql = "SELECT item.item_type, m.movie_title, m.movie_genre, m.movie_director, m.movie_actor1, m.movie_actor2, item.status FROM movie as m, item WHERE LOWER(movie_title) LIKE LOWER('%$title%') AND item.movie_id = m.movie_id AND LOWER(item_type) LIKE LOWER('%$type%')";
		if (!empty($_GET['movie_genre']))
			// $sql = "select * from movie where movie_genre like '%$genre%'";
			$sql = "SELECT item.item_type, m.movie_title, m.movie_genre, m.movie_director, m.movie_actor1, m.movie_actor2, item.status FROM movie as m, item WHERE LOWER(movie_genre) LIKE LOWER('%$genre%') AND item.movie_id = m.movie_id AND LOWER(item_type) LIKE LOWER('%$type%')";
		if (!empty($_GET['movie_director']))
			// $sql = "select * from movie where movie_director like '%$director%'";
			$sql = "SELECT item.item_type, m.movie_title, m.movie_genre, m.movie_director, m.movie_actor1, m.movie_actor2, item.status FROM movie as m, item WHERE LOWER(movie_director) LIKE LOWER('%$director%') AND item.movie_id = m.movie_id AND LOWER(item_type) LIKE LOWER('%$type%')";
		if (!empty($_GET['movie_actor']))
			// $sql = "SELECT * FROM movie WHERE movie_actor1 LIKE '%" . $actor . "%' OR movie_actor2 LIKE '%" . $actor . "%'";
			$sql = "SELECT item.item_type, m.movie_title, m.movie_genre, m.movie_director, m.movie_actor1, m.movie_actor2, item.status FROM movie as m, item WHERE LOWER(movie_actor1) LIKE LOWER('%$actor%') OR LOWER(movie_actor2) LIKE LOWER('%$actor%') AND item.movie_id = m.movie_id AND LOWER(item_type) LIKE LOWER('%$type%')";


		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			echo "<center><table>";
			echo "<tr>";
        echo "<th>Type</th>";
				echo "<th>Title</th>";
				echo "<th>Genre</th>";
				echo "<th>Director</th>";
				echo "<th>Actor 1</th>";
				echo "<th>Actor 2</th>";
        echo "<th>Status</th>";
			echo "</tr>";
			// output data of each row
			while($row = $result->fetch_assoc()) {
				echo "<tr>";
          echo "<td>" . $row['item_type'] . "</td>";
					echo "<td>" . $row['movie_title'] . "</td>";
					echo "<td>" . $row["movie_genre"] . "</td>";
					echo "<td>" . $row['movie_director'] . "</td>";
					echo "<td>" . $row['movie_actor1'] . "</td>";
					echo "<td>" . $row['movie_actor2'] . "</td>";
          echo "<td>" . $row['status'] . "</td>";


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
