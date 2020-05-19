<?php 
session_start();
$_SESSION["user"] = null;
$_SESSION["mtp"] = null;
$_SESSION["ID"] = null;
header("Location:../../../index.php");
?>