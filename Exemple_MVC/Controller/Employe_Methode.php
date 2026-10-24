<?php

require("../Model/Employe.php");
$emp = new Employe("GestionProjets", "localhost", "root", "");
$emp->Matricule = 0;
$emp->Nom = "";
$emp->prenom = "";
$emp->DateNaissance = "";
$emp->Salaire = 0;

session_start();
if (empty($_POST)) {
    $_SESSION["employes"] = $emp->GetAll();
    $_SESSION["Nbaffiche"] = 0;
}

// -------------------------- Afficher ----------------------------------------------------------------------------
function Afficher($r)
{
    global $emp;
    $emp->Matricule = $r[0];
    $emp->Nom = $r[1];
    $emp->prenom = $r[2];
    $emp->DateNaissance = $r[3];
    $emp->Salaire = $r[4];
}



// -------------------------- Vider ----------------------------------------------------------------------------
if (isset($_POST["btnVider"])) {
    $emp->Matricule = 0;
    $emp->Nom = "";
    $emp->prenom = "";
    $emp->DateNaissance = "";
    $emp->Salaire = 0;
}

// -------------------------- Rechercher Employe ---------------------------------------------------------------
if (isset($_POST["btnRecherche"])) {
    $mat = $_POST["tMatricule"];
    $row = $emp->FindEmploye($mat);
    if ($row != null) {
        Afficher($row);
    }
}

// -------------------------- Ajouter Employe ---------------------------------------------------------------
if (isset($_POST["btnAjouter"])) {
    $emp->Matricule = $_POST["tMatricule"];
    $emp->Nom = $_POST["tNom"];
    $emp->prenom = $_POST["tPrenom"];
    $emp->DateNaissance = $_POST["tDateNaissance"];
    $emp->Salaire = $_POST["tSalaire"];

    $n = $emp->AddEmploye();
    if ($n) {
        echo "<script>alert('Employe Ajouté avec Succées')</script>";
    }
}


// -------------------------- Modifier Employe ---------------------------------------------------------------
if (isset($_POST["btnModifier"])) {
    $emp->Matricule = $_POST["tMatricule"];
    $emp->Nom = $_POST["tNom"];
    $emp->prenom = $_POST["tPrenom"];
    $emp->DateNaissance = $_POST["tDateNaissance"];
    $emp->Salaire = $_POST["tSalaire"];
    $n = $emp->UpdateEmploye();
    if ($n) {
        echo "<script>alert('Employe Modifié avec Succées')</script>";
    }
}


// -------------------------- Supprimer Employe ---------------------------------------------------------------
if (isset($_POST["btnSupprimer"])) {
    $mat = $_POST["tMatricule"];
    $n = $emp->DeleteEmploye($mat);
    if ($n) {
        echo "<script>alert('Employe Supprimé avec Succées')</script>";
    }
}

// ========================================== Premiere employe ==========================================
if (isset($_POST["btnPremier"])) {
    $r = $_SESSION["employes"][0];
    Afficher($r);
    $_SESSION["Nbaffiche"] = 0;
}

// ========================================== Precedent employe =========================================
if (isset($_POST["btnPrecedent"])) {
    $idice = $_SESSION["Nbaffiche"];
    if ($idice > 0) {
        $r = $_SESSION["employes"][$idice - 1];
        Afficher($r);
        $_SESSION["Nbaffiche"] = $idice - 1;
    } else {
        $r = $_SESSION["employes"][$idice];
        Afficher($r);
    }
}

// ========================================== Suivant employe ===========================================
if (isset($_POST["btnSuivant"])) {
    $idice = $_SESSION["Nbaffiche"];
    if ($idice < count($_SESSION["employes"]) - 1) {
        $r = $_SESSION["employes"][$idice + 1];
        Afficher($r);
        $_SESSION["Nbaffiche"] = $idice + 1;
    } else {
        $r = $_SESSION["employes"][$idice];
        Afficher($r);
    }
}

// ========================================== Dernier employe ===========================================
if (isset($_POST["btnDernier"])) {
    $fin = count($_SESSION["employes"]) - 1;
    $r = $_SESSION["employes"][$fin];
    Afficher($r);
    $_SESSION["Nbaffiche"] = $fin;
}

require("../View/InterfaceEmploye.php");
