<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/inscription.css">
    <title>Inscription</title>
</head>

<body>
<center>
    <header>
    <a  class="logo">Royal Candles</a>
</header>
<form  method="post" class="main">
    <table>
        <tr>
            <td><label id="lbl">Nom</label></td>
            <td><input type="text" name="tNom" id="tNom" class="inp" ></td>
        </tr>
        <tr>
            <td><label id="lbl">Prénom</label></td>
            <td><input type="text" name="tPrenom" id="tPrenom" class="inp" ></td>
        </tr>
        <tr>
            <td><label id="lbl">Date De Naissance</label></td>
            <td><input type="date" name="tDateNaissance" id="tDateNaissance" class="inp"></td>
        </tr>
        <tr>
            <td><label id="lbl">Sexe</label></td>
            <td id="radio">&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="tSexe" value="M">&nbsp;Homme&nbsp;&nbsp;<input type="radio" name="tSexe" value="F">&nbsp;Femme </td>
        </tr>
        <tr>
            <td><label id="lbl">Ville</label></td>
            <td><input type="text" name="tVille" id="tVille" class="inp">
            </td>
        </tr>
        <tr>
            <td><label id="lbl">Code Postale</label></td>
            <td><input type="number" name="tCodepostale" id="tCodepostale" class="inp"><br>
            </td>
        </tr><td></td>
                <td><input type="submit" id="btn" value="Inscription" name="btnInscription"></td>
            </tr>
        </tr>
    </table>
    <table id="table2">
        <tr>
            <td><label id="lbl">Id</label></td>
            <td><input type="number" name="tId" id="tId" class="inp"><br>
            </td>
        </tr>
        <tr>
            <td><label id="lbl">Adresse</label></td>
            <td><input type="text" name="tAdresse" id="tAdresse" class="inp"><br>
            </td>
        </tr>
        <tr>
            <td><label id="lbl">Téléfone</label></td>
            <td><input type="tel" name="tTelefone" id="tTelefone" class="inp">                
            </td>
        </tr>
        <tr>
            <td><label id="lbl">Email</label></td>
            <td><input type="email" name="tEmail" id="tEmail" class="inp"><br>               
            </td>
        </tr>
        <tr>
            <td><label id="lbl">Mot de passe</label></td>
            <td><input type="password" name="tPassword" id="tPassword" class="inp">                
            </td>
        </tr>
        <tr>
            <td><label id="lbl">Confirme Mot de passe</label></td>
            <td><input type="password" name="tConfirme" id="tConfirme" class="inp"><br>                           
            </td>
        </tr>
</table>
</form>
</center>



</body>

</html>
