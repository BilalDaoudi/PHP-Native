<html>

<head>
    <title></title>
    <link rel="stylesheet" href="../CSS/bootstrap-5.2.0-dist/css/bootstrap.min.css">
    <script src="../CSS/bootstrap-5.2.0-dist/js/bootstrap.bundle.min.js"></script>
    <style>
        * {
            margin: 0px;
        }

        .logo {
            margin-left: 20px;
            width: 200px;
        }

        .logo,
        .icon {
            border-radius: 55%;
            margin-top: 10px;
            margin-bottom: 10px;
        }


        body {
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background: linear-gradient(100deg, gray, #fff, gray, #fff);
            background-size: 400% 400%;
        }

        a li:hover {
            background-color: #fff;
            color: #000;
        }

        a li {
            padding: 10px 20px;
        }

        a {
            text-decoration: none;
        }

        a:hover {
            text-decoration: none;
        }

        a ul {
            padding: 0px 100px;
        }

        #btnValider {
            width: 250px;
            height: 50px;
            font-size: 30px;
            font-weight: 500;
            border-radius: 20px;
            color: wheat;
            background-color: #000;
        }

        #btnValider:hover {
            color: #000;
            background-color: wheat;
        }

        #help {
            margin-top: 100px;
            list-style-type: none;
            display: flex;
        }

        .row {
            font-weight: 900;
            margin-top: 20px;
            width: 99%;
        }

        .info {
            color: blue;

            margin-top: 40px;
        }

        #tbl_Info tr {
            height: 100px;
        }

        #tbl_Info th {
            text-align: end;
        }

        #tbl_Info td input {
            width: 200px;
        }

        .col-6 {
            text-align: end;
            padding-right: 100px;
        }

        input {
            font-weight: 600;
            text-align: center;
            height: 30px;
            width: 70%;
            border: none;
            outline: none;
            border-radius: 60px;
            box-shadow: -1px 1px 30px -11px rgb(0, 0, 0, 0.75);
            -webkit-box-shadow: -1px 1px 30px -11px rgb(0, 0, 0, 0.75);
            -moz-box-shadow: -1px 1px 30px -11px rgb(0, 0, 0, 0.75);
        }

        input:hover {
            border: 2px solid black;
        }

        input:focus {
            border: 2px solid blue;
        }

        @media only screen and (max-width : 600px) {
            .row {
                display: block;
            }

            .row .col-6 {
                margin-top: 20px;
                width: 100%;
            }

            .row .col-6 input {
                width: 50%;
            }
        }
    </style>


</head>

<body>

    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-left" id="mynavbar">
                <ul class="navbar-nav me-auto">
                    <a href="../Controller/Page_Principale.php">
                        <li class="nav-item">Categorie</li>
                    </a>
                    <a href="../Controller/Page_Panier.php">
                        <li class="nav-item">Panier <span class="badge badge-light bg-light text-primary"><?php if (isset($_SESSION["Articles"])) {
                                                                                                                echo count($_SESSION["Articles"]);
                                                                                                            } else {
                                                                                                                echo 0;
                                                                                                            } ?></span></li>
                    </a>
                    <a href="#help">
                        <li class="nav-item">Aide</li>
                    </a>

                </ul>
            </div>
        </div>
    </nav>

    <!-- Logo -->
    <center>
        <div>
            <img src="../Icon_Photo/Logo.jpg" id="logo" class="logo">
        </div>

        <div class="info">
            <form method="post">
                <div class="row">
                    <div class="col-6">Date Facture :
                        <input type="text" readonly class="inp" value="<?php if (isset($_SESSION["Articles"]) and count($_SESSION["Articles"])) {
                                                                            echo date("Y-m-d H:i:s");
                                                                        } ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">Nombre d'Article:
                        <input type="text" readonly class="inp" value="<?php if (isset($_SESSION["Articles"]) and count($_SESSION["Articles"])) {
                                                                            echo count($_SESSION["Articles"]);
                                                                        } ?>">
                    </div>
                    <div class="col-6">Prix Total :
                        <input type="text" readonly class="inp" value="<?php if (isset($_SESSION["Articles"]) and count($_SESSION["Articles"])) {
                                                                            echo $_SESSION["Total"] . " DH";
                                                                        } ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">Nom et Prénom :
                        <input type="text" name="tNom" class="inp">
                    </div>
                    <div class="col-6">Adresse :
                        <input type="text" name="tAdresse" class="inp">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">Téléphone :
                        <input type="text" name="tTele" class="inp">
                    </div>
                    <div class="col-6">Email :
                        <input type="text" name="tEmail" class="inp">
                    </div>
                </div>
                <br><br>
                <div class="row">
                    <div class="col-12"><input type="submit" value="Valider" name="btnValider" id="btnValider"></div>
                </div>
                </table>
            </form>
        </div>
    </center>
    <footer>
        <ul class="row" id="help">
            <li class="col-sm-3"> <img src="../Icon_Photo/Icon_Fb.png" class="icon" width="50px"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span>Bilal Daoudi</span> </li>
            <li class="col-sm-3"> <img src="../Icon_Photo/Icon_Instagram.jpeg" class="icon" width="50px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>Bilaldaoudi591</span> </li>
            <li class="col-sm-3"> <img src="../Icon_Photo/Icon_Tele.png" class="icon" width="50px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span>+212707900867</span> </li>
            <li class="col-sm-3"> <img src="../Icon_Photo/Icon_Email.png" class="icon" width="50px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span>Bilaldaoudi591@gmail.com</span> </li>
        </ul>
    </footer>
</body>

</html>