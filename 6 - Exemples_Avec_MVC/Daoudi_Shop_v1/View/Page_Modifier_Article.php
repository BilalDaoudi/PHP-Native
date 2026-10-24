<html>

<head>
    <title></title>
    <style>
        * {
            margin: 0;
        }

        body {
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background: linear-gradient(100deg, #00FFFF, #008AD7, #00FFFF, #008AD7);
            background-size: 400% 400%;
        }

        .logo img {
            padding: 50px;
            width: 190px;
            height: 170px;
            margin-top: 50px;
            border-radius: 50%;
            
        }

        .infor span {
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;

            height: 30px;
            text-align: center;
            width: 250px;
            list-style-type: none;
            margin: 4px 2px;
            padding: 6px 6px;
            font-weight: 500;
            font-size: 25px;
            text-decoration: none;
            color: white;
            transition: 1s ease;
        }

        span:hover {
            background-color: red;
        }

        .infor {
            position: fixed;
            z-index: 999;
            background-color: #302923;
            width: 100%;
            display: flex;
            padding-right: 100px;
            box-sizing: border-box;
            top: 0px;
            left: 0px;
            margin: 0px;
            padding: 0px;
        }

        #NomPr {
            color: gold;

        }

        #NomPr:hover {
            background-color: black;
        }

        a {
            color: aliceblue;
            text-decoration: none;
        }

        #btnDeconnecte {
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            margin-top: 10px;
            color: aliceblue;
            background-color: #302923;
            border: none;
            width: 300px;
            font-size: 25px;
            height: 33px;
            text-align: center;
            list-style-type: none;
            font-weight: 500;
            font-size: 25px;
            text-decoration: none;
            color: white;
            transition: 1s ease;
        }

        #btnDeconnecte:hover {
            background-color: red;
            
        }
        .logo img {
            padding: 150px;
            width: 400px;
            height: 360px;
            border-radius: 50%;
            
        
        }

        .all {
            display: flex;
        }
        .Connecte{
            padding: 60px;
            text-align: center;
            padding-left: 200px;
            height: 150px;
            
        }
        h1{
            color: #324B4C;
            font-size: 35px;
            margin-bottom: 50px;
        }
        form{
            color: #FFE964;
            font-size: 25px;
        }
        select{
            text-align: center;
            font-size: 18px;
            background-color: #E3E0F3;
            outline: none;
            border: none;
            border-bottom: 1px solid black;
            border-radius: 20px;
            width: 300px;
            height: 40px;
        }
        input{
            text-align: center;
            font-size: 18px;
            background-color: #E3E0F3;
            outline: none;
            border: none;
            border-bottom: 1px solid black;
            border-radius: 20px;
            width: 300px;
            height: 40px;
        }
        input[type="submit"]{
            text-align: center;
            background-color: black;
            color: #00FFFF;
            outline: none;
            border: 1px solid white;
            border-radius: 20px;
            width: 150px;
            height: 35px;
        }
        input[type="file"]{
            padding-left: 30px;
            padding-top: 5px;
            text-align: center;
            background-color: gray;
            color: #00FFFF;
            outline: none;
            border-radius: 20px;
        }

        


        
    </style>
</head>

<body>

<form action="" method="post">
        <div class="infor">
            <span id="NomPr">Nom :  <?php echo $_SESSION["Admin"][2] . " " . $_SESSION["Admin"][3] ?></span>
            <span id="facture"> <a href="../Controller/Page_Factures.php">Factures</a> </span>
            <span id="categorie"> <a href="../Controller/Page_Liste_Categorie.php">Categories</a> </span>

            <span id="AjCat"> <a href="../Controller/Page_Ajouter_Categorie.php">Ajouter Categorie</a> </span>
            <span id="AjArt"> <a href="../Controller/Page_Ajouter_Article.php">Ajouter Article</a> </span>
            <input type="submit" value="Deconnecte" name="btnDaconnecte" id="btnDeconnecte">

        </div>
    </form>

    <div class="all">

    <div class="logo">
        <img src="../Icon_Photo/Logo.jpg" width="20%">
    </div>

    <div class="Connecte">
        <form enctype="multipart/form-data" action="" method="POST">
            <label for="id">id Categorie</label><br>
            <input type="text" name="tid" id="id" readonly value="<?php echo $_GET["idCat"]; ?>"><br><br>

            <label for="code">Code Article</label><br>
            <input type="text" name="tcode" id="code" readonly value="<?php echo $_GET["UpCodeArt"]; ?>"><br><br>

            <label for="description">Description</label><br>
            <input type="text" name="tdescription" id="description"><br><br>

            <label for="photo">Photo Categorie</label><br>
            <input type="file" name="tphoto" id="photo" accept=".jpg , .jpeg , .png"><br><br>

            <label for="photo">Prix Unitaire</label><br>
            <input type="number" name="tprix" id="prix"><br><br>

            <label for="photo">Quantité Stocké</label><br>
            <input type="number" name="tquantite" id="quantite"><br><br>

            <input type="submit" name="btnModifier" id="btnModifier" value="Modifier"><br><br>
        </form>

    </div>

    </div>


</body>

</html>