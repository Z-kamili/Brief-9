<?php

require '../../codesource/Database/database.php';
$status = false;
$search = $client = $commande = $produit = "";
if(isset($_POST["search"])){
  $status = true;
  $search = $_POST["name"];
}else{
  try{
    $db = Database::connect();
    $statement = $db->query("Select count(*) as number from client");
    $item = $statement->fetch();
    $client = $item["number"];
    $statement = $db->query("Select count(*) as number_cmd from commande");
    $item = $statement->fetch();
    $commande = $item["number_cmd"];
    $statement = $db->query("Select count(*) as number_prd from produit");
    $item = $statement->fetch();
    $produit = $item["number_prd"];
    Database::disconnect();    
    }catch(Exception $e){
        die('Erreur : ' . $e->getMessage());
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PARTIE Produit</title>
  <link rel="stylesheet" href="../css/styles.css">
  <link rel="stylesheet" href="../css/style.css">
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
  <script  src="https://kit.fontawesome.com/b99e675b6e.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <link href="../../app/img/logoadmin.png" rel="icon" type="image/png">
  <link href="/your-path-to-fontawesome/css/all.css" rel="stylesheet">
	<script>
		$(document).ready(function(){
			$(".hamburger").click(function(){
			   $(".wrapper").toggleClass("collapse");
			});
		});
	</script>
</head>
<body>

<div class="wrapper">
  <div class="top_navbar">
    <div class="hamburger">
       <div class="one"></div>
       <div class="two"></div>
       <div class="three"></div>
    </div>
    <div class="top_menu">
      <div class="logo"><img src=""></div>
      <!-- <form class="form" role="form" action="produit.php" method="post"enctype="multipart/form-data">
      <ul>
        <li>
          <input type="text" placeholder="rechercher" name="name" id="search">         
        </li>
       <li>
       <button type="submit" name="search" style="background-color:white;border:none;outline:none;" >
       <a>
          <i class="fas fa-search"></i></a> 
</button>
          </li>
          <li><a href="produit.php"> 
          <i class="fas fa-user"></i>
          </a></li>
      </ul>
      </form> -->
    </div>
  </div>
  
  <div class="sidebar">
      <ul>
        <li class="title"><a href="../index.php" >
          <span class="icon"><i class="fas fa-home"></i></span>
          <span class="title">ACCEUIL</span></a></li>
        <li class="title"><a href="produit.php">
          <span class="icon"><i class="fas fa-user"></i></span>
          <span class="title">Gestion Produit</span>
          </a></li>
        <li class="title"><a href="#" class="active">
          <span class="icon"><i class="fas fa-address-card"></i></span>
          <span class="title">Statistique</span>
          </a></li>
        <li class="title"><a href="../Loguot.php">
          <span class="icon"><i class="fas fa-sign-out-alt"></i></span>
          <span class="title">DECONNECTER</span>
          </a></li>
    </ul>
  </div>
  <div class="middle">
    <div class="counting-sec">
      <div class="inner-width">
        <div class="col">
          <i class="far fa-smile-wink"></i>
          <div class="num"> <?php echo $client ?> </div>
          Client
        </div>
        <div class="col">
        <i class="far fa-money-bill-alt"></i>
          <div class="num"> <?php echo  $commande ?> </div>
          commande
        </div>
        <div class="col">
        <i class="fas fa-apple-alt"></i>
          <div class="num"> <?php echo  $produit ?> </div>
          produit
        </div>
      </div>
    </div>
  </div>