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
    <form method="POST" enctype="multipart/form-data">
        <H1 id="head1">Retrieve Password</H1>
        <input type="text" id="email" name="email" placeholder="Enter Email" required><br><br>
        <input type="submit" id="bt1" name="bt1" class="bt1" value="Submit"/>
        <p id = pr style="text-align : center"><a href="http://127.0.0.1/Lab_10.php" style="text-decoration: none;">Sign in</a> / <a href="http://127.0.0.1/Lab_10_2.php" style="text-decoration: none;">Register Now</a></p> 
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {
            $servername = "localhost";
            $username = "Nishit";
            $password = "Webtech";
            $dbname = "Student_Details";
            $conn = new mysqli($servername, $username, $password, $dbname);

            $pass = $email = "";
            $email = $_POST['email'];
            $sql = "SELECT Password FROM Registration WHERE Email = '$email'";
            $result=$conn->query($sql);
            if($result->num_rows>0) 
            {
	            While($row =$result->fetch_assoc()) 
                {
                    $pass = $row["Password"];
                    exit("<script>alert('Password : $pass');document.location='http://127.0.0.1/Lab_10.php'</script>");
	            }
            }
            $conn->close();
        }
    ?>
    </form>
    </div>
    </body>
</html>