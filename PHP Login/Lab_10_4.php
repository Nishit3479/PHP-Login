<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Results Page</title>
        <link rel="stylesheet" href="http://127.0.0.1/Lab_10_2.css">
	    <meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {
            $e = $_POST['bt2'];
            if($e == "Log Out")
            {
                session_unset();
                session_destroy();
                exit('<script>document.location="http://127.0.0.1/Lab_10.php"</script>');
            }
        }
        $servername = "localhost";
        $username = "Nishit";
        $password = "Webtech";
        $dbname = "Student_Details";
        $conn = new mysqli($servername, $username, $password, $dbname);

        $score = $name = $email = "";
        $email = $_SESSION['email'];
        $sql = "SELECT Score FROM Mock_test WHERE Email = '$email'";
        $result=$conn->query($sql);
        if($result->num_rows>0) 
        {
	        While($row =$result->fetch_assoc()) 
            {
                $score = $row["Score"];
	        }
        }
        $sql = "SELECT Name FROM Registration WHERE Email = '$email'";
        $result=$conn->query($sql);
        if($result->num_rows>0) 
        {
	        While($row =$result->fetch_assoc()) 
            {
                $name = $row["Name"];
	        }
        }
        $conn->close();
        if ($name == "") 
        {
            exit("<script>alert('Kindly Login first to continue..!!');document.location='http://127.0.0.1/Lab_10.php'</script>");
        }
        elseif ($score == NULL)
        {
            exit("<script>alert('Kindly attempt the exam first to continue..!!');document.location='http://127.0.0.1/Lab_10_3.php'</script>");
        }
    ?>
    <body>
    <form method="POST">
        <input type="submit" id="bt2" name="bt2" class="bt2" value="Log Out"/>  
    </form>
    <div id="d1">
        <H1 id="head1">Congratulations..!!<br><br>You have completed the test<br><br>Name : <?php echo $name;?><br><br>Score : <?php echo $score;?></H1>
    </div>
    </body>
</html>