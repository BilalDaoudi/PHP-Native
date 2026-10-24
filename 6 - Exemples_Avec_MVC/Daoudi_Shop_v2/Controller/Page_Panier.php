<?php
require "../Model/ConnexionDB.php";
session_start();
ConnexionDB::Toconnecte();
if (isset($_GET['codeSup'])) {
    $code = $_GET['codeSup'];
    for ($i = 0; $i < count($_SESSION['Articles']); $i++) {
        if ($_SESSION['Articles'][$i][0] == $code) {
            // unset($_SESSION['Articles'][$i]);
            array_splice($_SESSION['Articles'], $i, 1);
        }
    }
}
if (isset($_SESSION['Articles']) and count($_SESSION['Articles']) != 0) {
    $table = "<table width='100%' class='table table-dark table-hover table-bordered'>
                <tr>
                    <th scope='col'>Description</th>
                    <th scope='col'>Image</th>
                    <th scope='col'>Prix Unitaire</th>
                    <th scope='col'>Quantité</th>
                    <th scope='col'>Prix Total</th>
                    <th scope='col'>Action</th>
                </tr>";
    $total = 0;
    foreach ($_SESSION['Articles'] as $art) {
        $msg = "return confirm('Tu as Sure à Supprimer ')";
        $row = ConnexionDB::$cnx->query("select * from Article where CodeArticle = '$art[0]'")->fetch();
        $table .= '<tr>
                    <td class="Description">' . $row[1] . '</td>
                    <td class="ImgArticle"><img src="' . '../' . $row[2] . '" width="100px" class="ImgArt"></td>
                    <td class="PrixUnitaire">' . $row[3] . ' DH' . '</td>
                    <td class="Quantite">' . $art[1] . '</td>
                    <td class="PrixTotal">' . $art[1] * $row[3] . ' DH' . '</td>
                    <td><a href="?codeSup=' . $row[0] . '" onclick = "' . $msg . '"><img src="../Icon_Photo/Icon_Delete.png" class="icon" width="60px">
                    </a></td>
                    </tr>';
        $total += $art[1] * $row[3];
        $_SESSION['Total'] = $total;
    }
    $table .= "</table>";

} else {
    header("location:../Controller/Page_Categorie.php");

}


require "../View/Page_Panier.php";
?>