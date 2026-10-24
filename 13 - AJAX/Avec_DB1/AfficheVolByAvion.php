<?php



if(isset($_GET['numvol']))
{
    $cnx = new PDO("mysql:host=localhost;dbname=gestionvols","root","12345678");
    $num = $_GET['numvol'];
    $Vols = $cnx->query("select v.*,concat(p.nompilote,' ',p.prenompilote) from Vol v inner join Pilote p on v.NumPilote = p.NumeroPilote
                        where NumAvion = $num")->fetchAll(PDO::FETCH_NUM);
    echo "<br><br><table width='100%' border='1'>
            <tr>
                <th>Numero Vol</th>
                <th>Pilote</th>
                <th>Ville Depart</th>
                <th>Ville Arrivee</th>
                <th>Heure Depart</th>
                <th>Heure Arrivee</th>
                <th>Date Vol</th>              
            </tr>
    ";
    foreach($Vols as $vol){
        echo "<tr>
                    <td>$vol[0]</td>
                    <td>$vol[8]</td>
                    <td>$vol[4]</td>
                    <td>$vol[5]</td>
                    <td>$vol[6]</td>
                    <td>$vol[7]</td>
                    <td>$vol[3]</td>              
            </tr>";
    }
    echo "</table>";
}



// print_r($_GET);




?>