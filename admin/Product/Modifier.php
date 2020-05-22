<?php
     
     require '../../codesource/Database/database.php';
     $id =  $nom_prd = $ID_prd = $error  = $qte_max = $categorie = $prix = $nom_prdeerror =   $qte_maxError = $categorieError = $prixError = "";
     $isSuccess = true;
     $Disponible = "vrai";
     session_start();
     if($_SESSION["user"] == null){
        header("Location:http://localhost/Tbeb-Lik/admin/Login.php");
     }else{
        if(!empty($_GET['id'])){
      
      
            $id = $_GET['id'];
            
        }
         if(!empty($_POST)){
           
           $nom_prd = $_POST['Nom'];
           $qte_max  = $_POST['qte_max'];
           $categorie = $_POST['categorie'];
           $prix =$_POST['prix'];

           if(empty($nom_prd)){
 
            $nom_prdeerror = "ce champ et  vide ou bien incorrect";
            $isSuccess = false;

           }
           if(empty($qte_max)){
 
            $qte_maxError = "ce champ et  vide ou bien incorrect";
            $isSuccess = false;

           }
           if(empty($categorie)){

            $categorieError = "ce champ et  vide ou bien incorrect";
            $isSuccess = false;

           }
           if(empty($prix)){

            $prixError = "ce champ et  vide ou bien incorrect";
            $isSuccess = false;

           }

           
    if($isSuccess){
        try{
            $db = Database::connect();
            $id = $_POST["id"];
            $statement = $db->prepare("Update produit set NOM = ?,QTE_MAX = ?,Nom_cat = ?,PRIX = ? where  ID_PRD = ?");
            $statement->execute([$nom_prd,$qte_max,$categorie,$prix,$id]);     
            Database::disconnect();
            header("Location:produit.php");
        }catch(Exception $e){
            die('Erreur : ' . $e->getMessage());
        }
        }
        
    }else{
            $db = Database::connect();
            $statement = $db->prepare("select * from produit where ID_PRD = ?");
            $statement->execute(array($id));
            $item = $statement->fetch();
            $nom_prd = $item["NOM"];
            $qte_max = $item["QTE_MAX"];
            $categorie = $item["Nom_cat"];
            $prix = $item["PRIX"];
            Database::disconnect();
         }
     }
?>
<!DOCTYPE html>
<html>
<head>
<title>ADMIN</title>
    <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="../css/style2.Css">
    <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type="text/css">
    <link href="../../app/img/logoadmin.png" rel="icon" type="image/png">
</head>
    <body>
        
        <div class="container admin" style="margin-top:65px;">
            <!-- <a href="../../index.php">
                <img src="../../app/img/Logo_vertical.svg" class="LOGO" alt="logo">
        </a> -->
        <div class="row">
          
                
                <br>
            <form class="form" action="Modifier.php" enctype="multipart/form-data" id="formulaire" method="post">
            <h1><strong>Modifier  un  Produit</strong></h1>
            <div class="form-group" enctype="multipart/form-data">
                <label for="name">Nom Produit: </label>
                <input type="text"  id="name" placeholder="Nom" name="Nom"   value="<?php echo $nom_prd; ?>">
                <input type="hidden" name="id" value="<?php echo $id;?>"/>
                <span class="help-inline" style="color:red"> 
                <?php echo $nom_prdeerror; ?>
                </span>
                
                </div>   
                 <div class="form-group">
                <labe for="qte_max">Quantite max </labe>
                <input type="number"  id="qte_max" placeholder="Nom" name="qte_max"   value="<?php echo $qte_max; ?>">
                <span class="help-inline" style="color:red"> 
                <?php echo $qte_maxError; ?>
                </span>
                
                </div>   
                 <div class="form-group">
                <labe for="price">categorie: </labe>
                <input type="text"  placeholder="EMAIL" name="categorie"  id="point"  value="<?php echo $categorie; ?>">
                <span class="help-inline" style="color:red"> 
                <?php echo $categorieError;?>
                </span>
                
                </div>   
                <div class="form-group">
                    <labe for="price">prix: </labe>
                    <input type="text"  id="point" name="prix"     value="<?php echo $prix; ?>">
                    <span class="help-inline"  style="color:red"> 
                    <?php echo $prixError; ?>
                    </span>
                    
                    </div>   
            
            <div class="form-actions">
            
            <button type="submit" class="btn btn-success" > <span class="glyphicon glyphicon-pencil"></span>Ajouter   </button>
   <a class="btn btn-primary" href="produit.php"> <span class="glyphicon glyphicon-arrow-left"></span> Retour</a>            
            </div>
                 </form>
               
            
            
            
       
            
           
            
        </div>
        
        
        </div>
        <!-- <div id="footer">
            <span>@Copyright 2020. All right reserved.</span>
        </div> -->
    
    </body>
</html>