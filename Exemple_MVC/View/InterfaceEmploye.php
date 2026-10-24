
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form method="post">
        <table border="1">
            <tr>
                <th>Champs</th>
                <th>Valeurs</th>
                <th>Opérations</th>
            </tr>
            <tr>
                <td>Matricule</td>
                <td><input type="text" name="tMatricule" id="tMatricule" value="<?php echo $emp->Matricule; ?>"></td>
                <td><input type="submit" name="btnVider" value="Vider"></td>
            </tr>
            <tr>
                <td>Nom</td>
                <td><input type="text" name="tNom" id="tNom" value="<?php echo $emp->Nom; ?>"></td>
                <td><input type="submit" name="btnAjouter" value="Ajouter"></td>
            </tr>
            <tr>
                <td>Prénom</td>
                <td><input type="text" name="tPrenom" id="tPrenom" value="<?php echo $emp->prenom; ?>"></td>
                <td><input type="submit" name="btnModifier" value="Modifier"></td>
            </tr>
            <tr>
                <td>Date de Naissance</td>
                <td><input type="text" name="tDateNaissance" id="tDateNaissance" value="<?php echo $emp->DateNaissance; ?>"></td>
                <td><input type="submit" name="btnRecherche" value="Recherche"></td>
            </tr>
            <tr>
                <td>Salaire</td>
                <td><input type="text" name="tSalaire" id="tSalaire" value="<?php echo $emp->Salaire; ?>"></td>
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

</body>

</html>