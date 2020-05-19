<?php
$host="127.0.0.1";
$user="user1";
$password="yes";
$database="shopping";
$connect = mysqli_connect($host,$user,$password,$database);
if(mysqli_connect_errno()){
    die("cannot connect to database fieled :" .mysqli_connect_error());
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="codesource/view/style/home.css">
    <link rel="stylesheet" type="text/css" href="css/index.css" />
    <title>Document</title>
</head>
<body>
    <!-- include navbar -->
    <?php require 'codesource/view/include/navabar2.php'; ?>

    <div class="container">
        <!-- include header -->
        <?php require 'codesource/view/include/header.php'; ?>

       

    <!-- include footer -->
    <?php require 'codesource/view/include/footer2.php';?>
    
</body>
</html>