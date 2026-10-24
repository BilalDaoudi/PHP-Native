<html>

<head>
    <title>Ajouter Categorie</title>
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
            <div class="collapse navbar-collapse justify-content-end" id="mynavbar">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a href="../Controller/Page_Liste_Categorie.php"><span class="nav-link" id="categorie"> Categories </span></a>
                    </li>
                    <li class="nav-item">
                        <a href="../Controller/Page_Factures.php"><span class="nav-link" id="facture"> Factures </span></a>
                    </li>
                    <li class="nav-item">
                        <a href="../Controller/Page_Ajouter_Article.php"><span id="AjArt" class="nav-link"> Ajouter Article </span></a>
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
        <div class="col-6 justify-content-center add_cat">
            <center>
                <form enctype="multipart/form-data" action="" method="POST">
                    <label for="description">Description</label><br>
                    <input type="text" name="tdescription" id="description" class="inp" pattern="[a-zA-Z]+" title="les lettre selement"><br><br>
                    <label for="photo">Photo Categorie</label><br>
                    <input type="file" name="tphoto" id="photo" class="inp" accept=".jpg , .jpeg , .png"><br><br>
                    <input type="submit" name="btnAjouter" id="btnAjouter" class="btn" value="Ajouter"><br><br>
                </form>
            </center>
        </div>
    </div>
</body>

</html>