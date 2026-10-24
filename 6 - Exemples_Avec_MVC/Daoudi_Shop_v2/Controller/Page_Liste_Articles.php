<?php

require "../Model/Article.php";
Article::Toconnecte();

$Article = new Article();

session_start();
if (isset($_POST["btnDaconnecte"])) {
    session_unset();
    session_destroy();
}

if (isset($_SESSION["Admin"])) {
    if (isset($_GET["DeCodeArt"])) {
        $CodeArt = $_GET["DeCodeArt"];
        $art = $Article::$cnx->query("select * from Article where CodeArticle = '$CodeArt'")->fetch();
        $Bool_delete = $Article->DeleteArticle($CodeArt);
        if ($Bool_delete) 
            unlink("../" . $art[2]);
    }




    if (isset($_GET["idCat"])) {
        $id = $_GET["idCat"];
        $CategorieSelection = $Article::$cnx->query("select * from Categorie where IdCategorie = $id")->fetch();

        if (isset($_SESSION["Admin"])) {

            $table = "<table width='100%' class='table table-dark table-hover table-bordered'>
            <tr>
                <th scope='col'>CodeArticle</th>
                <th scope='col'>Description</th>
                <th scope='col'>Photo Article</th>
                <th scope='col'>Prix Unitaire</th>
                <th scope='col'>Quantite Stockés</th>
                <th scope='col'>Modifier</th>
                <th scope='col'>Supprimer</th>
            </tr>";

            $T_Articles = $Article->GetAll($id);
            foreach ($T_Articles as $Art) {
                $msg = "return confirm('Tu as Sure à Supprimer')";
                $table .= '<tr>
                        <td class="code">' . $Art[0] . '</td>
                        <td class="description">' . $Art[1] . '</td>
                        <td class="img"><img src="' . '../' . $Art[2] . '" width="100px" class="ImgArt"></td>
                        <td class="prix">' . $Art[3] . '</td>
                        <td class="quantirte">' . $Art[4] . '</td>
                        <td><a href="../Controller/Page_Modifier_Article.php?UpCodeArt=' . $Art[0] . '&idCat=' . $id . '"><img src="../Icon_Photo/Icon_Update.png" class="btnUpdate" width="60px"></a></td>
                        <td><a href="?DeCodeArt=' . $Art[0] . '&idCat=' . $id . '" onclick = "' . $msg . '"><img src="../Icon_Photo/Icon_Delete.png" class="btnDelete" width="60px"></a></td>
                        </tr>';
            }
            $table .= "</table>";
        } else {
            header("location:../controller/page_Connecte_Admin.php");
        }
    } else
        header("location:../controller/Page_Connecte_Admin.php");
} else
    header("location:../controller/Page_Connecte_Admin.php");



require "../View/Page_Liste_Articles.php";
