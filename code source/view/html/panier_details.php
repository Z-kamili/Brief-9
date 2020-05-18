<?php 

require '../../Database/database.php';

$db = Database::connect();

if(isset($_GET['id'])){
    // $idPF = mysqli_real_escape_string($db, $_GET['id']);
    $idPF = $_GET['id'];

    $stmt = $db->prepare("SELECT * FROM panier_fixe WHERE ID_PFIX = $idPF");
    $stmt->execute();
}

Database::disconnect();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php if($stmt->rowCount()){ ?>
            <?php while($row = $stmt->fetch()){ ?>

                <div>
                    <h1>Panier <?php echo $row['ID_PFIX']; ?> :</h1>
                    <img src="../imgs/Icon material-shopping-cart.svg" alt="">
                    <p>cree en : <?php echo $row['DATE_PANIER']; ?></p>
                    <div>
                        <h2>list of products :</h2>
                        <?php   $db = Database::connect();
                                $idPanierTemp = $row['ID_PFIX'];
                                $stmt3 = $db->prepare("SELECT * FROM contenir_panierfix WHERE ID_PFIX = $idPanierTemp");
                                $stmt3->execute();

                                if($stmt3->rowCount()){
                                    while($row3 = $stmt3->fetch()){ ?>


                                                <?php  
                                                $idProdTemp = $row3['ID_PRD'];
                                                $stmt4 = $db->prepare("SELECT * FROM produit WHERE ID_PRD = $idProdTemp");
                                                $stmt4->execute();

                                                if($stmt4->rowCount()){
                                                    while($rowP = $stmt4->fetch()){ ?>
                                                        
                                                        <p>nom produit : <?php echo $rowP['NOM'] ?> ,prix : <?php echo $rowP['prix'] ?>, quantité : <?php echo $row3['QTE'] ?> </p>


                                                    <?php } ?>
                                                 <?php } ?>


                                        <?php } ?>
                                <?php } ?>
                                
                         <?php Database::disconnect(); ?>

                    </div>

                </div>

            <?php } ?>
        <?php } ?>

    
</body>
</html>