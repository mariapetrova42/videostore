<? $page_title = "Video Store Login"; ?>

<? require 'SSI_header.php'; ?>

<!DOCTYPE html>
<html>
  <head>
  <title>Video Store Login</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        input[type=checkbox] {
          position: absolute;
          left: 150px;
          top: -7px;
          height:25px;
          width:25px;
        }

        #div_checkbox {
          position: relative;
          /* display: block; */
        }
    </style>

  </head>
  <body>
      <img
        src="../images/videostore.png"
        width="100%"
        height="auto"
        alt="Image of Video Store with DVDs for sale">

    <div id="wrapper">
      <form action="welcome.php" method="post">
        <!-- action is always a php page bc it always processes data from form -->
        <!-- Welcome.php has to:
        * Take user id and password from form and check if the user exists in the database 
        * Display a menu - different for member and admin (can be done with an admin checkbox)
        * Prevent someone from going into the member.php page directly-->

        <br>
        Username <br>
        <input type="text" name="member_username" id="member_username"><br><br>
        Password <br>
        <input type="password" name="member_password" id="member_password"><br><br>
        <div id="div_checkbox">
          I am an Admin: 
          <input type="checkbox" name="is_admin" value="1">
        </div>

        <br>

        <input type="submit" id="submit" name="submit" value="Submit">
      </form>

      <br><br>

      If you don't have an account, sign up <a href="signup.php">here!</a>
      <br><br>
    </div>

<? require 'SSI_footer.php'; ?>

  </body>
</html>

