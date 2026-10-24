<head>
    <title></title>
    <style>
        * {
            margin: 0;
        }

        #menu {
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background: linear-gradient(100deg, rgb(0, 0, 0), gray, rgb(0, 0, 0), gray);
            background-size: 400% 400%;
            width: 100%;
            display: flex;
            padding-right: 100px;
            box-sizing: border-box;
        }

        #menu li {
            height: 30px;
            text-align: center;
            width: 150px;
            list-style-type: none;
            margin: 4px 2px;
            padding: 6px 6px;
            font-weight: 500;
            font-size: 25px;
            text-decoration: none;
            color: white;
            transition: 1s ease;
            box-shadow: 0px 2px 5px rgb(0, 0, 0, 346);
        }

        #menu li:hover {
            color: black;
            background-color: white;
            transform: scale(1.1, 1.1);
        }

body {
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background: linear-gradient(100deg, #00FFFF, #008AD7, #00FFFF, #008AD7);
            background-size: 400% 400%;
        }
        /* body {
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background: linear-gradient(1000deg, gray, white, gray, white);
            background-size: 400% 400%;
        } */



        a {
            text-decoration: none;
        }

        #tbl th {
            background-color: #3B3B3B;
            font-size: 25px;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            font-weight: 800;
            font-style: italic;
            color: aqua;
            border-bottom: 1px solid grey;
            border-right: 1px solid grey;
        }

        #tbl td {
            /* color: white; */
            text-align: center;
            border: none;
            border-bottom: 1px solid grey;
            border-right: 1px solid grey;
        }

        a {
            text-decoration: none;
            /* color: white; */
        }

        #NBArt{
            background-color: aliceblue;
            border-radius: 60%;
            color: black;
        }
        .btnDelete {
            border-radius: 50%;
        }

        .ImgArt {
            height: 100px;
            box-shadow: 1px 1px 1px 1px black;
            border-radius: 45%;
        }

        .Description {
            font-size: 25px;
            font-family: Arial, Helvetica, sans-serif;
            font-weight: 600;
            color: green;
        }

        .PrixUnitaire {
            font-size: 25px;
            font-family: Arial, Helvetica, sans-serif;
            font-weight: 600;
            color: #474554;
        }

        .Quantite {
            font-size: 30px;
            font-family: Arial, Helvetica, sans-serif;
            font-weight: 600;
            color: #008B69;
        }

        .PrixTotal {
            font-size: 25px;
            font-family: Arial, Helvetica, sans-serif;
            font-weight: 600;
            color: #474554;
        }

        #Logo {
            margin: 20px;
            width: 300px;
            border-radius: 50%;
        }

        #btnValider {
            font-size: 25px;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            font-weight: 600;
            background-color: #ACA9BB;
            border-radius: 50px;
            padding: 5px 20px 5px 20px;
        }

        #Total {
            color: blueviolet;
            font-weight: 900;
            font-size: 30px;
        }
        #help {
            padding-right: 100px;
            box-sizing: border-box;
            top: 0px;
            left: 0px;
            margin: 0px;
            padding: 0px;
        }

        #help li {
            width: 400px;
            list-style-type: none;
            margin: 4px 2px;
            padding: 6px 6px;
            font-weight: 300;
            font-size: 21px;
            text-decoration: none;
            /* color: white; */
            transition: 1s ease;
            /* box-shadow: 0px 2px 5px rgb(0, 0, 0, 346); */
        }



        /* #help li:hover {
            color: black;
            background-color: white;
            transform: scale(1.1, 1.1);
        } */
        .icon{
            width: 40px;
            border-radius: 50%;
        }
        .Hli span{
            position: relative;
            bottom: 8px; 
        }
        .Hli {
            width: 40px;
            border-radius: 50%;
            text-align:left;
        }
    </style>

</head>

<body>
    <!-- Menu -->
    <ul id="menu">
        <a href="../Controller/Page_Principale.php">
            <li>Categorie</li>
        </a>
        <a href="../Controller/Page_Panier.php">
            <li>Panier <span id="NBArt">&nbsp;
                 <?php if (isset($_SESSION["Articles"]))
                                    echo count($_SESSION["Articles"]);
                                else echo 0; ?>
                &nbsp;</span></li>
        </a>
        <a href="../Controller/Page_Principale.php?#help">
            <li>Help</li>
        </a>
    </ul>
    <!-- Logo -->
    <center>
        <div class="Logo">
            <img src="../Icon_Photo/Logo.jpg" id="Logo">
        </div>
    </center>
    <?php
    echo $table;
    ?>

    <br>
    <br>
    <center>
        <a href="../Controller/Page_Info_Client.php"><button id="btnValider">Valider &nbsp; <span id="Total"><?php echo $total ?></span> DH</button></a>
    </center>

    <br><br><br><br>


    <!-- help -->
    <center>
        <div class="help">
            <br>
            <ul id="help">
                <li class="Hli"> <img src="../Icon_Photo/Icon_Fb.png" class="icon"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span>Bilal Daoudi</span> </li>
                <li class="Hli"> <img src="../Icon_Photo/Icon_Instagram.jpeg" class="icon">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>Bilaldaoudi591</span> </li>
                <li class="Hli"> <img src="../Icon_Photo/Icon_Tele.png" class="icon">&nbsp;&nbsp;&nbsp;&nbsp; <span>+212707900867</span> </li>
                <li class="Hli"> <img src="../Icon_Photo/Icon_Email.png" class="icon">&nbsp;&nbsp;&nbsp;&nbsp; <span>Bilaldaoudi591@gmail.com</span> </li>
            </ul>
        </div>
    </center>
    <br><br>


</body>

</html>
<!-- <a href="../Controller/Page_Principale.php">Retour</a> -->