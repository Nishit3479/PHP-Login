<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Registration</title>
        <link rel="stylesheet" href="http://127.0.0.1/Lab_10_2.css">
	    <meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>  
    <div id="d1">
    <form method="POST" enctype="multipart/form-data">
        <H1 id="head1">Registeration</H1>
        <label for="name">Name :</label><br>
        <input type="text" id="name" name="name" placeholder="Enter Name" required><br><br>
        <label for="cno">Contact number :</label><br>
		<input type="text" name="cno" id="cno" placeholder="Enter Contact number" required><br><br>
        <label for="email">Email :</label><br>
        <input type="text" id="email" name="email" placeholder="Enter Email" required><br><br> 
        <label for="branch">Branch :</label><br>
		<input type="text" name="branch" id="branch" placeholder="Enter Branch" required><br><br>
        <label>Batch :</label><br><br>
		<input type="radio" name="batch" value="Junior" checked><label for="Junior">Junior</label><br><br>
		<input type="radio" name="batch" value="Sophomore"><label for="Sophomore">Sophomore</label><br><br>
        <label for="pass">Password :</label><br>
        <input type="password" id="pass" name="pass" placeholder="Enter Password" required><br><br>
        <input type="submit" id="bt1" name="bt1" class="bt1" value="Submit"/>
        <p id = pr style="text-align : center">Already Registered ?<a href="http://127.0.0.1/Lab_10.php" style="text-decoration: none;">Sign in</a></p> 
    </form> 
    </div>
    </body>
    <?php
        $servername = "localhost";
        $username = "Nishit";
        $password = "Webtech";
        $dbname = "Student_Details";
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {
            $name = $_POST['name'];
            $cno = $_POST['cno'];
            $email = $_POST['email'];
            $branch = $_POST['branch'];
            $batch = $_POST['batch'];
            $pass = $_POST['pass'];
            $sql = "INSERT INTO Registration (Name, Contact_No, Email, Branch, Batch, Password)
            VALUES ('$name', '$cno', '$email', '$branch', '$batch', '$pass')";
            if ($conn->query($sql) === TRUE) 
            {
                echo "<script>alert('Successfully Registered');</script>";
            } 
            else 
            {
                echo "<script>alert('User Already Registered / Invalid data provided..!!');</script>";
            }
        }
        $conn->close();
    ?>
</html>