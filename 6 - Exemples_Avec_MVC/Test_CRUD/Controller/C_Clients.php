

<?php

require "../Model/M_Clients.php";

// session_start();

// if (isset($_POST["btndeconnexion"])) {
//     session_unset();
//     session_destroy();
// }

// if (!isset($_SESSION["Admin"]))
//     header("location:../Controller/Login");


$client = new ClientChienChat();

$messege = "";


if (isset($_POST["add"])) {
    $client->Nom = $_POST["nom"];
    $client->Prenom = $_POST["prenom"];
    $client->Telephone = $_POST["telephone"];
    $client->Adresse = $_POST["adresse"];
    $n = $client->Add();
    if ($n)
        $messege = "Ajoute avec succées";
    else
        $messege = "Nom Déja existe";
}
if (isset($_POST["update"])) {
    $client->Id = $_POST["id"];
    $client->Nom = $_POST["nom"];
    $client->Prenom = $_POST["prenom"];
    $client->Telephone = $_POST["telephone"];
    $client->Adresse = $_POST["adresse"];
    $n = $client->Update();
    if ($n)
        $messege = "Modifie avec succées";
    else
        $messege = "Nom Déja existe";
}


if (isset($_POST["delete"])) {
    $client->Id = $_POST["id"];
    $n = $client->Delete();
    if ($n)
        $messege = "Supprime avec succées";
    else
        $messege = "Nom n'existe pas";
}


if (isset($_GET['info'])) {
    $info = $_GET['info'];
    if ($info == "") {
        $Clinets = $client->GetAll();
    } else {
        $Clinets = $client->Find($info);
    }

    foreach ($Clinets as $cl) {
        echo "<tr>
                    <td>$cl[0]</td>
                    <td>$cl[1]</td>  
                    <td>$cl[2]</td>  
                    <td>$cl[3]</td> 
                    <td>$cl[4]</td> 
                    <td><a href='#editEmployeeModal' class='edit' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Edit'>&#xE254;</i></a>
                    <a href='#deleteEmployeeModal' class='delete' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Delete'>&#xE872;</i></a></td>           
            </tr>";
    }
} else {
    $Clients = $client->GetAll();
    require "../View/V_Clients.php";
}



$messege = "";

if (isset($_POST["addan"])) {
    $client->Id = $_POST["id"];
    $n = $client->AddAnimal($_POST["nom"],$_POST["espece"],$_POST["race"],$_POST["sexe"],$_POST["dateNaissance"],$_POST["numIdentification"],$_POST["sterilise"]);
    if ($n)
        $messege = "Ajoute avec succées";
    else
        $messege = "Nom Déja existe";
}




