<?php
require "../Model/Categorie.php";
Categorie::Toconnecte();

$cat = new Categorie();

session_start();
if (isset($_POST["btnDaconnecte"])){
    session_unset();
    session_destroy();
}
if (isset($_GET["idCat"])){
    $id = $_GET["idCat"];
    $categorie = $cat::$cnx->query("select * from Categorie where idCategorie = $id")->fetch();
    $delete = $cat->DeleteCategorie($id);
    if ($delete){
        unlink("../".$categorie[2]);
        header("location:../Controller/Page_Liste_Categorie.php");
    }
    
}




if (isset($_SESSION["Admin"])){
    $table = "<table width='100%'>
            <tr>
                <th>Id Categorie</th>
                <th>Description</th>
                <th>Articles</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>";

    $T_Categories = $cat->GetAll();
    foreach($T_Categories as $Cat){
        $msg = "return confirm('Tu as Sure à Supprimer')";
        $table .= '<tr>
                    <td class="id">' . $Cat[0] . '</td>
                    <td class="description">' . $Cat[1]. '</td>
                    <td class="img"><a href="../Controller/Page_Liste_Articles.php?idCat=' . $Cat[0] . '"><img src="' . '../' . $Cat[2] . '"  class="ImgArt"></a></td>
                    <td><a href="../Controller/Page_Modifier_Categorie.php?idCat=' . $Cat[0] . '"><img src="../Icon_Photo/Icon_Update.png" class="btnUpdate" width="60px"></a></td>
                    <td><a href="?idCat=' . $Cat[0] . '" onclick = "' . $msg . '"><img src="../Icon_Photo/Icon_Delete.png" class="btnDelete" width="60px"></a></td>
                    </tr>';
    }
    $table.="</table>";
}
else{
    header("location:../controller/page_Connecte_Admin.php");
}






require "../View/Page_Liste_Categorie.php";
?>