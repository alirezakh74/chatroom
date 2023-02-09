<?php
session_start();

if(isset($_POST["username"]))
{
    $_SESSION["username"] =  $_POST["username"];
}

if(isset($_SESSION["username"]))
{
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ورود</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <form action="" method="post" id="login">
        <input type="text" id="username" name="username" placeholder="نام شما" required>
        <br>
        <input type="submit" value="ورود">
    </form>
</body>
</html>