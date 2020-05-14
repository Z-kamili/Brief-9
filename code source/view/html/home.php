<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/home.css">
    <title>Document</title>
</head>
<body>
    <!-- start top-navbar -->
    <nav>
        <!-- <input type="checkbox" id="checkTopNav">
        <label id="checkNavBtn" for="checkTopNav"><img src="../icons/iconMenu.png" alt="" width="24px"></label> -->
        <div id="topNav">
            <a class="logo" href="home.html"></a>
            <ul>
                <li class="categorie">
                    <a href="categorie.html">
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
                <li><a href="panier.html">
                        <div class="panierIcon"></div>
                        <span>Panier</span>
                    </a> 
                </li>
                <li><a href="inscription.html">
                        <div class="connextionIcon"></div>
                        <span>Se connecter</span>
                    </a> 
                </li>
            </ul>
        </div>
    </nav>
    <!-- end top-navbar -->

    <div class="container">
            <!-- start header -->
        <header>
            <div class="discription">
                <span>Vous pouvez achetez facilement et rapidement des paniers pret</span>
            </div>
            <div class="slider">
                <div class="backBtn"></div>
                <div class="nextBtn"></div>
                <div class="slid">
                    <ul>
                    </ul>
                    <div class="basketImg"></div>
                    <div class="basketTitle"></div>
                    <div class="basketPrice"></div>
                    <button id="addBasketBtn"></button>
                </div>
            </div>
        </header>
            <!-- end header -->

        <section>
        <!-- write your code here -->
        </section>
    </div>
    
   
 <?php require '../include/footer.php'; ?> 
 
    
</body>
</html>