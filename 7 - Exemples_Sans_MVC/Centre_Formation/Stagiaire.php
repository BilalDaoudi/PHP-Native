<?php
require "ConnexionDB.php";


$table = "<table border='1' width='100%'>
<tr>
    <th>Numéro Inscriprion</th>
    <th>CIN</th>
    <th>Nom</th>
    <th>Prénom</th>
    <th>Sexe</th>
    <th>Date de Naissance</th>
    <th>Adresse</th>
    <th>Filière</th>
</tr>";
$slcSup = "";
$slcfil = "";

//Fonction Rechercher ----------------------------------------------------------------------------------------------7
function Rechercher($rechpar,$valeur){
    global $table;
    Connexion::Connecte();
    if ($rechpar == "nom"){
        $T_Stagiaires = Connexion::$cnx->query("select * from Stagiaire where Nom = '$valeur';")->fetchAll();
    }
    if ($rechpar == "prenom"){
        $T_Stagiaires = Connexion::$cnx->query("select * from Stagiaire where prenom = '$valeur';")->fetchAll();
    }
    if ($rechpar == "cin"){
        $T_Stagiaires = Connexion::$cnx->query("select * from Stagiaire where CIN = '$valeur';")->fetchAll();
    }
    if ($rechpar == "sexe"){
        $T_Stagiaires = Connexion::$cnx->query("select * from Stagiaire where Sexe = '$valeur';")->fetchAll();
    }
    if ($rechpar == "filiere"){
        $T_Stagiaires = Connexion::$cnx->query("select * from Stagiaire where CodeSp = '$valeur';")->fetchAll();
    }
    if ($rechpar == "NI"){
        $T_Stagiaires = Connexion::$cnx->query("select * from Stagiaire where NumInscription = $valeur")->fetchAll();
    }
    Connexion::Deconnecte();
    foreach($T_Stagiaires as $Stagiaire){
        $table .= "<tr onclick='Information(this)'>";
        $table .= "<td> $Stagiaire[0] </td>";
        $table .= "<td> $Stagiaire[1] </td>";
        $table .= "<td> $Stagiaire[2] </td>";
        $table .= "<td> $Stagiaire[3] </td>";
        $table .= "<td> $Stagiaire[4] </td>";
        $table .= "<td> $Stagiaire[5] </td>";
        $table .= "<td> $Stagiaire[6] </td>";
        $table .= "<td> $Stagiaire[7] </td>";
        $table .= "</tr>";
        }
    $table .= "</table>";

}
function Trier($trierpar){
    global $table;
    Connexion::Connecte();
    if ($trierpar == "nom"){
        $T_Stagiaires = Connexion::$cnx->query("select * from Stagiaire order by Nom;")->fetchAll();
    }
    if ($trierpar == "prenom"){
        $T_Stagiaires = Connexion::$cnx->query("select * from Stagiaire order by prenom;")->fetchAll();
    }
    if ($trierpar == "cin"){
        $T_Stagiaires = Connexion::$cnx->query("select * from Stagiaire order by CIN;")->fetchAll();
    }
    if ($trierpar == "sexe"){
        $T_Stagiaires = Connexion::$cnx->query("select * from Stagiaire order by Sexe;")->fetchAll();
    }
    if ($trierpar == "dn"){
        $T_Stagiaires = Connexion::$cnx->query("select * from Stagiaire order by DateNaissance;")->fetchAll();
    }
    if ($trierpar == "adresse"){
        $T_Stagiaires = Connexion::$cnx->query("select * from Stagiaire order by Adresse;")->fetchAll();
    }
    if ($trierpar == "filiere"){
        $T_Stagiaires = Connexion::$cnx->query("select * from Stagiaire order by CodeSp;")->fetchAll();
    }
    if ($trierpar == "NI"){
        $T_Stagiaires = Connexion::$cnx->query("select * from Stagiaire order by NumInscription")->fetchAll();
    }
    Connexion::Deconnecte();
    foreach($T_Stagiaires as $Stagiaire){
        $table .= "<tr onclick='Information(this)'>";
        $table .= "<td> $Stagiaire[0] </td>";
        $table .= "<td> $Stagiaire[1] </td>";
        $table .= "<td> $Stagiaire[2] </td>";
        $table .= "<td> $Stagiaire[3] </td>";
        $table .= "<td> $Stagiaire[4] </td>";
        $table .= "<td> $Stagiaire[5] </td>";
        $table .= "<td> $Stagiaire[6] </td>";
        $table .= "<td> $Stagiaire[7] </td>";
        $table .= "</tr>";
        }
    $table .= "</table>";

}
//Fonction Ajouter -------------------------------------------------------------------------------------------------
function Ajouter($ni,$cin,$nom,$pr,$sexe,$dn,$adr,$filiere){
    try{
        Connexion::Connecte();
        $n = Connexion::$cnx->exec("insert into Stagiaire values($ni,'$cin','$nom','$pr','$sexe','$dn','$adr','$filiere');");
        Connexion::Deconnecte();
        if($n == 1){
            echo "<script> alert('Stagiaire est ajouté avec succées' ) </script>";
        }
    }
    catch(Exception $er){
        echo "<script> alert('Il faut : Numéro Inscription n\'est pas déjà  CIN n\'pas répéter ' ) </script>";
    } 
}

//Fonction Modifier ------------------------------------------------------------------------------------------------
function Modifier($ni,$cin,$nom,$pr,$sexe,$dn,$adr,$filiere){
    Connexion::Connecte();
    $n = Connexion::$cnx->exec("update stagiaire set CIN = '$cin', Nom = '$nom', Prenom = '$pr',Sexe = '$sexe', DateNaissance = '$dn', Adresse = '$adr',CodeSp = '$filiere' where NumInscription = $ni ;");
    Connexion::Deconnecte();
    if($n == 1){
        echo "<script> alert('Stagiaire est mofifié avec succées' ) </script>";
    };

}
//Fonction Supprimer -----------------------------------------------------------------------------------------------
function Supprimer($ni){
    Connexion::Connecte();
    $n = Connexion::$cnx->exec("delete from stagiaire where NumInscription = $ni;");
    Connexion::Deconnecte();
    if($n == 1){
        echo "<script> alert('Stagiaire est Supprimé avec succées' ) </script>";
    };


}

function Affiche(){
    global $table;
    Connexion::Connecte();
    $T_Stagiaires = Connexion::$cnx->query("select * from Stagiaire")->fetchAll();
    Connexion::Deconnecte();
    foreach($T_Stagiaires as $Stagiaire){
        $table .= "<tr onclick='Information(this)'>";
        $table .= "<td> $Stagiaire[0] </td>";
        $table .= "<td> $Stagiaire[1] </td>";
        $table .= "<td> $Stagiaire[2] </td>";
        $table .= "<td> $Stagiaire[3] </td>";
        $table .= "<td> $Stagiaire[4] </td>";
        $table .= "<td> $Stagiaire[5] </td>";
        $table .= "<td> $Stagiaire[6] </td>";
        $table .= "<td> $Stagiaire[7] </td>";
        $table .= "</tr>";
        }
    $table .= "</table>";
}
// Affiche Tout Les Stagiaires  -------------------------------------------------------------------------------------

if (empty($_POST)){
    Affiche();
    Remplir_NiSupprimer();
    Remplir_CodeSp();
    
}

// Remplir select de stagiaire à supprimer
function Remplir_NiSupprimer(){
    global $slcSup;
    $slcSup = "<select name='tNIsupprimer' id='tNIsupprimer' onchange='Select_Supprimer()'><option value='choisir'> Choisir </option>";
    Connexion::Connecte();
    $T_NIStagiaires = Connexion::$cnx->query("select * from Stagiaire")->fetchAll();
    Connexion::Deconnecte();
    foreach($T_NIStagiaires as $NI){
        $slcSup .= "<option value='$NI[0]'> $NI[0] </option>";  
    }
    $slcSup .= "</select>";
}

// Remplir select de stagiaire à supprimer

function Remplir_CodeSp(){
    global $slcfil;
    $slcfil = "<select name='tCodeSp' id='tCodeSp'><option value='choisir'> Choisir </option>";
    Connexion::Connecte();
    $T_Specialites = Connexion::$cnx->query("select * from Specialite")->fetchAll();
    Connexion::Deconnecte();
    foreach($T_Specialites as $CodeSp){
        $slcfil .= "<option value='$CodeSp[0]'> $CodeSp[0] </option>";  
        }
    $slcfil .= "</select>";

}





// Ajouter Stagiaire ---------------------------------------------------------------------------------------------
if (isset($_POST["btnAjouter"])){
    if (!empty($_POST["tNI"]) and !empty($_POST["tNom"]) and !empty($_POST["tPrenom"]) and !empty($_POST["tCIN"]) and !empty($_POST["tSexe"]) and !empty($_POST["tDateNaissance"]) and !empty($_POST["tAdresse"]) and $_POST["tCodeSp"] != "choisir"){
        $ni = $_POST["tNI"];
        $nom = $_POST["tNom"];
        $pr = $_POST["tPrenom"];
        $cin = $_POST["tCIN"];
        $sexe = $_POST["tSexe"];
        $dn = $_POST["tDateNaissance"];
        $adr = $_POST["tAdresse"];
        $fil = $_POST["tCodeSp"];

        Ajouter($ni,$cin,$nom,$pr,$sexe,$dn,$adr,$fil);
    }
    else{
        echo "<script> alert('Tous Les Champs Obligatoire' ) </script>";
    }
    Affiche();
    Remplir_NiSupprimer();
    Remplir_CodeSp();
}

// Modifier Stagiaire --------------------------------------------------------------------------------------------
if (isset($_POST["btnModifier"])){
    if (!empty($_POST["tNI"]) and !empty($_POST["tNom"]) and !empty($_POST["tPrenom"]) and !empty($_POST["tCIN"]) and !empty($_POST["tSexe"]) and !empty($_POST["tDateNaissance"]) and !empty($_POST["tAdresse"]) and $_POST["tCodeSp"] != "choisir"){
        $ni = $_POST["tNI"];
        $nom = $_POST["tNom"];
        $pr = $_POST["tPrenom"];
        $cin = $_POST["tCIN"];
        $sexe = $_POST["tSexe"];
        $dn = $_POST["tDateNaissance"];
        $adr = $_POST["tAdresse"];
        $fil = $_POST["tCodeSp"];

        Modifier($ni,$cin,$nom,$pr,$sexe,$dn,$adr,$fil);
    }
    else{
        echo "<script> alert('Tous Les Champs Obligatoire' ) </script>";
    }
    Affiche();
    Remplir_NiSupprimer();
    Remplir_CodeSp();
    
}

// Supprimer Stagiaire -------------------------------------------------------------------------------------------
if (isset($_POST["btnSupprimer"])){
    $Ni = $_POST["tNIsupprimer"];
    if ($Ni != "choisir")
        Supprimer($Ni);
    else 
        echo "<script> alert('Choisir Numéro inscription à supprimer' ) </script>";
    Affiche();
    Remplir_NiSupprimer();
    Remplir_CodeSp();
} 

// Rechercher Stagiaire ------------------------------------------------------------------------------------------
if (isset($_POST["btnRecherche"])){
    $val = $_POST["tRechpar"];
    $rechpar = $_POST["Rechpar"];
    if ($rechpar != "choisir")
        Rechercher($rechpar,$val);
    else{
        echo "<script> alert('Choisir par quoi à rechercher' ) </script>";
        Affiche();
    } 
    Remplir_NiSupprimer();
    Remplir_CodeSp();
}

// Trier Les Stagiaires ------------------------------------------------------------------------------------------
if (isset($_POST["btnTrier"])){
    $trierpar = $_POST["Trierpar"];
    if ($trierpar != "choisir")
        Trier($trierpar);
    else{
        echo "<script> alert('Choisir Par quoi à trier' ) </script>";
        Affiche();
    }
    Remplir_NiSupprimer();
    Remplir_CodeSp();
}


?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_stg.css">
    <script src="Script_Stagiaire.js"></script>
    
    <title>Stagiaire</title>
</head>
<body>

    <div class="Recherche">
        <form action="Stagiaire.php" method="post">
            <label>Recherche par :</label>
            <select name="Rechpar" id="Rechpar" onchange="Select_Recherche()">
                <option value="choisir">Choisir</option>
                <option value="nom">Nom</option>
                <option value="prenom">Prénom</option>
                <option value="cin">CIN</option>
                <option value="sexe">Sexe</option>
                <option value="filiere">Filière</option>
                <option value="NI">Numéro Inscription</option>
            </select>
            <input type="text" name="tRechpar" id="tRechpar" disabled>
            <input type="submit" value="Rechercher" name="btnRecherche" disabled id="btnRecherche">
        </form>
    </div>
    
    <div class="Trier">
        <form action="Stagiaire.php" method="post">
            <label>Trier par :</label>
            <select name="Trierpar" id="Trierpar" onchange="Select_Trier()">
                <option value="choisir">Choisir</option>
                <option value="nom">Nom</option>
                <option value="prenom">Prénom</option>
                <option value="cin">CIN</option>
                <option value="sexe">Sexe</option>
                <option value="dn">Date de Naissance</option>
                <option value="adresse">Adresse</option>
                <option value="filiere">Filière</option>
                <option value="NI">Numéro Inscription</option>
            </select>
            <input type="submit" value="Trier" name="btnTrier" disabled id="btnTrier">
        </form>
    </div>



    <div class="Liste">
        <?php
            echo $table;
        ?>
    </div>

    <div class="Information">
        <form action="Stagiaire.php" method="post">
            <pre>
    Nom :                <input type="text" name="tNom" id="tNom"><br>
    Prénom :             <input type="text" name="tPrenom" id="tPrenom"><br>
    CIN :                <input type="text" name="tCIN" id="tCIN"><br>
    Sexe :                Homme <input type="radio" name="tSexe" id="homme" value="M">    Femme <input type="radio" name="tSexe" id="femme" value="F"><br>
    Date de Naissance :  <input type="date" name="tDateNaissance" id="tDateNaissance"><br>
    Adresse :            <input type="text" name="tAdresse" id="tAdresse"><br>
    Filière :            <?php echo $slcfil; ?> <br>
    Numéro Inscription : <input type="number" name="tNI" id="tNI"><br><br>
                    <input type="submit" value="Ajouter" name="btnAjouter"><br><br>
                    <input type="submit" value="Modifier" name="btnModifier"> <br><br>

     Stagiaire à Supprimer :  <?php echo $slcSup; ?>  <br><br>
                    <input type="submit" value="Supprimer" name="btnSupprimer" disabled id="btnSupprimer">

            <b style="color: red;">Tout Les Champs obligatoire</b>
            
            </pre>
        </form>
    



    
</body>
</html>