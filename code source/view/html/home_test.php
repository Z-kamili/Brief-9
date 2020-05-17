<?php 

require '../../Database/database.php';

$db = Database::connect();

$stmt = $db->prepare("SELECT * FROM produit");
$stmt->execute();

Database::disconnect();

// if($stmt->rowCount()){
//     while($row = $stmt->fetch()){
//         print_r($row);
//     }
// }

session_start();
$_SESSION['productId']=[];
if(isset($_POST['addToCart'])){

    

    $_SESSION['productId'][] = $_POST['idProd'];

}
$list=array_unique($_SESSION['productId']);

// session_start();
// unset($_SESSION['productId']);


// -------------------------------------

$db = Database::connect();

$stmt2 = $db->prepare("SELECT * FROM panier_fixe");
$stmt2->execute();

Database::disconnect();

$_SESSION['panierFixId']=[];
if(isset($_POST['addPFToCart'])){


    $_SESSION['panierFixId'][] = $_POST['idPanF'];

}
$list2=array_unique($_SESSION['panierFixId']);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <p>session products : <?php print_r($list); ?></p>
        <p>session panier : <?php print_r($list2); ?></p>

       <?php if($stmt->rowCount()){ ?>
            <?php while($row = $stmt->fetch()){ ?>

                <div>
                    <h1><?php echo $row['NOM']; ?> :</h1>
                    <img src="<?php echo $row['IMAGE']; ?>" alt="">
                    <p>quantité : <?php echo $row['QTE_MAX']; ?></p>
                    <p>prix : <?php echo $row['prix']; ?></p>
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                        <input type="hidden" value="<?php echo $row['ID_PRD']; ?>" name="idProd">
                        <input type="submit" value="add to cart" name="addToCart">
                    </form>
                </div>

            <?php } ?>
        <?php } ?>



        <?php if($stmt2->rowCount()){ ?>
            <?php while($row = $stmt2->fetch()){ ?>

                <div>
                    <h1>Panier <?php echo $row['ID_PFIX']; ?> :</h1>
                    <img src="../imgs/Icon material-shopping-cart.svg" alt="">
                    <p>cree en : <?php echo $row['DATE_PANIER']; ?></p>
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                        <input type="hidden" value="<?php echo $row['ID_PFIX']; ?>" name="idPanF">
                        <input type="submit" value="add to cart" name="addPFToCart">
                    </form>
                </div>

            <?php } ?>
        <?php } ?>
    
</body>
</html>