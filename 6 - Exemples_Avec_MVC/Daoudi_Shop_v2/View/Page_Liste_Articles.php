<html>

<head>
    <title></title>
    <link rel="stylesheet" href="../CSS/bootstrap-5.2.0-dist/css/bootstrap.min.css">
    <script src="../CSS/bootstrap-5.2.0-dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../CSS/All.css">
    <style>
        .nav-link:hover {
            color: #000;
        }
    </style>
</head>


<body>

    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
            <span id="NomPr" class="navbar-brand"><?php echo $_SESSION["Admin"][2] . " " . $_SESSION["Admin"][3] ?></span>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="mynavbar">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                    <a href="../Controller/Page_Liste_Categorie.php"> <span class="nav-link" id="categorie"> Categories </span></a>

                    </li>
                    <li class="nav-item">
                    <a href="../Controller/Page_Factures.php"><span class="nav-link" id="facture"> Factures </span></a>

                    </li>

                    <li class="nav-item">
                    <a href="../Controller/Page_Ajouter_Categorie.php"><span id="AjCat" class="nav-link"> Ajouter Categorie </span></a>

                    </li>
                    <li class="nav-item">
                    <a href="../Controller/Page_Ajouter_Article.php"> <span id="AjArt" class="nav-link">Ajouter Article </span></a>

                    </li>
                </ul>
                <form action="" method="post" class="nav justify-content-end">
                    <input type="submit" value="Deconnecte" name="btnDaconnecte" id="btnDeconnecte">

                </form>
            </div>
        </div>
    </nav>

    <center>
        <div class="logo">
            <img src="../Icon_Photo/Logo.jpg" width="20%">
        </div>
        <p class="title"><?php echo $CategorieSelection[1] ?></p>
    </center>
    
    <div class="Articles">
        <?php echo $table; ?>
    </div>

</body>

</html>