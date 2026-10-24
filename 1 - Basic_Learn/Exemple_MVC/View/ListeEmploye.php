<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        td {
            text-align: center;
        }
    </style>

</head>

<body>

    <table border="1" width="100%">
        <tr>
            <th>Matricule</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Date de Naissance</th>
            <th>Salaire</th>
        </tr>

        <?php
        foreach ($T_Employes as $employe) {
            echo "<tr>
                        <td>$employe[0]</td>
                        <td>$employe[1]</td>
                        <td>$employe[2]</td>
                        <td>$employe[3]</td>
                        <td>$employe[4]</td>
                    </tr>";
        }
        ?>
    </table>

    

</body>

</html>