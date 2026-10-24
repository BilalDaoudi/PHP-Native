<html>

<head>
    <title></title>
    <link rel="stylesheet" href="../CSS/bootstrap-5.2.0-dist/css/bootstrap.min.css">
    <script src="../CSS/bootstrap-5.2.0-dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../CSS/All.css">
    <link rel="stylesheet" href="../CSS/style_add_update.css">
</head>


<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
            <span id="NomPr" class="navbar-brand"><?php echo $_SESSION["Admin"][2] . " " . $_SESSION["Admin"][3] ?></span>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a href="../Controller/Page_Liste_Categorie.php"><span class="nav-link" id="categorie"> Categories</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="../Controller/Page_Factures.php"><span class="nav-link" id="facture"> Factures </span></a>
                    </li>
                    <li class="nav-item">
                        <a href="../Controller/Page_Ajouter_Categorie.php"> <span id="AjCat" class="nav-link"> Ajouter Categorie </span></a>
                    </li>
                    <li class="nav-item">
                        <a href="../Controller/Page_Ajouter_Article.php"> <span id="AjArt" class="nav-link"> Ajouter Article </span></a>
                    </li>
                </ul>
                <form action="" method="post" class="nav justify-content-end">
                    <input type="submit" value="Deconnecte" name="btnDaconnecte" id="btnDeconnecte">
                </form>
            </div>
        </div>
    </nav>



    <div class="row">
        <div class="col-6 justify-content-center">
            <center>
                <img src="../Icon_Photo/Logo.jpg" class="logo-add-update" width="80%">
            </center>
        </div>
        <div class="col-6 justify-content-center">
            <center>
                <form enctype="multipart/form-data" action="" method="POST">
                    <label for="id">id Categorie</label><br>
                    <input type="text" name="tid" id="id" class="inp" readonly value="<?php echo $_GET["idCat"]; ?>"><br><br>
                    <label for="code">Code Article</label><br>
                    <input type="text" name="tcode" id="code" class="inp" readonly value="<?php echo $_GET["UpCodeArt"]; ?>"><br><br>
                    <label for="description">Description</label><br>
                    <input type="text" name="tdescription" class="inp" id="description"><br><br>
                    <label for="photo">Photo Categorie</label><br>
                    <input type="file" name="tphoto" id="photo" class="inp" accept=".jpg , .jpeg , .png"><br><br>
                    <label for="photo">Prix Unitaire</label><br>
                    <input type="number" name="tprix" class="inp" id="prix"><br><br>
                    <label for="photo">Quantité Stocké</label><br>
                    <input type="number" name="tquantite" class="inp" id="quantite"><br><br>
                    <input type="submit" name="btnModifier" class="btn" id="btnModifier" value="Modifier"><br><br>
                </form>
            </center>
        </div>
    </div>
</body>

</html>