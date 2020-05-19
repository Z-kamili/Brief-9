<?php
$_SESSION['productId1']=[];
if(isset($_POST['ID_PRD'])){

    session_start();

    $_SESSION['productId1'][] = $_POST['ID_PRD'];

}
$list=array_unique($_SESSION['productId1']);

