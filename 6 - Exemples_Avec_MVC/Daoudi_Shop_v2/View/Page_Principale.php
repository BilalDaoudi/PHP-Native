<html>

<head>
    <!-- <title></title>
    <link rel="stylesheet" href="../CSS/bootstrap/bootstrap.min.css">
    <script src="../CSS/bootstrap-5.2.0-dist/js/bootstrap.bundle.min.js"></script> -->
    <link rel="stylesheet" href="../CSS/bootstrap-5.2.0-dist/css/bootstrap.min.css">
    <script src="../CSS/bootstrap-5.2.0-dist/js/bootstrap.bundle.min.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
       

        .logo,.icon{
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

        body,
        table {
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
            padding: 10px 25px;
        }

        a {
            text-decoration: none;
        }

        a:hover {
            text-decoration: none;
        }
        .card-img-bottom{
            width: 150px;
        }

        .col-sm-4{
            text-align: center;
            margin-top: 25px;
            border-radius: 30px;
        }
        .col-sm-4 img{
            width: 100%;
            height: 300px; 
            border-radius: 20px;
        }
        
        #help{
            margin-top: 100px;
            list-style-type: none;
            display: flex;
        }
        .row{
            padding-left: 30px;
            width: 99%;
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
        <div class="logo">
            <img src="../Icon_Photo/Logo.jpg" alt="Logo" id="logo" class="logo" width="250px">
        </div>
    </center>

    <?php echo $divPrin; ?>






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