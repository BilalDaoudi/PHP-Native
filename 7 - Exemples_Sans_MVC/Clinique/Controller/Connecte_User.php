<?php
require "../Model/Medecin.php";


session_start();


if (isset($_POST["btnConnexion"]))
{
    if (!empty($_POST["tLogin"]) and !empty($_POST["tPassword"])){
        $med = new Medecin("Clinique");
        $med_con = $med->ConnectMedecin($_POST["tLogin"],$_POST["tPassword"]);
        
        if ($med_con != null){
            $_SESSION["medecin"] = $med_con;
            header("location:Page_Medecin.php");
        }
        $pat = new Patient("Clinique");
        $pat_con = $pat->ConnectPatient($_POST["tLogin"],$_POST["tPassword"]);
        if ($pat_con != null){
            $_SESSION["patient"] = $pat_con;
            header("location:Page_Patient.php");
        }

        if ($pat_con == null and $med_con == null){
            echo "<script>alert('Erreurs')</script>";
        }
    }
}







require "../View/Connecte.php";
