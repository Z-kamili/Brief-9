<?php

$selectedProfucts=[];
session_start();
//get selected products ids
if(isset($_SESSION['productId'])){
    $selectedProfucts=array_unique($_SESSION['productId']);
    $_SESSION['productId'] = $selectedProfucts;
    print_r( $selectedProfucts);
}









?>