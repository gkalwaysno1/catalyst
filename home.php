<?php
session_start();
$connect = mysqli_connect('localhost', 'root', '', 'login') or die("Connection failure!!");


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Home Page</h1>
    <h2>Hi <?php echo $_SESSION['name']; ?> </h2>
</body>
</html>