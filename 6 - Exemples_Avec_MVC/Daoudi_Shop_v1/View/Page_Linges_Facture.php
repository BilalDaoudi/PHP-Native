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
            width: 190px;
            height: 170px;
            border-radius: 50%;
        }
        .logo{
            padding-left: 250px;
            width: 700px;
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
            width: 250px;
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



        #T_Linge th {
            background-color: #F2ECFF;
            height: 50px;
            font-size: 25px;
            border-top: 1px solid black;
            border-bottom: 1px solid black;
            border-right: 1px solid black;
            border-left: 1px solid black;
        }

        #T_Linge td {
            padding-top: 20px;
            color:purple;
            font-size: 25px;
            text-align: center;
            border-bottom: 1px solid black;
            border-right: 1px solid black;
            border-left: 1px solid black;
        }


        .ImgArt {
            width: 50px;
            height: 50px;
            border-radius: 10%;
        }

        .img {
            padding: 10px;
        }
        p{
            padding-bottom: 50px;
            font-size: 30px;
            font-weight: 900;
            font-style: italic;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            
        }

        .NumeroFac a{
            background-color: black;
            border-radius: 50%;
        }
        .all {
            padding-bottom: 50px;
            padding-top: 100px;
            display: flex;
        }
        .infoclient #T_info {
            font-size: 20px;
        }
        .infoclient #T_info td{
            color: #F2ECFF;
        }
        .infoclient #T_info th{
            text-align: end;
        }
        .infoclient h1{
            color: green;
        }
    </style>
</head>

<body>
    <form action="" method="post">
        <div class="infor">
            
            <span id="NomPr"> Nom :  <?php echo $_SESSION["Admin"][2] . " " . $_SESSION["Admin"][3] ?></span>
            <span id="facture"> <a href="../Controller/Page_Factures.php">Factures</a>  </span>
            <span id="categorie"> <a href="../Controller/Page_Liste_Categorie.php">Categories</a>  </span>
            <span id="AjCat"> <a href="../Controller/Page_Ajouter_Categorie.php">Ajouter Categorie</a>  </span>
            <span id="AjArt"> <a href="../Controller/Page_Ajouter_Article.php">Ajouter Article</a>  </span>
            <input type="submit" value="Deconnecte" name="btnDaconnecte" id="btnDeconnecte"> 

        </div>
    </form>

    <div class="all">
    <div class="logo">
    <img src="../Icon_Photo/Logo.jpg" width="20%">
    </div>      


    <div class="infoclient">
        <h1>Les Information de Client</h1> <br>
        <table id="T_info">
            <tr>
                <th>Numréro Facture : </th>
                <td><?php echo $T_Info_Client[0]; ?></td>
            </tr>
            <tr>
                <th>Nom Client     : </th>
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

    <center>

    <div class="Categories">
        <?php echo $table; ?>
    </div>
    </center>

</body>

</html>