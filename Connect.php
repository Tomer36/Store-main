<?php
include 'dbConnection.php';
session_start();
$Email = $_POST["Email"]; //set the username from textbox username
$pass = $_POST["password"]; //set the password from textbox password

$sql = "SELECT Email,family_list,Admin from users where Email='$Email' AND pass_word='$pass'"; //searching for what username and password vaild
$result = $conn->query($sql);

if ($result->num_rows > 0) { //if result bigger than 0 thats mean password and username is vaild
  $row = $result->fetch_assoc();

  $_SESSION["Email"] = $Email; //start session to username
  $_SESSION["password"] = $pass; //start session to password
  $_SESSION["Email"] = $row["Email"]; //start session of name to print it
  $_SESSION["family_list"] = $row["family_list"]; //start session of lastname to print it!
  $_SESSION["Admin"] = $row["Admin"]; //if he an admin the session value will be "1"!

  echo "<script type='text/javascript'>alert('Logged in successfuly!');
            window.location.href = ('index.php');
             </script>";
} else { //if the clint didnt put the username and passowrd vaild!
  echo "<script type='text/javascript'>alert('Wrong Username or Password!!');
            window.history.back();
             </script>"; //print this and back to backward page
}
$conn->close();//end the connection with data base
