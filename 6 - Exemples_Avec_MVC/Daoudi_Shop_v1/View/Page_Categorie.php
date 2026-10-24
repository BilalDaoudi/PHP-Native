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
            background: linear-gradient(100deg,white, gray, white, gray);
            background-size: 400% 400%;
        } */

        .Articles {
            position: relative;
            top: 50px;
            margin: 20px;
            display: flex;
            flex-flow: row wrap;
            box-sizing: border-box;
            margin: 10px;

        }

        .Art p {
            color: black ;
            text-align: center;
            box-sizing: border-box;
            font-weight: 800;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            font-style: italic;
        }


        .Art {
            /* background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background: linear-gradient(100deg, gray, rgb(0, 0, 0), gray, rgb(0, 0, 0));
            background-size: 400% 400%; */
            text-decoration: none;
            width: 24%;
            box-sizing: border-box;
            margin: 5px;
            transition: 1s ease;
            border-radius: 30px;
            padding: 15px 100px;
            border: 3px solid #008AD7;
            box-shadow: 5px 5px #008AD7;

        }

        .Art img {
            width: 150px;
            height: 150px;
            box-shadow: 4px 4px 4px 4px  black;
            border-radius: 45%;
            /* border: 2px solid black; */
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
                background-color: #302923;
            } */

        a {
            text-decoration: none;
        }

        .qt {
            height: 30px;
            width: 80px;
            font-size: 20px;
            text-align: center;
            border-radius: 50px;
        }

        .btnAjouter {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-weight: 600;
            font-size: 20px;
            height: 30px;
            border-radius: 10px;
            background-color: gray;
        }
        #NBArt{
            background-color: aliceblue;
            border-radius: 60%;
            color: black;
        }
        #lqt{
            color: black ;
        }
        #lpr{
            color: red ;
            font-size: 25px;
        }
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
            <li>Panier  <span id="NbArt">&nbsp; <?php if (isset($_SESSION["Articles"]))
                            echo count($_SESSION["Articles"]);
                        else echo 0; ?>
                        &nbsp;</span></li>
        </a>
        <a href="#help">
            <li>Help</li>
        </a>
    </ul>
    <!-- Affiche Les Categories -->
    <form action="" method="post">
        <?php echo $divPrin; ?>
    </form>


    <br><br><br><br>

    <!-- help -->
    <center>
        <div class="help">
            <ul id="help">
                <li class="Hli"> <img src="../Icon_Photo/Icon_Fb.png" class="icon"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <span>Bilal Daoudi</span> </li>
                <li class="Hli"> <img src="../Icon_Photo/Icon_Instagram.jpeg" class="icon">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>Bilaldaoudi591</span>  </li>
                <li class="Hli"> <img src="../Icon_Photo/Icon_Tele.png" class="icon">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span>+212707900867</span>   </li>
                <li class="Hli">  <img src="../Icon_Photo/Icon_Email.png" class="icon">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span>Bilaldaoudi591@gmail.com</span>   </li>
            </ul>
        </div>
    </center>
    <br><br>



</body>

</html>