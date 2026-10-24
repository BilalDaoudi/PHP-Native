<?php

require "Formateur.php";


$cnx = new PDO("mysql:host=localhost;dbname=ecole","root","");
$n = $cnx->query("select * from Formateur order by Matricule desc limit 1")->fetch();
//Formateur::$mat=1000+count($n);

Formateur::$mat = $n[0];


if (isset($_POST["btnAjouter"])) {
    $nom = $_POST["tNom"];
    $dtn = new DateTime($_POST["tDateNaissance"]);
    $dtam = new DateTime($_POST["tDateEmbauche"]);
    $sal = $_POST["tSalaire"];
    $hsup = $_POST["tHeureSup"];

    $form = new Formateur($hsup);
    $form->SetNom($nom);
    $form->SetDateNaissance($dtn);
    $form->SetDateAmbauche($dtam);
    $form->SetSalaire($sal);

    //if ($_FILES['tPhoto']['size'] <= 500000)
    //    move_uploaded_file($_FILES['tPhoto']['tmp_name'], "Photo/" . $_FILES['tPhoto']['name']);

    if (isset($_FILES['tPhoto'])){
        $type = $_FILES['tPhoto']["type"];
        $ext = "";
        if ($type == "image/jpeg"){
            $ext = ".jpeg";
        }
        if ($type == "image/png"){
            $ext = ".png";
        }
        if ($ext != ""){
            $ph = "Photo/".$form->GetMatricule().$ext;
            $form->SetPhoto($ph);

            // Date Base
            $cnx = new PDO("mysql:host=localhost;dbname=ecole","root","");
            $query = "insert into Formateur values(".
            $form->GetMatricule().",'".
            $form->GetNom()."','".
            $_POST["tDateNaissance"]."','".
            $_POST["tDateEmbauche"]."',".
            $form->GetSalaire().",".
            $hsup.",'".
            $form->GetPhoto()."'".
            ")";
            $n = $cnx->exec($query);
            if ($n == 1){
                move_uploaded_file($_FILES['tPhoto']['tmp_name'], $ph);
            }

        }
    }
    



    print_r($_POST);
    echo '<br>';
    print_r($_FILES);
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formateur</title>
</head>

<body>

    <form enctype="multipart/form-data" method="post">
        Nom : <input type="text" name="tNom" id="tNom"><br><br>
        Date de Naissance : <input type="text" name="tDateNaissance" id="tDateNaissance"><br><br>
        Date Embauche : <input type="text" name="tDateEmbauche" id="tDateEmbauche"><br><br>
        Salaire : <input type="text" name="tSalaire" id="tSalaire"><br><br>
        Heure Suprimmentaire : <input type="text" name="tHeureSup" id="tHeureSup"><br><br>
        Photo : <input type="file" name="tPhoto" id="tPhoto"><br><br>
        <input type="submit" value="Ajouter" name="btnAjouter">
    </form>

</body>

</html>