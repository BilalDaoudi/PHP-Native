<?php
require "ConnexionDB.php";
$slcSup = "";
$table = "<table border='1' width='100%' id='tb'>
<tr>
    <th>Code Filière</th>
    <th>Libelle</th>
    <th>Niveau</th>
    <th>Prix</th>
</tr>
";

// Fonction Affiche Les Specialité -------------------------------------------------------------------------------------------------------
function Affiche(){
    global $table;
    Connexion::Connecte();
    $T_Filieres = Connexion::$cnx->query("select * from Specialite")->fetchAll();
    Connexion::Deconnecte();
    foreach($T_Filieres as $Filiere){
        $table .= "<tr onclick='Information(this)'>";
        $table .= "<td> $Filiere[0] </td>";
        $table .= "<td> $Filiere[1] </td>";
        $table .= "<td> $Filiere[2] </td>";
        $table .= "<td> $Filiere[3] </td>";
        $table .= "</tr>";
        }
    $table .= "</table>";
}

if (empty($_POST)){
    Affiche();
    Remplir_CodeSupprimer();
}

// Remplir select de stagiaire à supprimer
function Remplir_CodeSupprimer(){
    global $slcSup;
    $slcSup = "<select name='CodeSupprimer' id='CodeSupprimer'><option value='choisir'> Choisir </option>";
    Connexion::Connecte();
    $T_Filieres = Connexion::$cnx->query("select * from Specialite")->fetchAll();
    Connexion::Deconnecte();
    foreach($T_Filieres as $code){
        $slcSup .= "<option value='$code[0]'> $code[0] </option>";  
    }
    $slcSup .= "</select>";
}

//Fonction Ajouter Specialité-------------------------------------------------------------------------------------------------
function Ajouter($Code,$Libelle,$Niveau,$Prix){
    try{
        Connexion::Connecte();
        $n = Connexion::$cnx->exec("insert into Specialite values('$Code','$Libelle','$Niveau',$Prix);");
        Connexion::Deconnecte();
        if($n == 1){
            echo "<script> alert('Specialite est ajouté avec succées' ) </script>";
        }
    }
    catch(Exception $er){
        echo "<script> alert('Il faut : Code Specialite Déjà Existe !!!!! ' ) </script>";
    } 
}

//Fonction Modifier Specialité ------------------------------------------------------------------------------------------------
function Modifier($Code,$Libelle,$Niveau,$Prix){
    Connexion::Connecte();
    $n = Connexion::$cnx->exec("update Specialite set Libelle = '$Libelle', Niveau = '$Niveau', Prix = $Prix where CodeSpecialite = '$Code' ;");
    Connexion::Deconnecte();
    if($n == 1){
        echo "<script> alert('Specialite est mofifié avec succées' ) </script>";
    }
    

}

// Fonction Trier-------------------------------------------------------------------------------------
function Trier($trierpar){
    global $table;
    Connexion::Connecte();
    if ($trierpar == "code"){
        $T_specialites = Connexion::$cnx->query("select * from specialite order by CodeSpecialite;")->fetchAll();
    }
    if ($trierpar == "libelle"){
        $T_specialites = Connexion::$cnx->query("select * from specialite order by Libelle;")->fetchAll();
    }
    if ($trierpar == "niveau"){
        $T_specialites = Connexion::$cnx->query("select * from specialite order by Niveau;")->fetchAll();
    }
    if ($trierpar == "prix"){
        $T_specialites = Connexion::$cnx->query("select * from specialite order by Prix;")->fetchAll();
    }
    
    Connexion::Deconnecte();
    foreach($T_specialites as $specialite){
        $table .= "<tr onclick='Information(this)'>";
        $table .= "<td> $specialite[0] </td>";
        $table .= "<td> $specialite[1] </td>";
        $table .= "<td> $specialite[2] </td>";
        $table .= "<td> $specialite[3] </td>";
        $table .= "</tr>";
        }
    $table .= "</table>";

}
// Fonction Rechercher--------------------------------------------------------------------------------------------
function Rechercher($rechpar,$valeur){
    global $table;
    Connexion::Connecte();
    if ($rechpar == "code"){
        $T_Specialites = Connexion::$cnx->query("select * from Specialite where CodeSpecialite = '$valeur';")->fetchAll();
    }
    if ($rechpar == "libelle"){
        $T_Specialites = Connexion::$cnx->query("select * from Specialite where libelle = '$valeur';")->fetchAll();
    }
    if ($rechpar == "niveau"){
        $T_Specialites = Connexion::$cnx->query("select * from Specialite where Niveau = '$valeur';")->fetchAll();
    }
    if ($rechpar == "prix"){
        $T_Specialites = Connexion::$cnx->query("select * from Specialite where Prix = '$valeur';")->fetchAll();
    }
    Connexion::Deconnecte();
    foreach($T_Specialites as $Specialite){
        $table .= "<tr onclick='Information(this)'>";
        $table .= "<td> $Specialite[0] </td>";
        $table .= "<td> $Specialite[1] </td>";
        $table .= "<td> $Specialite[2] </td>";
        $table .= "<td> $Specialite[3] </td>";
        $table .= "</tr>";
        }
    $table .= "</table>";

}
// Fonction Supprimer---------------------------------------------------------------------------------------------
function Supprimer($code){
    Connexion::Connecte();
    $n = Connexion::$cnx->exec("delete from Specialite where CodeSpecialite = '$code';");
    Connexion::Deconnecte();
    if($n == 1){
        echo "<script> alert('Stagiaire est Supprimé avec succées' ) </script>";
    };


}


// Trier Les Stagiaires ------------------------------------------------------------------------------------------
if (isset($_POST["btnTrier"])){
    $trierpar = $_POST["trierpar"];
    if ($trierpar != "choisir")
        Trier($trierpar);
    else{
        echo "<script> alert('Choisir Par quoi à trier' ) </script>";
        Affiche();
    }
    Remplir_CodeSupprimer();
}


// Pour Rechercher -------------------------------------------------------------------------------------------------------
if (isset($_POST["btnRechercher"])){
    $val = $_POST["trech"];
    $rechpar = $_POST["rechpar"];
    if ($rechpar != "choisir")
        Rechercher($rechpar,$val);
    else{
        echo "<script> alert('Choisir par quoi à rechercher' ) </script>";
        Affiche();
    } 
    Remplir_CodeSupprimer();
}


// Supprimer Specialite -------------------------------------------------------------------------------------------
if (isset($_POST["btnSupprimer"])){
    $Code = $_POST["CodeSupprimer"];
    if ($Code != "choisir")
        Supprimer($Code);
    else 
        echo "<script> alert('Choisir Numéro inscription à supprimer' ) </script>";
    Affiche();
    Remplir_CodeSupprimer();
    
} 

// Ajouter Stagiaire ---------------------------------------------------------------------------------------------
if (isset($_POST["btnAjouter"])){
    if (!empty($_POST["tCodeSp"]) and !empty($_POST["tLibelle"]) and !empty($_POST["tNiveau"]) and !empty($_POST["tPrix"])){
        $code = $_POST["tCodeSp"];
        $libelle = $_POST["tLibelle"];
        $niveau = $_POST["tNiveau"];
        $prix = $_POST["tPrix"];
        Ajouter($code,$libelle,$niveau,$prix);
    }
    else{
        echo "<script> alert('Tous Les Champs Obligatoire' ) </script>";
    }
    Affiche();
    Remplir_CodeSupprimer();
}

// Modifier Stagiaire --------------------------------------------------------------------------------------------
if (isset($_POST["btnModifier"])){
    if (!empty($_POST["tCodeSp"]) and !empty($_POST["tLibelle"]) and !empty($_POST["tNiveau"]) and !empty($_POST["tPrix"])){
        $code = $_POST["tCodeSp"];
        $libelle = $_POST["tLibelle"];
        $niveau = $_POST["tNiveau"];
        $prix = $_POST["tPrix"];
        Modifier($code,$libelle,$niveau,$prix);
    }
    else{
        echo "<script> alert('Tous Les Champs Obligatoire' ) </script>";
    }
    Affiche();
    Remplir_CodeSupprimer();
    
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style_Filiere.css">
    <script src="script_Filiere.js"></script>
    <title>Filière</title>
</head>
<body>
    <div class="Recherche">
        <form action="Filiere.php" method="post">
            <label for="rechpar"> Rechercher par :</label>
            <select name="rechpar" id="rechpar">
                <option value="choisir">Choisir</option>
                <option value="code">Code Filière</option>
                <option value="libelle">Libelle</option>
                <option value="niveau">Niveau</option>
                <option value="prix">Prix</option>
            </select>
            <input type="text" name="trech" id="trech">
            <input type="submit" value="Rechercher" name="btnRechercher">
        </form>
    </div>
    <div class="Trier">
        <form action="Filiere.php" method="post">
            <label for="trierpar"> Trier par :</label>  
            <select name="trierpar" id="trierpar">
                <option value="choisir">Choisir</option>
                <option value="code">Code Filière</option>
                <option value="libelle">Libelle</option>
                <option value="niveau">Niveau</option>
                <option value="prix">Prix</option>
            </select>
            <input type="submit" value="Trier" name="btnTrier">
        </form>
        
    </div>
    <br>
    <div class="Liste">
        <?php
            echo $table;
        ?>
    </div>

    <div class="Filiere">
        <form action="Filiere.php" method="post">
            <table>
                <tr>
                    <td>Code de Filiere :</td>
                    <td><input type="text" name="tCodeSp" id="tCodeSp"></td>
                </tr>
                <tr>
                    <td>Libelle :</td>
                    <td><input type="text" name="tLibelle" id="tLibelle"></td>
                </tr>
                <tr>
                    <td>Niveau :</td>
                    <td><input type="text" name="tNiveau" id="tNiveau"></td>
                </tr>
                <tr>
                    <td>Prix :</td>
                    <td><input type="text" name="tPrix" id="tPrix"></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Ajouter" name="btnAjouter"></td>
                    <td><input type="submit" value="Modifier" name="btnModifier"></td>
                </tr>
            </table>
            <br><br>

            Filière à Supprimer : <?php echo $slcSup; ?>

            <br><br>
            <input type="submit" value="Supprimer" name="btnSupprimer">
            

            
            
        </form>
    </div>
</body>
</html>