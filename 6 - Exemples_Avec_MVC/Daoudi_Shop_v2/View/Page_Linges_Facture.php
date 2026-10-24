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
                    <a href="../Controller/Page_Factures.php"><span id="categorie" class="nav-link"> Factures </span></a>

                    </li>
                    <li class="nav-item">
                    <a href="../Controller/Page_Liste_Categorie.php"><span id="categorie" class="nav-link"> Categories </span></a>

                    </li>
                    <li class="nav-item">
                    <a href="../Controller/Page_Ajouter_Categorie.php"> <span id="AjCat" class="nav-link">Ajouter Categorie </span></a>

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
        
        <div class="col-6" id="logoFacture">
            <center>
                <img src="../Icon_Photo/Logo.jpg" width="20%" alt="logo" id="imgfacture">
            </center>
        </div>
        <div class="col-6">
            <h1>Les Information de Client</h1>
            <table class="T_info">
                <tr>
                    <th>Numréro Facture : </th>
                    <td><?php echo $T_Info_Client[0]; ?></td>
                </tr>
                <tr>
                    <th>Nom Client : </th>
                    <td><?php echo $T_Info_Client[1]; ?></td>
                </tr>
                <tr>
                    <th>Email Client :</th>
                    <td><?php echo $T_Info_Client[2]; ?></td>
                </tr>
                <tr>
                    <th>Télefone Client :</th>
                    <td><?php echo $T_Info_Client[3]; ?></td>
                </tr>
                <tr>
                    <th>Adresse Client :</th>
                    <td><?php echo $T_Info_Client[4]; ?></td>
                </tr>
                <tr>
                    <th>Date Facture :</th>
                    <td><?php echo $T_Info_Client[5]; ?></td>
                </tr>
            </table>
        </div>

    </div>

    <br><br>

    <div class="Categories">
        <?php echo $table; ?>
    </div>
</body>

</html>