<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style_user.css">
    <script src="../js/Articles.js"></script>
    <title>User</title>
</head>

<body>
    <div class="Info">
        <form method="post">
            <b> Id &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </b>
            <input type="text" readonly value="<?php echo $User[0]; ?>" class="inp">
            <br>

            <b>Nom &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </b>
            <input type="text" readonly value="<?php echo $User[1]; ?>" class="inp">
            <br>

            <b>Prénom &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </b>
            <input type="text" readonly value="<?php echo $User[2]; ?>" class="inp">
            <br>

            <b>Date de Naissance : </b>
            <input type="text" readonly value="<?php echo $User[3]; ?>" class="inp">
            <br>

            <b>Ville &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </b>
            <input type="text" readonly value="<?php echo $User[5]; ?>" class="inp">
            <br>

            <b>Adresse &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </b>
            <input type="text" readonly value="<?php echo $User[6]; ?>" class="inp">
            <br>

            <b>Code Postale &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </b>
            <input type="text" readonly value="<?php echo $User[7]; ?>" class="inp">
            <br>

            <b>Téléfone &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </b>
            <input type="text" readonly value="<?php echo $User[8]; ?>" class="inp">
            <br>

            <b> Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </b>
            <input type="text" readonly value="<?php echo $User[9]; ?>" class="inp">
            <br>

            <a href="#panier"> <input type="button" value="Panier" id="btn0"> </a><br>

            <input type="submit" value="Déconnexion" name="btnDeconnexion" id="btn1"> <br>
            <input type="submit" value="Modifier Les Information" name="btnupdate" id="btn2"> <br>


            </table>
        </form>
    </div>


    <div class="news" id="news">
        <div class="n1">
            <a href="../foto/img1.jpg"> <img src="../foto/img1.jpg"></a>
            <P> ID:&nbsp;&nbsp;&nbsp;&nbsp;1263 &nbsp;&nbsp;&nbsp;&nbsp;==>&nbsp;&nbsp;&nbsp;&nbsp; 50 DH </p>
        </div>
        <div class="n1">
            <a href="../foto/img2.jpg"> <img src="../foto/img2.jpg"></a>
            <P> ID:&nbsp;&nbsp;&nbsp;&nbsp;1264 &nbsp;&nbsp;&nbsp;&nbsp;==>&nbsp;&nbsp;&nbsp;&nbsp; 40 DH </p>
        </div>
        <div class="n1">
            <a href="../foto/img3.jpg"> <img src="../foto/img3.jpg"></a>
            <P> ID:&nbsp;&nbsp;&nbsp;&nbsp;1265 &nbsp;&nbsp;&nbsp;&nbsp;==>&nbsp;&nbsp;&nbsp;&nbsp; 40 DH </p>
        </div>
        <div class="n1">
            <a href="../foto/img4.jpg"> <img src="../foto/img4.jpg"></a>
            <P> ID:&nbsp;&nbsp;&nbsp;&nbsp;1266 &nbsp;&nbsp;&nbsp;&nbsp;==>&nbsp;&nbsp;&nbsp;&nbsp; 30 DH </p>
        </div>
        <div class="n1">
            <a href="../foto/img5.jpg"> <img src="../foto/img5.jpg"></a>
            <P> ID:&nbsp;&nbsp;&nbsp;&nbsp;1267 &nbsp;&nbsp;&nbsp;&nbsp;==>&nbsp;&nbsp;&nbsp;&nbsp; 30 DH </p>
        </div>
        <div class="n1">
            <a href="../foto/img6.jpg"> <img src="../foto/img6.jpg"></a>
            <P> ID:&nbsp;&nbsp;&nbsp;&nbsp;1268 &nbsp;&nbsp;&nbsp;&nbsp;==>&nbsp;&nbsp;&nbsp;&nbsp; 30 DH </p>
        </div>
        <div class="n1">
            <a href="../foto/img7.jpg"> <img src="../foto/img7.jpg"></a>
            <P> ID:&nbsp;&nbsp;&nbsp;&nbsp;1269 &nbsp;&nbsp;&nbsp;&nbsp;==>&nbsp;&nbsp;&nbsp;&nbsp; 20 DH </p>
        </div>
        <div class="n1">
            <a href="../foto/img8.jpg"> <img src="../foto/img8.jpg"></a>
            <P> ID:&nbsp;&nbsp;&nbsp;&nbsp;1270 &nbsp;&nbsp;&nbsp;&nbsp;==>&nbsp;&nbsp;&nbsp;&nbsp; 20 DH </p>
        </div>
        <div class="n1">
            <a href="../foto/img9.jpg"> <img src="../foto/img9.jpg"></a>
            <P> ID:&nbsp;&nbsp;&nbsp;&nbsp;1271 &nbsp;&nbsp;&nbsp;&nbsp;==>&nbsp;&nbsp;&nbsp;&nbsp; 20 DH </p>
        </div>
        <div class="n1">
            <a href="../foto/img10.jpg"> <img src="../foto/img10.jpg"></a>
            <P> ID:&nbsp;&nbsp;&nbsp;&nbsp;1272 &nbsp;&nbsp;&nbsp;&nbsp;==>&nbsp;&nbsp;&nbsp;&nbsp; 20 DH </p>
        </div>
        <div class="n1">
            <a href="../foto/img11.jpg"> <img src="../foto/img11.jpg"></a>
            <P> ID:&nbsp;&nbsp;&nbsp;&nbsp;1273 &nbsp;&nbsp;&nbsp;&nbsp;==>&nbsp;&nbsp;&nbsp;&nbsp; 30 DH </p>
        </div>
        <div class="n1">
            <a href="../foto/img12.jpg"> <img src="../foto/img12.jpg"></a>
            <P> ID:&nbsp;&nbsp;&nbsp;&nbsp;1274 &nbsp;&nbsp;&nbsp;&nbsp;==>&nbsp;&nbsp;&nbsp;&nbsp; 30 DH </p>
        </div>
        <div class="n1">
            <a href="../foto/img13.jpg"> <img src="../foto/img13.jpg"></a>
            <P> ID:&nbsp;&nbsp;&nbsp;&nbsp;1275 &nbsp;&nbsp;&nbsp;&nbsp;==>&nbsp;&nbsp;&nbsp;&nbsp; 30 DH </p>
        </div>
        <div class="n1">
            <a href="../foto/img14.jpeg"> <img src="../foto/img14.jpeg"></a>
            <P> ID:&nbsp;&nbsp;&nbsp;&nbsp;1276 &nbsp;&nbsp;&nbsp;&nbsp;==>&nbsp;&nbsp;&nbsp;&nbsp; 30 DH </p>
        </div>
        <div class="n1">
            <a href="../foto/img15.jpg"> <img src="../foto/img15.jpg"></a>
            <P> ID:&nbsp;&nbsp;&nbsp;&nbsp;1277 &nbsp;&nbsp;&nbsp;&nbsp;==>&nbsp;&nbsp;&nbsp;&nbsp; 30 DH </p>
        </div>
        <div class="n1">
            <a href="../foto/img16.jpeg"> <img src="../foto/img16.jpeg"></a>
            <P> ID:&nbsp;&nbsp;&nbsp;&nbsp;1278 &nbsp;&nbsp;&nbsp;&nbsp;==>&nbsp;&nbsp;&nbsp;&nbsp; 30 DH </p>
        </div>

        <div class="n1">
            <a href="../foto/img17.jpg"> <img src="../foto/img17.jpg"></a>
            <P> ID:&nbsp;&nbsp;&nbsp;&nbsp;1279 &nbsp;&nbsp;&nbsp;&nbsp;==>&nbsp;&nbsp;&nbsp;&nbsp; 20 DH </p>
        </div>

        <div class="n1">
            <a href="../foto/img18.jpeg"> <img src="../foto/img18.jpeg"></a>
            <P> ID:&nbsp;&nbsp;&nbsp;&nbsp;1280 &nbsp;&nbsp;&nbsp;&nbsp;==>&nbsp;&nbsp;&nbsp;&nbsp; 20 DH </p>
        </div>
        <div class="n1">
            <a href="../foto/img19.jpg"> <img src="../foto/img19.jpg"></a>
            <P> ID:&nbsp;&nbsp;&nbsp;&nbsp;1281 &nbsp;&nbsp;&nbsp;&nbsp;==>&nbsp;&nbsp;&nbsp;&nbsp; 20 DH </p>
        </div>

        <div class="n1">
            <a href="../foto/img20.jpeg"> <img src="../foto/img20.jpeg"></a>
            <P> ID:&nbsp;&nbsp;&nbsp;&nbsp;1282 &nbsp;&nbsp;&nbsp;&nbsp;==>&nbsp;&nbsp;&nbsp;&nbsp; 20 DH </p>
        </div>
        <div class="n1">
            <a href="../foto/img21.jpeg"> <img src="../foto/img21.jpeg"></a>
            <P> ID:&nbsp;&nbsp;&nbsp;&nbsp;1283 &nbsp;&nbsp;&nbsp;&nbsp;==>&nbsp;&nbsp;&nbsp;&nbsp; 20 DH </p>
        </div>
        <div class="n1">
            <a href="../foto/img22.jpeg"> <img src="../foto/img22.jpeg"></a>
            <P> ID:&nbsp;&nbsp;&nbsp;&nbsp;1284 &nbsp;&nbsp;&nbsp;&nbsp;==>&nbsp;&nbsp;&nbsp;&nbsp; 20 DH </p>
        </div>
        <div class="n1">
            <a href="../foto/img23.jpeg"> <img src="../foto/img23.jpeg"></a>
            <P> ID:&nbsp;&nbsp;&nbsp;&nbsp;1285 &nbsp;&nbsp;&nbsp;&nbsp;==>&nbsp;&nbsp;&nbsp;&nbsp; 20 DH </p>
        </div>
        <div class="n1">
            <a href="../foto/img24.jpeg"> <img src="../foto/img24.jpeg"></a>
            <P> ID:&nbsp;&nbsp;&nbsp;&nbsp;1286 &nbsp;&nbsp;&nbsp;&nbsp;==>&nbsp;&nbsp;&nbsp;&nbsp; 20 DH </p>
        </div>
        <div class="n1">
            <a href="../foto/img25.jpeg"> <img src="../foto/img25.jpeg"></a>
            <P> ID:&nbsp;&nbsp;&nbsp;&nbsp;1287 &nbsp;&nbsp;&nbsp;&nbsp;==>&nbsp;&nbsp;&nbsp;&nbsp; 20 DH </p>
        </div>
        <div class="n1">
            <a href="../foto/img26.jpeg"> <img src="../foto/img26.jpeg"></a>
            <P> ID:&nbsp;&nbsp;&nbsp;&nbsp;1288 &nbsp;&nbsp;&nbsp;&nbsp;==>&nbsp;&nbsp;&nbsp;&nbsp; 20 DH </p>
        </div>
        <div class="n1">
            <a href="../foto/img27.jpeg"> <img src="../foto/img27.jpeg"></a>
            <P> ID:&nbsp;&nbsp;&nbsp;&nbsp;1289 &nbsp;&nbsp;&nbsp;&nbsp;==>&nbsp;&nbsp;&nbsp;&nbsp; 20 DH </p>
        </div>
        <div class="n1">
            <a href="../foto/img28.jpeg"> <img src="../foto/img28.jpeg"></a>
            <P> ID:&nbsp;&nbsp;&nbsp;&nbsp;1290 &nbsp;&nbsp;&nbsp;&nbsp;==>&nbsp;&nbsp;&nbsp;&nbsp; 20 DH </p>
        </div>
    </div>


    <div class="panier" id="panier">
        <fieldset>
            <h2>Commander</h2>
            <br>
            <br>

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label for="console"><b> Article : </b></label>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label for="quantite"><b> Quantité : </b></label>
            <br>
            <br>
            <select id="console">
                <option>Choisir Id</option>
            </select>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            <input type="number" name="quantite" id="quantite" min="1" max="20">
            <br>
            <br>
            <input type="button" id="add" value="Ajouter au panier" onclick="Ajouter_Console()">

            <br>
            <br>

            <h2>Panier de commandes</h2>
            <br>
            <form action="../controller/command.php" method="POST">
            <table id="T_Console" width="100%">
                <tr>
                    <th>Id Article</th>
                    <th>QUANTITE</th>
                    <th>IMAGE</th>
                    <th>ACTION</th>
                </tr>
            </table>
            <br><br><br>
                <br>
                <input type="submit" value="Commander" id="btncommande" name="btncommande">
            </form>
        </fieldset>
    </div>

</body>

</html>