<html>

<head>
    <title></title>
    <style>
        #menu {
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
            /* box-shadow: 0px 2px 5px rgb(0, 0, 0, 346); */
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
            background: linear-gradient(100deg, white, gray, white, gray);
            background-size: 400% 400%;
        } */



        #help {
            width: 99%;
            display: flex;
            box-sizing: border-box;
            position: absolute;
            top: 650px;
            margin: 0px;
        }

        #help li {
            width: 400px;
            list-style-type: none;
            font-weight: 300;
            font-size: 21px;
            text-decoration: none;
            transition: 1s ease;
            width: 370px;
        }



        /* #help li:hover {
            color: black;
            background-color: white;
            transform: scale(1.1, 1.1);
        } */

        a {
            text-decoration: none;
        }

        #NBArt {
            background-color: aliceblue;
            border-radius: 60%;
            color: black;
        }

        .icon {
            width: 40px;
            border-radius: 50%;
        }

        .Hli span {
            position: relative;
            bottom: 8px;
        }

        #Logo {
            position: absolute;
            left: 1050px;
            top: 150px;
            margin: 20px;
            width: 260px;
            border-radius: 50%;
        }

        .info {
            position: absolute;
            top: 60px;
            margin: 20px;

        }

        .Hli {
            width: 40px;
            border-radius: 50%;
            text-align: left;
        }

        table tr {
            height: 100px;
        }

        table th {
            font-size: 22px;
            color: #324B4C;
            padding-left: 90px;
            text-align: end;
        }

        #thbtn {
            text-align: center;
        }

        .inp {
            text-align: center;
            font-size: 19px;
            font-weight: 700;
            color: rebeccapurple;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background: linear-gradient(100deg, #CCC, white, #CCC, white);
            background-size: 400% 400%;
            width: 250px;
            height: 30px;
            outline: none;
            border-radius: 20px;
        }

        #btnValider {
            font-size: 25px;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            font-weight: 600;
            background-color: red;
            border-radius: 50px;
            padding: 5px 20px 5px 20px;
            height: 50px;
            width: 200px;
        }
    </style>
</head>

<body>

    <!-- Menu -->
    <ul id="menu">
        <a href="#Categories">
            <li>Categorie</li>
        </a>
        <a href="../Controller/Page_Panier.php">
            <li>Panier <span id="NBArt"> &nbsp;
                    <?php
                    if (isset($_SESSION["Articles"]))
                        echo count($_SESSION["Articles"]);
                    else echo 0; ?>
                    &nbsp;</span>
            </li>
        </a>
        <a href="#help">
            <li>Help</li>
        </a>
    </ul>



    <!-- Logo -->
    <div class="Logo">
        <img src="../Icon_Photo/Logo.jpg" id="Logo">
    </div>



    <div class="info">
        <form method="post">
            <table>
                
            <tr>
                    <th>Date Facture :</th>
                    <td>
                        <input type="text" readonly class="inp" value="<?php if (isset($_SESSION["Articles"]) and count($_SESSION["Articles"])){ echo date("Y-m-d H:i:s");} ?>">
                    </td>
            </tr>
                
            <tr>
                    <th>Nombre d'Article :</th>
                    <td>
                        <input type="text" readonly class="inp"  value="<?php if (isset($_SESSION["Articles"]) and count($_SESSION["Articles"])){ echo count($_SESSION["Articles"]);} ?>">
                    </td>
                    <th>Prix Total :</th>
                    <td>
                        <input type="text" readonly class="inp" value="<?php if (isset($_SESSION["Articles"]) and count($_SESSION["Articles"])){ echo $_SESSION["Total"]." DH";} ?>">
                    </td>
                </tr>
                <tr>
                    <th>Nom et Prénom :</th>
                    <td>
                        <input type="text" name="tNom" class="inp">
                    </td>
                    <th>Adresse :</th>
                    <td>
                        <input type="text" name="tAdresse" class="inp">
                    </td>
                </tr>
                <tr>
                    <th>Téléphone :</th>
                    <td>
                        <input type="text" name="tTele" class="inp">
                    </td>
                    <th>Email :</th>
                    <td>
                        <input type="text" name="tEmail" class="inp">
                    </td>
                </tr>
                <tr>
                    <th colspan="4" id="thbtn">
                        <input type="submit" value="Valider" name="btnValider" id="btnValider">
                    </th>
                </tr>
            </table>
        </form>
    </div>





    






    <!-- help -->
    <center>
        <div class="help">
            <ul id="help">
                <li class="Hli"> <img src="../Icon_Photo/Icon_Fb.png" class="icon"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span>Bilal Daoudi</span> </li>
                <li class="Hli"> <img src="../Icon_Photo/Icon_Instagram.jpeg" class="icon">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>Bilaldaoudi591</span> </li>
                <li class="Hli"> <img src="../Icon_Photo/Icon_Tele.png" class="icon">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span>+212707900867</span> </li>
                <li class="Hli"> <img src="../Icon_Photo/Icon_Email.png" class="icon">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span>Bilaldaoudi591@gmail.com</span> </li>
            </ul>
        </div>
    </center>
    <br><br>


</body>

</html>