<?php



$table = "<table border='1' width='100%'>
<tr>
<th> Matricule </th>
<th> Nom </th>
<th> Date de Naissance </th>
<th> Date Embauche </th>
<th> Salaire </th>
<th> Heure Sup </th>
<th> Image </th>
<th> Opération </th>
</tr>";

$cx = new PDO("mysql:host=localhost;dbname=ecole","root","");
$T_Formateurs = $cx->query("select * from Formateur")->fetchAll();
foreach($T_Formateurs as $form){
    $conf = "return confirm('sure ?')";
    $table .= '<tr>';
    $table .= '<td>'. $form[0] .'</td>';
    $table .= '<td>'. $form[1] .'</td>';
    $table .= '<td>'. $form[2] .'</td>';
    $table .= '<td>'. $form[3] .'</td>';
    $table .= '<td>'. $form[4] .'</td>';
    $table .= '<td>'. $form[5] .'</td>';
    $table .= '<td> <img src="'.$form[6].'" width="100px"> </td>';
    $table .= '<td> 
    <a href="?Matricule='.$form[0].'"><input type="button" onclick="'.$conf.'" value="Delete" /></a>
    <a href="ModifierFormateur.php?Matricule='.$form[0].'"> <input type="button" value="Update" /></a>
    </td>';
    $table .= '</tr>';
}

$table .= '</table>';

echo $table;










?>
