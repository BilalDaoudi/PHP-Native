<?php
require "../Model/ConnexionDB.php";
ConnexionDB::Toconnecte();
session_start();
if (isset($_POST["btnDaconnecte"])) {
    session_unset();
    session_destroy();
}


if (isset($_GET["NumFac"])){
    $num_fac = $_GET["NumFac"];
    ConnexionDB::$cnx->exec("delete from Facture where NumeroFacture = $num_fac");
}


if (isset($_SESSION["Admin"])) {
    $table = "<table width='100%'>
    <tr>
        <th>Numéro Facture</th>
        <th>Nom et Prénom Client</th>
        <th>Email Client</th>
        <th>Téléfone Client</th>
        <th>Adresse Client</th>
        <th>Date Facture</th>
        <th>Supprimer</th>
    </tr>";
   

    $T_Factures = ConnexionDB::$cnx->query("select * from Facture") ;
    foreach ($T_Factures as $Fac) {
        $msg = "return confirm('Tu as Sure à Supprimer')";
        $table .= '<tr>
            <td class="NumeroFac"><a href="../controller/Page_Linges_Facture.php?NumFac=' . $Fac[0] . '"> &nbsp;&nbsp;'. $Fac[0].'&nbsp;&nbsp;  </a></td>
            <td class="Nom">' . $Fac[1] . '</td>
            <td class="Email">' . $Fac[2] . '</td>
            <td class="Telefone">' . $Fac[3] . '</td>
            <td class="Adresse">' . $Fac[4] . '</td>
            <td class="Date">' . $Fac[5] . '</td>


            <td><a href="?NumFac=' . $Fac[0] . '" onclick = "' . $msg . '"><img src="../Icon_Photo/Icon_Delete.png" class="btnDelete" width="60px"></a></td>
            </tr>';
    }
    $table .= "</table>";
} else {
    header("location:../controller/page_Connecte_Admin.php");
}
require "../View/Page_Factures.php";


?>