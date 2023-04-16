<? $page_title = "Video Store Signup Page"; ?>

<? require 'site_header.php'; ?>

<!DOCTYPE html>
<html>
  <head>
  <title>Video Store Signup Page</title>
    <link rel="stylesheet" href="styles.css">

  </head>
  <body>
      <img
        src="../images/videostore.png"
        width="100%"
        height="auto"
        alt="Image of Video Store with DVDs for sale">

    <style>
        table, th, td, tr {
            border: solid black;
            border-collapse: collapse
        }
        
    </style>
    <script>
        function checkpasswords(){

            p1 = document.getElementById("member_password").value
            p2 = document.getElementById("password2").value
            if(p1!=p2)
                {
                alert("The password fields dont match!");
                document.getElementById("member_password").value = "";
                document.getElementById("password2").value = "";
                }
                else
                {
                    document.getElementById("myform").submit();
                    // window.location.href = "thankyou.html";
                }
        }
    </script>
</head>
<body>

    <div id="wrapper">
 
        <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="myform">

            First Name:  <input type="text" name="member_first_name"/>
            <br><br>
            Last Name:  <input type="text" name="member_last_name"/>
            <br><br>
            Username:  <input type="text" name="member_username"/>
            <br><br>
            Password: <input type="password" name="member_password" id="member_password"/>
            <br><br>
            Confirm Password: <input type="password" name="password2" id="password2"/>
            <br><br>

            <input type="button" value="Submit" onclick="checkpasswords()">

            &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="reset" value="Clear"/>
            <br><br>
            Already have an account? Sign in <a href="index.html">here</a>.
        </form>
    </div>

<?php
    echo"I am on line 57<br>";

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "VideoStore";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql="";
    // Check connection
    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }
    else
    {
        //echo "Connected successfully<br>";
        echo"I am on line 75";


        $firstname = isset($_POST["member_first_name"]) ? $_POST["member_first_name"] : "";
        $lastname = isset($_POST["member_last_name"]) ? $_POST["member_last_name"] : "";
        $username = isset($_POST["member_username"]) ? $_POST["member_username"] : "";
        $password = isset($_POST["member_password"]) ? $_POST["member_password"] : "";
        
	}
	if($userid!=""){
        echo"I am on line 85";

        //Create the SQL query
        $sql = "select member_username from member";
        $sql = $sql . " where member_username = '$username'";
        
	//Run the query
	$result = $conn->query($sql);
    
    if ($result->num_rows == 0) 
	{
        echo"I am on line 96";

        $sql2 = "insert into member(member_first_name, member_last_name, member_username , member_password) values(";
        $sql2 = $sql2 . "'$firstname','$lastname','$username','$password')";
	    $result = $conn->query($sql2);
        
        /*if ($result->num_rows > 0) 
            echo "Created User";
        else
            echo "Something went wrong!";*/
            
        echo "<br><a href='index.php'>Login</a>";

    } 
    else
	{

        echo "Sorry! That userid already exists!";
        echo "<br><a href='signup.php'>Try again</a>";
    }
    }
    $conn->close();
    
?>

<? require 'site_footer.php'; ?>

</body>
</html>

