<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Home Page</title>
        <link rel="stylesheet" href="http://127.0.0.1/Lab_10_2.css">
	    <meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
    <form method="POST">
        <input type="submit" id="bt2" name="bt2" class="bt2" value="Log Out"/>  
    </form>
    <div id="d1">
        <H1 id="head1">Welcome to Aptitude Test</H1><br>
        <button id="bt1" name="bt1" class="bt1" value="Attend Test" onclick="window.location.href='http://127.0.0.1/Lab_10_5.php'">Attend Test</button><br><br><br>
        <button id="bt1" name="bt1" class="bt1" value="View Score" onclick="window.location.href='http://127.0.0.1/Lab_10_4.php'">View Score</button>
    </div>
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
    ?>
</html>