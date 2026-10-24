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
            background: linear-gradient(100deg,white, gray, white, gray);
            background-size: 400% 400%;
        } */

        .Categories {

            position: relative;
            top: 50px;
            margin: 20px;
            display: flex;
            flex-flow: row wrap;
            box-sizing: border-box;
            margin: 10px;
            padding: 5px;

        }

        .Cate p {
            color: black;
            text-align: center;
            box-sizing: border-box;
            font-weight: 800;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            font-style: italic;
            font-size: 30px;
        }
        .Cate {
            /* background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background: linear-gradient(100deg, gray, rgb(0, 0, 0), gray, rgb(0, 0, 0));
            background-size: 400% 400%; */
            text-decoration: none;
            width: 33%;
            box-sizing: border-box;
            transition: 1s ease;
            border-radius: 30px;
            text-align: center;
        }

        .Cate:hover {
            display: block;
            font-size: 17px;
            font-weight: 300;
            transform: scale(0, 6.0, 6, 0, 6.0, 7);
        }

        .Cate img {
            box-shadow: 4px 4px 4px 4px  black;
            width: 300px;
            height: 250px;
            border-radius: 40%;
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

        a {
            text-decoration: none;
        }
        #NBArt{
            background-color: aliceblue;
            border-radius: 60%;
            color: black;
        }
        .icon{
            width: 40px;
            border-radius: 50%;
        }
        .Hli span{
            position: relative;
            bottom: 8px; 
        }
        #Logo{ 
            position: relative;
            top: 50px;
            margin: 20px;
            width: 300px;
            border-radius: 50%;
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
    <center>
        <div class="Logo">
            <img src="../Icon_Photo/Logo.jpg" id="Logo">
        </div>
    </center>
    


    <!-- Affiche Les Categories -->

    <?php echo $divPrin; ?>
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