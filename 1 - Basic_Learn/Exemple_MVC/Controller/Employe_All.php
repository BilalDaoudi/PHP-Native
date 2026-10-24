<?php
require("../Model/Employe.php");

$emp = new Employe("GestionProjets", "localhost", "root", "");

$TouT = $emp->GetAll();
$nbemploye_page = 4;
$nbpage = (int)(count($TouT) / $nbemploye_page);
if (count($TouT) % $nbemploye_page != 0)
    $nbpage++;

echo "<form method='post'>";
for ($i = 1; $i <= $nbpage; $i++) {
    echo "<input type='submit' name='nbpage' value='$i'/>";
}
echo "</form>";

$T_Employes = [];
if (isset($_POST["nbpage"])) {
    for ($i = 1; $i < $nbpage; $i++) {
        if ($_POST["nbpage"] == $i) {
            $idice = $nbemploye_page * $i - $nbemploye_page;
            for($j = $idice; $j < $idice+$nbemploye_page; $j++){
                $T_Employes[]= $TouT[$j];
            }
        }
    }
    if ($_POST["nbpage"] == $nbpage) {
        $idice = $nbemploye_page * $nbpage - $nbemploye_page;
        for($j = $idice; $j < count($TouT); $j++){
            $T_Employes[]= $TouT[$j];
        }
    }
    
}

require("../View/ListeEmploye.php");
