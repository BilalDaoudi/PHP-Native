<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/commande.css">
    <title>Commande</title>
</head>

<body>

    <div class="facture">
        <h1>
            <i>Facture</i>
        </h1>
        <br><br>
        <table width="100%" class="tbl1">
            <tr>
                <th>Id</th>
                <td><?php echo $_SESSION["client"][0]; ?></td>
                <th>Nom</th>
                <td><?php echo $_SESSION["client"][1]; ?></td>
                <th>Prénom</th>
                <td><?php echo $_SESSION["client"][2]; ?></td>
            </tr>
            <tr>
                <th>Ville</th>
                <td><?php echo $_SESSION["client"][5]; ?></td>
                <th>Code Postale</td>
                <td><?php echo $_SESSION["client"][7]; ?></td>
                <th>Téléfone</th>
                <td><?php echo $_SESSION["client"][8]; ?></td>
            </tr>
            <tr>
                <th>Adresse</th>
                <td><?php echo $_SESSION["client"][6]; ?></td>
                <th>Date Facture</td>
                <td><?php echo $dt[0]; ?></td>
                <th>Numéro Facture</th>
                <td>1<?php //echo $_SESSION["client"][8]; 
                        ?></td>
            </tr>
            <tr>
                <th>Code Article</th>
                <th colspan="2">Description</th>
                <th>Prix Unitaire</th>
                <th>Quantite</th>
                <th>Prix</th>
            </tr>

            <?php echo $tr; ?>


        </table>
        <br>

        <table class="tbl2">
            <tr>
                <th>Total HT :</th>
                <td><?php echo $total; ?>&nbsp;&nbsp;DHS</td>
            </tr>
            <tr>
                <th>Total TTC :</th>
                <td><?php echo $totalttc; ?>&nbsp;&nbsp;DHS</td>
            </tr>
        </table>
        <br>
        <br>

        <a href="../controller/Paiement.php"><input type="button" value="VALIDER"></a> 
        <a href="../controller/User.php"><input type="button" value="ABANDONNER"></a> 


    </div>

</body>

</html>

