<? $page_title = "Video Store Signup Page"; ?>

<? require 'site_header.php'; ?>

<!DOCTYPE html>
<html>
  <head>
  <title>Video Store Signup Page</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        
    </style>

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
                    // window.location.href == "index.php";

                }
        }
    </script>
</head>
<body>

    <div id="wrapper">
 
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="myform">
            <br>
            First Name:  <input type="text" name="member_first_name"/>
            <br><br>
            Last Name:  <input type="text" name="member_last_name"/>
            <br><br>
            Email:  <input type="email" name="member_email"/>
            <br><br>
            Username:  <input type="text" name="member_username"/>
            <br><br>
            Password: <input type="password" name="member_password" id="member_password"/>
            <br><br>
            Confirm Password: <input type="password" name="password2" id="password2"/>
            <br><br>

            <input type="button" value="Submit" onclick="checkpasswords()">
            <!-- <input type="submit" value="Submit" onclick="checkpasswords()"> -->


            &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="reset" value="Clear"/>
            <br><br>
            Already have an account? Sign in <a href="index.php">here</a>.
        </form>
    </div>

<?php
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

        // if(isset($_POST["member_first_name"]) && isset($_POST["member_last_name"]) && isset($_POST["member_username"])  && isset($_POST["member_password"])) {
        //     echo "I am on line 96";

        //     $firstname = $_POST["member_first_name"];
        //     $lastname = $_POST["member_last_name"];
        //     $username = $_POST["member_username"];
        //     $password = $_POST["member_password"];
        // }
        // else{
        //     echo "Make sure all fields are filled in";
        // }
 
        $firstname = isset($_POST["member_first_name"]) ? $_POST["member_first_name"] : "";
        // echo "firstname: " . $firstname . "<br>"; 

        $lastname = isset($_POST["member_last_name"]) ? $_POST["member_last_name"] : "";
        // echo "lastname: " . $lastname . "<br>"; 

        $email = isset($_POST["member_email"]) ? $_POST["member_email"] : "";

        $username = isset($_POST["member_username"]) ? $_POST["member_username"] : "";
        // echo "username: " . $username . "<br>"; 

        $password = isset($_POST["member_password"]) ? $_POST["member_password"] : "";
        // echo "password: " . $password . "<br>"; 

	}
	if($username!= ""){

        //Create the SQL query
        $sql = "select member_username from member";
        $sql = $sql . " where member_username = '$username'";
        
	//Run the query
	$result = $conn->query($sql);
    
    if ($result->num_rows == 0) 
	{

        $sql2 = "insert into member(member_first_name, member_last_name, member_email, member_username , member_password) values(";
        $sql2 = $sql2 . "'$firstname','$lastname', '$email', '$username','$password')";
	    $result = $conn->query($sql2);
        
        /*if ($result->num_rows > 0) 
            echo "Created User";
        else
            echo "Something went wrong!";*/
            
        echo "<br><a href='index.php'>Login</a>";
        
        header("location: index.php");



    } 
    else
	{

        echo "Sorry! That username already exists!";
        echo "<br><a href='signup.php'>Try again</a>";
    }
    }
    $conn->close();
    
?>

<? require 'site_footer.php'; ?>

</body>
</html>

