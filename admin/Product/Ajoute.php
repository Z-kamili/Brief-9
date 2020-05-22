<?php
     require '../../codesource/Database/database.php';
     $ID_prd    = $Nom = $Qte_MAX = $IMAGE  = $Nom_cat =  $Prix = $Nomerror = $NomError = $Qte_MAXError = $IMAGEError = $Nom_catError = "";
     $isSuccess  = $status =  true;
     $password = "";
     $error = null;
     session_start();
     if( $_SESSION["user"] == null){
        header("Location:../Login.php");
     }else{
         if(!empty($_POST)){
           $Nom = checkInput($_POST['NOM']);
           $Qte_MAX  = checkInput($_POST['QTE_MAX']);
           $IMAGE = checkInput($_FILES['image']['name']);
           $Nom_cat = checkInput($_POST['Nom_cat']);
           $Prix = checkInput($_POST['Prix']);
           $target = "../../img/".$Nom_cat."/".basename($IMAGE);
           $imageExtension  = pathinfo($target,PATHINFO_EXTENSION);
           if(empty($Nom)){
            $Nomerror = "ce champ ne peut pas etre vide";
            $isSuccess = false;
           }
           if(empty($Qte_MAX)){
            $Qte_MAXError = "ce champ ne peut pas etre vide";
            $isSuccess = false;
           }
           if(empty($IMAGE)){
            $IMAGEError = "ce champ ne peut pas etre vide";
            $isSuccess = false;
           }
           if($imageExtension != "jpg" && $imageExtesion != "png" && $imageExtension != "jpeg" && $imageExtension != "gif"){
               $IMAGEError = "Les fichier autorises sont : .jpg, .jpng , .png , .gif";
               $isSuccess = false;   
           }
           if(file_exists($imagePath)){
               $IMAGEError = "Le fichier existe deja";
               $isSuccess = false;
           }
           if($_FILES["image"]["size"] > 500000){ 
               $imageError = "Le fichier ne doit pas depasser le 500KB";
               $isSuccess = false;
           }

           if(empty($Nom_cat)){
            $Nom_catError = "ce champ ne peut pas etre vide";
            $isSuccess = false;
           }
          
    if($isSuccess){
        
        try{
            $db = Database::connect();
            $statement = $db->prepare("Insert into produit (NOM,QTE_MAX,IMAGE,Nom_cat,PRIX) value(?,?,?,?,?)");
            $statement->execute(array($Nom,$Qte_MAX,$IMAGE,$Nom_cat,$Prix)); 
            move_uploaded_file($_FILES['image']['tmp_name'],$target);  
            Database::disconnect();
            header("Location: Ajoute.php");
        }catch(Exception $e){
            die('Erreur : ' . $e->getMessage());
        }
    }
         }
     }
     function checkInput($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;   
    }
?>

<!DOCTYPE html>
<html>
<head>
<title>ADMIN</title>
    <meta charset="utf-8">
    <style><?php file_get_contents("css_file.css");?></style>
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="../css/style2.Css">
 <link href="../../app/img/logoadmin.png" rel="icon" type="image/png">
    <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type="text/css">
</head>
    <body>

        <div class="container admin" >
        <!-- <a href="../../index.php">
                <img src="../../app/img/Logo_vertical.svg" class="LOGO" alt="logo">
        </a> -->
        <div class="row" style="margin-top:131px;">
                <br>
            <form class="form" action="Ajoute.php" enctype="multipart/form-data" id="formulaire" method="post">
            <h1><strong>Ajouter  un  Produit</strong></h1>
            <div class="form-group" enctype="multipart/form-data">
                <!-- <labe for="name">Matricule: </labe> -->
                <input type="text" name="NOM"  id="name" placeholder="Nom"   value="">
                <span class="help-inline"  style="color:red"> 
                <?php echo $NomError; ?>
                </span>                
                </div>   
                <div class="form-group">
                <input type="number" name="QTE_MAX"  id="description" placeholder="Qte_MAX"   value="">
                <span class="help-inline"  style="color:red"> 
                <?php echo $Qte_MAXError; ?>
                </span>
                </div>   
                 <div class="form-group">
                <!-- <labe for="price">EMail: </labe> -->
                <input type="file" name="image">
                <span class="help-inline"  style="color:red"> 
                <?php echo $IMAGEError; ?>
                </span>                
                </div>   
                <div class="form-group">
                    <!-- <labe for="price">Telephone: </labe> -->
                    <input type="text" name="Nom_cat"   id="point" placeholder="Nom_cat"   value="">
                    <span class="help-inline"  style="color:red"> 
                    <?php echo $Nom_catError; ?>
                    </span>
                    </div>   
                        <div class="form-group">
                            <!-- <labe for="price">Disponible: </labe> -->
                            <!-- <labe for="price">Telephone: </labe> -->
                    <input type="number" name="Prix" id="point" placeholder="Prix"   value="">
                            </span>
                            
                            </div>      
                        
                
                 
                
           
            <br>
            
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