<?php

require '../../codesource/Database/database.php';
$status = false;
$search = "";
if(isset($_POST["search"])){
  $status = true;
  $search = $_POST["name"];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PARTIE Produit</title>
	<link rel="stylesheet" href="../css/styles.css">
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
  <script  src="https://kit.fontawesome.com/b99e675b6e.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <link href="../../app/img/logoadmin.png" rel="icon" type="image/png">
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
      <form class="form" role="form" action="produit.php" method="post"enctype="multipart/form-data">
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
      </form>
    </div>
  </div>
  
  <div class="sidebar">
      <ul>
        <li class="title"><a href="../index.php" >
          <span class="icon"><i class="fas fa-home"></i></span>
          <span class="title">ACCEUIL</span></a></li>
        <li class="title"><a href="#" class="active">
          <span class="icon"><i class="fas fa-user"></i></span>
          <span class="title">Gestion Produit</span>
          </a></li>
        <li class="title"><a href="statistique.php">
          <span class="icon"><i class="fas fa-address-card"></i></span>
          <span class="title">Statistique</span>
          </a></li>
        <li class="title"><a href="../Loguot.php">
          <span class="icon"><i class="fas fa-sign-out-alt"></i></span>
          <span class="title">DECONNECTER</span>
          </a></li>
    </ul>
  </div>
  
  <div class="main_container">
    <!-- <h1 class="title">Tbeb Lik</h1> -->
    <div class="container admin">
        
        <div class="row">
            
        <h1>Liste des Produits</h1>
       
          <a class="btn-main" href="Ajoute.php">Ajouter</a> 
            <table class="table table-striped table-bordered">
            <thead>
                <tr class="title">
                <th>Nom</th>
                <th>QTE_MAX</th>
                <th>IMAGE</th>
                <th>Nom_cat</th>
                <th>PRIX</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody> 
            <tr>
            <?php 
             
             $db = Database::connect();
            if($status){
             
              try{
              $statement = $db->prepare("select ID_PRD,NOM,QTE_MAX,IMAGE,Nom_cat,PRIX from produit where NOM = ? or Nom_cat = ?");
              $statement->execute(array($search,$search));
              while($item = $statement->fetch())
              {
                  
             echo  '<tr>';
if($item['QTE_MAX'] < 5 ){

  echo    '<td class="exp">' . $item['NOM'] .  '</td>';
  echo    '<td class="exp">' . $item['QTE_MAX'] .  '</td>';
  echo    '<td class="exp" width=300 ><img class="image" src="../../img/'.$item["Nom_cat"] .'/' . $item["IMAGE"] .'" ></td>'; 
  echo    '<td class="exp">' . $item['Nom_cat'] .  '</td>'; 
  echo    '<td class="exp">' . $item['PRIX'] .  '</td>'; 
  echo   '<td class="exp" width=300>';
  echo   '<a class="btn btn-primary" href="Modifier.php?id=' .$item['ID_PRD'] . '"><span class="glyphicon glyphicon-pencil"></span> Modifier </a>';
  echo ' ';
  echo     '<a class="btn btn-danger" href="Suppression.php?id=' .$item['ID_PRD'] . '"><span class="glyphicon glyphicon-remove"></span> delete </a>'; 
  echo    '</td>';

}else{

  echo    '<td>' . $item['NOM'] .  '</td>';
  echo    '<td>' . $item['QTE_MAX'] .  '</td>';
  echo    '<td width=300><img class="image" src="../../img/'.$item["Nom_cat"] .'/' . $item["IMAGE"] .'" ></td>'; 
  echo    '<td>' . $item['Nom_cat'] .  '</td>'; 
  echo    '<td>' . $item['PRIX'] .  '</td>'; 
  echo   '<td width=300>';
  echo   '<a class="btn btn-primary" href="Modifier.php?id=' .$item['ID_PRD'] . '"><span class="glyphicon glyphicon-pencil"></span> Modifier </a>';
  echo ' ';
  echo     '<a class="btn btn-danger" href="Suppression.php?id=' .$item['ID_PRD'] . '"><span class="glyphicon glyphicon-remove"></span> delete </a>'; 
  echo    '</td>';

}
            
             
             echo '</tr>';     
                 
                  
              }
            }catch(Exception $e){
                die('Erreur : ' . $e->getMessage());
            }    
              }else{ 
              $statement = $db->query("select ID_PRD,NOM,QTE_MAX,IMAGE,Nom_cat,PRIX from produit  order by QTE_MAX asc");
              while($item = $statement->fetch())
              {
                  
             echo  '<tr>';
if($item['QTE_MAX'] < 5 ){

  echo    '<td class="exp">' . $item['NOM'] .  '</td>';
  echo    '<td class="exp">' . $item['QTE_MAX'] .  '</td>';
  echo    '<td class="exp" width=300 ><img class="image" src="../../img/'.$item["Nom_cat"] .'/' . $item["IMAGE"] .'" ></td>'; 
  echo    '<td class="exp">' . $item['Nom_cat'] .  '</td>'; 
  echo    '<td class="exp">' . $item['PRIX'] .  '</td>'; 
  echo   '<td class="exp" width=300>';
  echo   '<a class="btn btn-primary" href="Modifier.php?id=' .$item['ID_PRD'] . '"><span class="glyphicon glyphicon-pencil"></span> Modifier </a>';
  echo ' ';
  echo     '<a class="btn btn-danger" href="Suppression.php?id=' .$item['ID_PRD'] . '"><span class="glyphicon glyphicon-remove"></span> delete </a>'; 
  echo    '</td>';

}else{

  echo    '<td>' . $item['NOM'] .  '</td>';
  echo    '<td>' . $item['QTE_MAX'] .  '</td>';
  echo    '<td width=300><img class="image" src="../../img/'.$item["Nom_cat"] .'/' . $item["IMAGE"] .'" ></td>'; 
  echo    '<td>' . $item['Nom_cat'] .  '</td>'; 
  echo    '<td>' . $item['PRIX'] .  '</td>'; 
  echo   '<td width=300>';
  echo   '<a class="btn btn-primary" href="Modifier.php?id=' .$item['ID_PRD'] . '"><span class="glyphicon glyphicon-pencil"></span> Modifier </a>';
  echo ' ';
  echo     '<a class="btn btn-danger" href="Suppression.php?id=' .$item['ID_PRD'] . '"><span class="glyphicon glyphicon-remove"></span> delete </a>'; 
  echo    '</td>';

}
            
             
             echo '</tr>';     
                 
                  
              }
            }
                
                
              Database::disconnect();  
                
                
                ?>  
            </tbody>
            </table>
            
            
        </div>
        
        
        </div>
  </div>
</div>
	
</body>
</html>