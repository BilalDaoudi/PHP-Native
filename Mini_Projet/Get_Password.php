<?php
include "connecte_a_data.php";
if(isset($_POST["valider"]))
{
        if(!empty($_POST["valider"]) && !empty($_POST["email"]) && ($_POST["question"])!="choisir" &&!empty($_POST["reponse"]))
        {
            $e =$_POST['email'];
            $u=$_POST['question'];
            $r = $_POST['reponse'];
            $req="select mote_pass from clients where email='$e' and question='$u' and reponse='$r'";
            $t=$pdo->query($req)->fetch();
            print($t[0]);



        }
}



?>








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> <center>
    <form action="Get_Password.php" method="post">

    <b> Votre email :</b><br>
    <input type="email" name="email" id="email" placeholder="xxxxxxxxxx@dev102.bk">
    <br><br>
    <b>Question : </b><br>
    <select name="question" id="question" >
    <option value="choisir">Choisir Question </option>
    <option value="Ta ville natale ?">Ta ville natale ?</option>
    <option value="Nom de ta Mére ?">Nom de ta Mére ?</option>
    <option value="Nom de ton Mére ?">Nom de ton Mére ?</option>
    </select>
    <br><br>
    <b> Votre Réponse :</b><br>
    <input type="text"  id="reponse" name="reponse" ><br><br>
    <input type="submit" value="valider" name="valider">
</form>
</center>
</body>
</html>