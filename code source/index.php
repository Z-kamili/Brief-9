<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="view/style/home.css">
    <title>Document</title>
</head>
<body>
    <!-- navbar -->
    <nav>
        <!-- <input type="checkbox" id="checkTopNav">
        <label id="checkNavBtn" for="checkTopNav"><img src="../icons/iconMenu.png" alt="" width="24px"></label> -->
        <div id="topNav">
            <a class="logo" href="index.php"></a>
            <ul>
                <li class="categorie">
                    <a href="view/html/categorie.php">
                        <div class="categorieTitle">
                            <div class="categorieIcon">
                            <span></span>
                            <span></span>
                            <span></span>
                            </div>
                            <p>Catégories</p> 
                        </div>
                    </a>
                    <ul class="categorieDropdown">
                        <li><a href="#">Catégorie-1</a></li>
                        <li><a href="#">Catégorie-2</a></li>
                        <li><a href="#">Catégorie-3</a></li>
                    </ul>
                </li>
                <li class="search">
                    <form action="/action_page.php">
                        <input type="text" placeholder="Cherchez un produit ou une marque" name="search">
                        <button type="submit">Submit</button>
                    </form> 
                </li>
                <li><a href="view/html/panier.php">
                        <div class="panierIcon"></div>
                        <span>Panier</span>
                    </a> 
                </li>
                <li><a href="view/html/inscription.php">
                        <div class="connextionIcon"></div>
                        <span>Se connecter</span>
                    </a> 
                </li>
            </ul>
        </div>
    </nav>
    <!-- =============================================================================================================== -->

    <div class="container">
        <!-- include header -->
        <?php require 'view/includes/header.php'; ?> 

        <section>
        <!-- write your code here -->
        </section>
    </div>
    
    <!-- include footer -->
    <?php require 'view/includes/footer.php'; ?> 
 
</body>
</html>