<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="../Style/menu.css">
	<link rel="stylesheet" href="../Style/absences.css">
    <script src="../JS/script_absences.js"></script>
    <title>Absence Etudiants</title>

</head>

<body>
    
	<?php require "menu.php" ?>
    <div class="date_seance">
        <form method="post" action="">
            <span>
                <b>Choisir Date :</b> <input type="date" name="dateabsence" value="<?= $date ?>" />
            </span>
            <span style="margin-left:20px">
                <b>Seance :</b>
                <select name="seance">
                    <option value="choisir">Choisir Seance</option>
                    <option value="1" <?= $seance == "1" ? "selected" : "" ?>>8:30 h&nbsp; -> &nbsp;10:30 h</option>
                    <option value="2" <?= $seance == "2" ? "selected" : "" ?>>10:30 h&nbsp; -> &nbsp;12:30 h</option>
                    <option value="3" <?= $seance == "3" ? "selected" : "" ?>>14:30 h&nbsp; -> &nbsp;16:30 h</option>
                    <option value="4" <?= $seance == "4" ? "selected" : "" ?>>16:30 h&nbsp; -> &nbsp;18:30 h</option>
                </select>
            </span>
            <span style="margin-left:20px">
                <button name="go" class='go'>GO</button>
            </span>

        </form>
    </div>
    <div style="text-align: center; padding:<?= $message == "" ? "" : "100px" ?>;font-size: 25px; color:red;font-weight:600">
        <?= $message ?>
    </div>

    <?php if (count($Etudiants) > 0) :  ?>
        <form action="" method="post">
            <div style=" margin:10px 0px; display: flex;">
                <input type="hidden" name='date' value="<?= $date ?>" />
                <input type="hidden" name='seance' value="<?= $seance ?>" />
                <input type="hidden" name='filiere' value="<?= $Etudiants[0][3] ?>" />
                <input type="hidden" name='matiere' value="<?= $existe[3] ?>"/>
                <span style="text-align: left; width:40%;padding:10px 0px">Filiere : <span style="font-size: 20px; font-weight:600;"><?= $Etudiants[0][3] ?></span></span>
                <span style="text-align: left; width:50%;padding:10px 0px">Matiere : <span style="font-size: 20px; font-weight:600;"><?= $existe[5] ?></span></span>
                <span><button name="valider" class="valider" style=" height:40px; font-size:20px" value="valider">valider</button></span>
            </div>
            <table width="100%" border="1">
                <thead>
                    <tr>
                        <th>Numéro Inscription</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Nombre Absences</th>
                        <th>Absence</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="info">

                    <?php if (count($Etudiants) > 0) : ?>
                        <?php foreach ($Etudiants as $etudiant) : ?>
                            <tr>
                                <td><?= $etudiant[0] ?></td>
                                <td><?= $etudiant[1] ?></td>
                                <td><?= $etudiant[1] ?></td>
                                <?php if ($absence->ExisteAbsenceStagiaire($etudiant[0])) : ?>
                                    <td>
                                        <?= count($absence->ExisteAbsenceStagiaire($etudiant[0]))  ?>
                                        <button type="button"  onclick="VoirAbsences(<?= $etudiant[0] ?>)" class='icon-show'><i class="bx bx-show"></i></button>

                                    </td>
                                <?php else : ?>
                                    <td>Sans Absence</td>
                                <?php endif; ?>
                                <?php if ($absence->VerifierAbsenceStagiaire($seance, $date, $etudiant[0]) == false) : ?>
                                    <td><input name="<?= $etudiant[0] ?>" value="<?= $etudiant[0] ?>" type="checkbox" /></td>
                                    <td><button type="button" disabled style="background-color: #ddd;" class='icon-delete'><i class='bx bx-trash'></i></button></td>
                                <?php else : ?>
                                    <td><input name="<?= $etudiant[0] ?>" value="<?= $etudiant[0] ?>" checked type="checkbox" disabled /></td>
                                    <td><button class='icon-delete' type="button" value="<?= $etudiant[0] . "/" . $date . "/" . $seance ?>" onclick="SupprimerAbsence(this)"><i class='bx bx-trash'></i></button></td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; ?>

                    <?php endif; ?>

                </tbody>
            </table>
        </form>
    <?php endif; ?>


    <div id='absence' class='absence'>
		<input type='button' value='X' onclick='Fermer()' id='fermer'>
		<div id="detail">

		</div>
	</div>

    
	<script src="../JS/script_menu.js"></script>
</body>

</html>