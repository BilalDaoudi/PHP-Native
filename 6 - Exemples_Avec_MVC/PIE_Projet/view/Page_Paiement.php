<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <header>
        <a class="logo">Royal Candles</a>
    </header>
    <form action="" class="main" method="post">

        <center>
            <div class="imgs">
                <img src="../foto/carte.png">
                <img src="../foto/carte1.png">
                <img src="../foto/carte2.jpg">
            </div>
            <table>
                <tr>
                    <td><label for="adresse" id="lbl">Adresse Levresion</label></td>
                    <td><input type="adresse" name="adresse" id="inp"></td>
                </tr>
                <tr>
                    <td><label for="NumCarte" id="lbl">Numéro Carte </label></td>
                    <td><input type="number" name="NumCarte" id="inp"></td>
                </tr>
                <tr>
                    <td><label id="lbl">Date</label></td>
                    <td>&nbsp;&nbsp;<input type="number" name="mm" id="dt" placeholder="mm">/<input type="number" name="yy" id="dt" placeholder="yy"></td>
                    <td></td>
                </tr>
                <tr>
                    <td><label for="password" id="lbl">Password </label></td>
                    <td><input type="password" name="password" id="inp"></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Acheter" name="btnAcheter" id="btn"></td>
                    <td><input type="submit" value="Retour" name="btnRetour" id="btn"></td>
                </tr>
            </table>
        </center>
    </form>
</body>

</html>


<style>
    * {
        font-family: sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        scroll-behavior: smooth;
        text-transform: uppercase;
    }

    form {
        padding: 10%;

    }

    header {
        background-color: #000000;
        width: 100%;
        position: fixed;
        z-index: 999;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 200px;
    }

    .logo {
        text-decoration: underline rgb(255, 0, 0);
        color: #ffffff;
        text-transform: uppercase;
        font-weight: 700;
        font-size: 1.8em;
    }



    #table2 {
        position: relative;
        top: -45px;
    }

    #btn {
        font-size: 1.1em;
        font-weight: 500;
        padding-left: 30px;
        background-color: #000000;
        color: white;
        border: #ff0000;
        transition: 0.7s ease;
        border-radius: 8px;
        width: 200px;
        margin: 4px;
        padding: 12px;
        position: relative;
        left: 170px;
        top: 57px;
    }

    #btn:hover {
        font-display: inherit;
        font-size: large;
        font-weight: 600;
        background-color: #ffffff;
        color: #ff0000;
    }

    #lbl {
        font-size: large;
        color: white;
        text-decoration: underline black;
        font-weight: 400;
        font-weight: 300;
    }

    #inp {
        font-size: large;
        width: 197px;
        font-weight: 300;
        position: relative;
        margin: 4%;
        padding: 02;
        transition: 0.7s ease;
    }

    #dt {
        color: blanchedalmond;
        font-size: large;
        width: 16%;
        font-weight: 300;
        position: relative;
        margin: 2%;
        padding: 02;
        transition: 0.7s ease;
    }

    .main {
        height: 100%;
        width: 100%;
        min-height: 100vh;
        display: flex;
        align-items: center;
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        z-index: 1;
        background: linear-gradient(100deg, rgb(255, 0, 0), rgb(0, 0, 0), rgb(255, 0, 0), rgb(0, 0, 0));
        background-size: 400% 400%;
        width: 100%;
        height: 100vh;
        animation: animate 15s ease infinite;
    }

    @keyframes animate {
        0% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }

        100% {
            background-position: 10% 50%;
        }
    }

    img {
        width: 70px;
        height: 40px;
    }

    input {
        background-color: red;
        border: none;
        border-bottom: 2px solid white;
    }





    /*
    #btnAcheter {
        color: antiquewhite;
        background-color: black;
        font-size: 17px;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        border-radius: 20px;
        width: 200px;
        height: 30px;
        margin-top: 20px;
    }

    #btnRetour {
        color: antiquewhite;
        background-color: black;
        font-size: 17px;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        border-radius: 20px;
        width: 200px;
        height: 30px;
        margin-top: 20px;
    }

    input {
        border: none;
        border-bottom: 1px solid black;
        font-size: 20px;
    }

    th {
        font-size: 20px;
        text-align: end;
    }

    td {
        text-align: center;
    }

    #mm {
        width: 50px;
    }

    #yy {
        width: 50px;
    }

    .tout {
        border-radius: 20px;
        padding: 30px;
        position: absolute;
        left: 450px;
        top: 150px;
    }

    img {
        width: 70px;
        height: 40px;
    }
    */
</style>