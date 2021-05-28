<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $email = $_POST['email'];
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) 
        {
                $servername = "localhost";
                $username = "Nishit";
                $password = "Webtech";
                $dbname = "Student_Details";
                $conn = new mysqli($servername, $username, $password, $dbname);
                
                $sql = "SELECT Email, Password FROM Registration WHERE Email = '$email'";
                $result=$conn->query($sql);

                $em = $ps = "";
                if($result->num_rows>0) 
                {
	                While($row =$result->fetch_assoc()) 
                    {
                        $em = $row["Email"];
                        $ps = $row["Password"];
	                }
                }
                if ($_SERVER["REQUEST_METHOD"] == "POST") 
                {
                    $pass = $_POST['pass'];
                    if($email == $em && $pass == $ps)
                    {
                        $_SESSION['email'] = $email;
                        header("Location: Lab_10_3.php");
                    }
                    else
                    {
                        exit('<script>alert("Invalid Email or Password..!!");document.location="http://127.0.0.1/Lab_10.php"</script>');
                    }
                }
                $conn->close();
        }
        else
        {
            exit('<script>alert("Invalid Email Format..!!");document.location="http://127.0.0.1/Lab_10.php"</script>');
        } 
    }
?>
