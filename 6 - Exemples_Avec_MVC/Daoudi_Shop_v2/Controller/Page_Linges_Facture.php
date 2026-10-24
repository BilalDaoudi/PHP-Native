<?php
require "../Model/ConnexionDB.php";
ConnexionDB::Toconnecte();
session_start();
if (isset($_POST["btnDaconnecte"])) {
    session_unset();
    session_destroy();
}


if (isset($_SESSION["Admin"])) {
if (isset($_GET["NumFac"])){
    $num_fac = $_GET["NumFac"];


    $T_Info_Client = ConnexionDB::$cnx->query("select * from Facture where NumeroFacture = $num_fac")->fetch();

    $table = "<table width='50%' id='T_Linge' class='table table-dark table-hover table-bordered'>
    <tr>
        <th scope='col'>Code Article</th>
        <th scope='col'>Image Article</th>
        <th scope='col'>Quantite</th>
    </tr>";
   

    $T_Lignes = ConnexionDB::$cnx->query("select Ar.CodeArticle,Ar.PhotoArticle,l.Quantite
    from Article Ar inner join LingneFacture l on l.CodeArticle = Ar.CodeArticle 
    inner join Facture Fac on Fac.NumeroFacture = l.NumeroFacture  where  Fac.NumeroFacture = $num_fac")->fetchAll() ;
    foreach ($T_Lignes as $linge) {
        $msg = "return confirm('Tu as Sure à Supprimer')";
        $table .= '<tr>
            <td class="CodeArt">'.$linge[0].'</td>
            <td class="Img"><img src="../'.$linge[1].'" width="100px" class="ImgArt"></td>
            <td class="Quantite">'.$linge[2].'</td>
            </tr>';
    }
    $table .= "</table>";
} else {
    header("location:../controller/page_Connecte_Admin.php");

}}
else 
    header("location:../controller/page_Connecte_Admin.php");

require "../View/Page_Linges_Facture.php";


?>