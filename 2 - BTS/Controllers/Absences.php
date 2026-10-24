<?php

require "../Models/Absences.php";
session_start();
if (!isset($_SESSION["User"]))
	header("location:Login.php");

$_SESSION['Page_Actual'] = 'Absences Etudiants';	

$absence = new Absence();

$seance = "";
$message = "";

$Etudiants = [];


$absence->Matricule = $_SESSION["User"][0];

if (isset($_POST["go"])) {
	$date = $_POST["dateabsence"];
	$seance = $_POST["seance"];
	$jour = $absence->GetDay($date);
	if (!empty($date) && $seance != "choisir") {
		if ($jour != "Dimanche") {
			$absence->Seance = $seance;
			$existe = $absence->ExisteSeanceByFormateur($jour);
			if ($existe) {
				$absence->Filiere = $existe[2];
				$Etudiants = $absence->GetEtudiantByFiliere();
				// print_r($Etudiants);
			} else
				$message = "N'est pas Seance dans Cette heures";
		} else
			$message = "C'est dimanche";
	} else
		$message = "Choisir la date et seance";
}
if (isset($_POST["valider"])) {

	$date = $_POST["date"];
	$seance = $_POST["seance"];
	$T_Absences = [];
	foreach ($_POST as $val) {
		$T_Absences[] = $val;
	}
	$absence->DateAbsence = $T_Absences[0];
	$absence->Seance = $T_Absences[1];
	$absence->Matiere = $T_Absences[3];
	$absence->Filiere = $T_Absences[2];
	for ($i = 5; $i < count($T_Absences); $i++) {
		$absence->NumInscription = $T_Absences[$i];
		$absence->AddAbsence();
	}
	$jour = $absence->GetDay($T_Absences[0]);
	$existe = $absence->ExisteSeanceByFormateur($jour);
	$Etudiants = $absence->GetEtudiantByFiliere();
}
if (isset($_POST["delete"])) {
	$absence->NumInscription = $_POST["ni"];
	$absence->DateAbsence = $_POST["date"];
	$absence->Seance = $_POST["seance"];
	$absence->DeleteAbsence();
	$jour = $absence->GetDay($_POST["date"]);
	$existe = $absence->ExisteSeanceByFormateur($jour);
	$absence->Filiere = $existe[2];
	$Etudiants = $absence->GetEtudiantByFiliere();
	// print_r($existe);
	foreach ($Etudiants as $etudiant) {
		echo "<tr>
			<td>$etudiant[0]</td>
			<td>$etudiant[1]</td>
			<td>$etudiant[1]</td>";
			if ($absence->ExisteAbsenceStagiaire($etudiant[0])) {
				echo "<td>".count($absence->ExisteAbsenceStagiaire($etudiant[0]))."<button type='button' onclick='VoirAbsences($etudiant[0])' class='icon-show'><i class='bx bx-show'></i></button></td>";
			}
			else {
				echo "<td>Sans Absence</td>";
			}
			if ($absence->VerifierAbsenceStagiaire($absence->Seance, $absence->DateAbsence, $etudiant[0]) == false) {
				echo "<td><input name='$etudiant[0]' value='$etudiant[0]' type='checkbox' /></td>
						<td><button type='button' disabled style='background-color: #ddd;' class='icon-delete'><i class='bx bx-trash'></i></button></td>";
			}
			else {
				echo "<td><input name='$etudiant[0]' value='$etudiant[0]' checked type='checkbox' disabled /></td>
				<td><button type='button' value='$etudiant[0]/$absence->DateAbsence/$absence->Seance' onclick='SupprimerAbsence(this)' class='icon-delete'><i class='bx bx-trash'></i></button></td>";
			}
		echo "</tr>";
	}
}elseif(isset($_POST["find"])){
	// echo $_POST["ni"];
	$absence->NumInscription = $_POST["ni"];
    $etudiant = $absence->FindEtudiantByNi();
    $nbAbsences = count($absence->ExisteAbsenceStagiaire($_POST["ni"]));
    $T_DetailAbsences = $absence->DetailAbsencesbyEtudiant();

    echo "<div style='margin:20px 20px;'>
            <div  style='margin:15px 0px; display:flex;'>
                <div style='margin:5px 5px;width:33%'><span>Numéro Inscription : <b style='font-size:20px'>" . $etudiant[0] . "</b></span></div>
                <div style='margin:5px 5px;width:33%'><span>Filière : <b style='font-size:20px'>" . $etudiant[18] . "</b></span> </div>
                <div style='margin:5px 5px;'><span>Nombre Absences : <b style='font-size:20px'>" . $nbAbsences . "</b></span></div>
            </div>
            <div style='margin:15px 0px; display:flex;'>
                <div style='margin:5px 5px; width:50%'><span>Prénom : <b style='font-size:20px'>" . $etudiant[2] . "</b></span></div>
                <div style='margin:5px 5px;'><span>Nom : <b style='font-size:20px'>" . $etudiant[1] . "</b></span> </div>
            </div>
    </div>";
    if (count($T_DetailAbsences) > 0) {
        echo "<div>
        <table>
            <tr>
                <th>Date Absences</th>
                <th>Seance</th>
                <th>Matiere</th>
                <th>Formateur</th>
            </tr>
        ";
        foreach ($T_DetailAbsences as $abs) {
            echo " <tr>
                <td>" . $abs[2] . "</td>
                <td>" . $absence->GetSeance($abs[3]) . "</td>
                <td>" . $abs[1] . "</td>
                <td>" . $abs[5] . " " . $abs[6] . "</td>
            </tr>";
        }
        echo "</table>
            </div>";
    }
    else{
        echo "<div style='text-align:center;margin:50px;color:green;font-size:25px;font-weight:600'> 
                N'est pas d'absences !!        
        </div>";
    }
} else
	require "../Views/Absences.php";
