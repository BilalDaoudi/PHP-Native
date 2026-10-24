<html>

<head>
    <title>Les Categorie</title>
    <link rel="stylesheet" href="../CSS/bootstrap-5.2.0-dist/css/bootstrap.min.css">
    <script src="../CSS/bootstrap-5.2.0-dist/js/bootstrap.bundle.min.js"></script>
    <script src="../JS/script.js"></script>
    <style>
        * {
            margin: 0px;
        }
        .logo,
        .icon {
            margin-top: 10px;
            margin-bottom: 10px;
            border-radius: 55%;
        }
       

        th {
            color: gold;
            text-align: center;
        }

        td {
            text-align: center;
        }

        body {
            background-color: aqua;
            /* background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background: linear-gradient(10deg, gold, blue, orange, blue);
            background-size: 400% 400%; */
            /* background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background: linear-gradient(100deg, gray, #fff, gray, #fff);
            background-size: 400% 400%; */
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

        .card-img-bottom {
            width: 200px;
            height: 180px;

        }

        .bgImg {
            padding: 30px;
            margin-top: 20px;
            margin-bottom: 20px;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background: linear-gradient(10deg, #fff, blue, #fff, blue);
            background-size: 400% 400%;
            border-radius: 70%;
            box-shadow: 0px 0px 20px 15px gray;

        }

        .col-sm-2 {
            width: 21%;
            box-shadow: 0px 0px 5px 5px gray;
            border-radius: 10px;
            text-align: center;
            margin-top: 25px;
            margin-left: 40px;
        }

        #help {
            margin-top: 100px;
            list-style-type: none;
            display: flex;
        }

        .row {
            width: 98%;
            margin-left: 25px;
        }

        .PrQt {
            margin-bottom: 10px;
        }

        .qt {
            border: 1px solid white;
            font-weight: 900;
            width: 60px;
            border-radius: 10px;
            text-align: center;
        }


        .description {
            font-weight: 700;
        }

        .ArtPrix {
            color: red;
            font-weight: 900;
            font-size: 20px;
        }

        .btnAjouter {
            font-size: 20px;
            width: 40px;
            background-color: blue;
            font-weight: 900;
            border-radius: 10px;
        }

        .AddQt {
            padding-left: 70px;
        }

        @media only screen and (max-width : 600px) {
            .AddQt {
                padding-left: 150px;
            }
            .col-sm-2 {
                width: 85%;
            }
            .row {
                margin: 0px;
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
                        <li class="nav-item">Panier <span class="badge badge-light bg-light text-primary"> <?php if (isset($_SESSION["Articles"])) {
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
        <div class="logo">
            <img src="../Icon_Photo/Logo.jpg" alt="logo" id="logo" class="logo" width="250px">
        </div>
    </center>
    <!-- Affiche Les Categories -->
    <form action="" method="post">
        <?php echo $divPrin; ?>
    </form>
    <!-- help -->
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