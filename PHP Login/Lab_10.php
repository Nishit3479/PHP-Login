<?php
session_start();
?>
<?php
$day = 60 * 60 * 24 + time();
date_default_timezone_set("Asia/Kolkata");
setcookie('lastVisit', date("d-m-Y h:i:s a"), $day);
if(isset($_COOKIE['lastVisit']))
{
    $visit = $_COOKIE['lastVisit'];
    echo "<p id = pr>"."You visited this website previously on ". $visit."</p>";
}
else
{
    echo "<p id = pr>"."You've got some stale cookies!"."</p>";
}
?>
<?php
if(isset($_SESSION['lastaction']))
{
    $inactive = time() - $_SESSION['lastaction'];
    $expire = 300;
    if($inactive > $expire)
    {
        session_unset();
        session_destroy();
    }
}
$_SESSION['lastaction'] = time();
?>
<?php
$servername = "localhost";
$username = "Nishit";
$password = "Webtech";

$conn = new mysqli($servername, $username, $password);

$sql = "CREATE DATABASE Student_Details";

$dbname = "Student_Details";

$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "CREATE TABLE Registration (Name VARCHAR(30) NOT NULL, Contact_No BIGINT(10) NOT NULL, Email VARCHAR(30) NOT NULL PRIMARY KEY, Branch VARCHAR(20) NOT NULL
, Batch VARCHAR(20) NOT NULL, Password VARCHAR(20) NOT NULL)";

$sql = "CREATE TABLE Mock_Test (Email VARCHAR(30) NOT NULL, Score INT(2) NOT NULL, FOREIGN KEY (Email) REFERENCES Registration(Email))"; 

$conn->close();
?> 

<!DOCTYPE html>
<html>
    <head>
        <title>Login page</title>
        <link rel="stylesheet" href="http://127.0.0.1/Lab_10.css">
	    <meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
    <div id="d1">
    <form method="POST"  action="Lab_10_1.php" enctype="multipart/form-data">
        <H1 id="head1">Log In</H1>
        <input type="text" id="email" name="email" placeholder="Email" required><br><br>
        <input type="password" id="pass" name="pass" placeholder="Password" required><br><br>
        <input type="submit" id="bt1" name="bt1" class="bt1" value="Sign in"/>
        <p id = pr style="text-align : center">Not Registered? <a href="http://127.0.0.1/Lab_10_2.php" style="text-decoration: none;">Register Now</a></p>
        <p id= pr style="text-align : center"><a href="http://127.0.0.1/Lab_10_6.php" style="text-decoration: none;">Forgot Password ?</a></p>
    </form>
    </div>
    </body>
</html>