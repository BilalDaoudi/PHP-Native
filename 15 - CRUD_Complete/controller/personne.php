<?php
require "../model/personne.php";


if (isset($_POST["add"])) {
} else if (isset($_POST["delete"])) {
} else if (isset($_POST["update"])) {
} else if (isset($_POST["all"])) {
    $personne = new Personne();
    $personnes = $personne->All();
    echo json_encode($personnes);
} else if (isset($_POST["idupdate"])) {
    $personne = new Personne();
    $personne->id = $_POST["idupdate"];
    $personne_update = $personne->personne_update();
    echo json_encode($personne_update);
}
