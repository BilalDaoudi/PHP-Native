<?php
$mat = "";
$nom = "";
$pr = "";
$dt = "";
$sal = "";

// Les Fonctions
function Load(){
    Connexion::Connecte();
    $T_Employes = Connexion::$cnx->query("select * from Employe")->fetchAll();
    Connexion::Deconnecte();
    $_SESSION["Employes"] = $T_Employes;
    Affiche(0);
    $_SESSION["Position"] = 0;

    
}
function Affiche($indice){
    $T_Employes = $_SESSION["Employes"];
    $Employe = $T_Employes[$indice];
    global $mat,$nom,$pr,$dt,$sal;
    $mat = $Employe[0];
    $nom = $Employe[1];
    $pr = $Employe[2];
    $dt = $Employe[3];
    $sal = $Employe[4];
}
function Vider(){
    global $mat,$nom,$pr,$dt,$sal;
    $mat = '';
    $nom = '';
    $pr = '';
    $dt = '';
    $sal = '';
}
function Recherche($matr){
    global $mat,$nom,$pr,$dt,$sal;
    $T_Employes = $_SESSION["Employes"];
    foreach($T_Employes as $Employe){
        if ($Employe[0] == $matr){
            $mat = $Employe[0];
            $nom = $Employe[1];
            $pr = $Employe[2];
            $dt = $Employe[3];
            $sal = $Employe[4];
            return true;
        }
    }
    return false;

}
function Ajouter($matr,$nom,$pr,$dt,$sal){
    $Existe = Recherche($matr);
    if (!$Existe){
        Connexion::Connecte();
        $n = Connexion::$cnx->exec("insert into Employe values($matr,'$nom','$pr','$dt',$sal)");
        if ($n == 1)
            echo "<script> alert('Employe est Ajouté ☻☻') </script>";
        Connexion::Deconnecte();
        $T_Employes = $_SESSION["Employes"];
        $Emp = $T_Employes[0];
        $Emp[0] = $matr;
        $Emp[1] = $nom;
        $Emp[2] = $pr;
        $Emp[3] = $dt;
        $Emp[4] = $sal;
        $_SESSION["Employes"][]=$Emp;
        Vider();
    }
    


}
function Modifier($matr,$nom,$pr,$dt,$sal){
    $Existe = Recherche($matr);
    if ($Existe){
        Connexion::Connecte();
        $n = Connexion::$cnx->exec("update employe set Nom = '$nom',Prenom = '$pr',DateNaissance = '$dt',Salaire = $sal where matricule = $matr");
        if ($n == 1)
            echo "<script> alert('Employe est Modifié ☻☻') </script>";
        Connexion::Deconnecte();
        Vider();
        for($i=0 ; $i<count($_SESSION["Employes"]) ;$i++){
            if ($_SESSION["Employes"][$i]["Matricule"] == $matr){
                $_SESSION["Employes"][$i][1] = $nom;
                $_SESSION["Employes"][$i][2] = $pr;
                $_SESSION["Employes"][$i][3] = $dt;
                $_SESSION["Employes"][$i][4] = $sal;
            }
        }

    }

}
function Supprimer($matr){
    $Existe = Recherche($matr);
    if ($Existe){
        Connexion::Connecte();
        $n = Connexion::$cnx->exec("delete from employe where Matricule = $matr");
        if ($n == 1)
            echo "<script> alert('Employe est Supprimé ☻☻') </script>";
        Connexion::Deconnecte();
        $T_Employes = $_SESSION["Employes"];
        for($i=0 ; $i<count($T_Employes) ;$i++){
            if ($T_Employes[$i]["Matricule"] == $matr){
                array_splice($_SESSION["Employes"],$i,1);
            }
        }
    }
    Vider();

}

// Programme Principale
require "ConnexionDB.php";
session_start();
if (empty($_POST)){
    Load();
}


if (isset($_POST["btnVider"])){
    Vider();
}

if (isset($_POST["btnAjouter"])){
    $mat = $_POST["tMatricule"];
    $nom = $_POST["tNom"];
    $prenom = $_POST["tPrenom"];
    $DN = $_POST["tDateNaissance"];
    $Sal = $_POST["tSalaire"];
    Ajouter($mat,$nom,$prenom,$DN,$Sal);
    
}

if (isset($_POST["btnModifier"])){
    $mat = $_POST["tMatricule"];
    $nom = $_POST["tNom"];
    $prenom = $_POST["tPrenom"];
    $DN = $_POST["tDateNaissance"];
    $Sal = $_POST["tSalaire"];
    Modifier($mat,$nom,$prenom,$DN,$Sal);
    
}

if (isset($_POST["btnRecherche"])){
    $m = $_POST["tMatricule"];
    $Existe = Recherche($m);
    if (!$Existe){
        echo "<script> alert('Employe n\'existe pas !!') </script>";
    }
}

if (isset($_POST["btnSupprimer"])){
    $m = $_POST["tMatricule"];
    Supprimer($m);   
}

if (isset($_POST["btnPremier"])){
    Affiche(0);
    $_SESSION["Position"] = 0;
}

if (isset($_POST["btnPrecedent"])){
    $pos = $_SESSION["Position"];
    if ($pos > 0 ){
        $pos--;
        $_SESSION["Position"] = $pos;
    }
    Affiche($pos);
}

if (isset($_POST["btnSuivant"])){
    $pos = $_SESSION["Position"];
    if ($pos < count($_SESSION["Employes"])-1 ){
        $pos++;
        $_SESSION["Position"] = $pos;
    }
    Affiche($pos);
    
}

if (isset($_POST["btnDernier"])){
    $pos = count($_SESSION["Employes"])-1;
    Affiche($pos);
    $_SESSION["Position"] = $pos;
}


?>

<html>
<head>
    <title>Employe</title>
    <style>
        center{
            position: relative;
            top: 150px;
        }
        table td{
            text-align: center;
            font-size: 30px;
            color: teal;
        }
        table th{
            color: blue;
            font-size: 30px;
        }
        input[type="text"]{
            text-align: center;
            color: green;
            font-size: 30px;
        }
        input[type="submit"]{
            color: gray;
            background-color: black;
            font-size: 25px;
            width: 180px;
        }
        input[type="submit"]:hover{
            color: black ;
            background-color: gray;
            font-size: 25px;
            width: 150px;
        }
    </style>
</head>
<body>
<center>
    <form action="Employe.php" method="post">
        <table border="1">
            <tr>
                <th>Champs</th>
                <th>Valeurs</th>
                <th>Opérations</th>
            </tr>
            <tr>
                <td>Matricule</td>
                <td><input type="text" name="tMatricule" id="tMatricule" value="<?php echo $mat; ?>"></td>
                <td><input type="submit" name="btnVider" value="Vider"></td>
            </tr>
            <tr>
                <td>Nom</td>
                <td><input type="text" name="tNom" id="tNom" value="<?php echo $nom; ?>"></td>
                <td><input type="submit" name="btnAjouter" value="Ajouter"></td>
            </tr>
            <tr>
                <td>Prénom</td>
                <td><input type="text" name="tPrenom" id="tPrenom" value="<?php echo $pr; ?>"></td>
                <td><input type="submit" name="btnModifier" value="Modifier"></td>
            </tr>
            <tr>
                <td>Date de Naissance</td>
                <td><input type="text" name="tDateNaissance" id="tDateNaissance" value="<?php echo $dt; ?>"></td>
                <td><input type="submit" name="btnRecherche" value="Recherche"></td>
            </tr>
            <tr>
                <td>Salaire</td>
                <td><input type="text" name="tSalaire" id="tSalaire" value="<?php echo $sal; ?>"></td>
                <td><input type="submit" name="btnSupprimer" value="Supprimer"></td>
            </tr>
            <tr>
                <td colspan="3">
                    <input type="submit" name="btnPremier" value="Premier">
                    <input type="submit" name="btnPrecedent" value="Précédent">
                    <input type="submit" name="btnSuivant" value="Suivant">
                    <input type="submit" name="btnDernier" value="Dernier">
                </td>
            </tr>
        </table>
    </form>
</center>
</body>
</html>