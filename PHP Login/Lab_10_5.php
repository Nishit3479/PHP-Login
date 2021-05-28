<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Test</title>
        <link rel="stylesheet" href="http://127.0.0.1/Lab_10_2.css">
	    <meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
    </body>
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
        
        $email = $_SESSION['email'];
        $Score = rand(0,10);
        $sql = "INSERT INTO Mock_Test (Email, Score)
        VALUES ('$email', '$Score')";
        if ($conn->query($sql) === TRUE) 
        {
            exit("<script>alert('Exam Completed Successfully..!!');document.location='http://127.0.0.1/Lab_10_3.php'</script>");
        } 
        else 
        {
            exit("<script>alert('Kindly Login first to continue..!!');document.location='http://127.0.0.1/Lab_10.php'</script>");
        }
        $conn->close();
    ?>
    
</html>