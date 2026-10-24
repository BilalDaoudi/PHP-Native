<?php 
require "Produit.php";

$slct = "<select name='tCategorie'>";
Produit::Toconnecte();
$Cat = Produit::$cnx->query("select * from Categorie")->fetchAll();
foreach($Cat as $c){
    $slct .= "<option value = '$c[2]'>$c[2]</option>";
}
$slct .= "</select>";


if (isset($_POST["btnAjouter"])){
    $ref = $_POST["tReference"];
    $libelle = $_POST["tLibelle"];
    $dt = $_POST["tDateAchat"];
    $prix = $_POST["tPrix"];
    $cate = $_POST["tCategorie"];
    if (isset($_FILES["tPhoto"])){
        print_r($_FILES);
        $T = explode('/',$_FILES["tPhoto"]["type"]);
        $type = "";
        if ($T[1] == "jpeg"){
            $type = "jpeg";
        }
        if ($T[1] == "png"){
            $type = "png";
        }
        if ($type != ""){
            $foto = "photo/".$ref.".".$type;

            $c = Produit::$cnx->query("select * from Categorie where description = '$cate'")->fetch();

            $produit = new Produit();
            $produit->ref = $ref;
            $produit->libelle = $libelle;
            $produit->dateAchat = $dt;
            $produit->prix = $prix;
            $produit->idCategorie = $c[0];
            $produit->photoProduit = $foto;

            $test = $produit->AddProduit();
            if ($test){
                move_uploaded_file($_FILES["tPhoto"]["tmp_name"],$foto);
                echo "<script>alert('Ajouté avec Succées')</script>";
            }
        }
    }
}





?>


<body>
    <form enctype="multipart/form-data" action="" method="post">
        <h1>Ajouter Produit</h1>
        Reference <br>
        <input type="text" name="tReference"><br><br>
        Libelle <br>
        <input type="text" name="tLibelle"><br><br>
        Date Achat <br>
        <input type="text" name="tDateAchat"><br><br>
        Prix <br>
        <input type="text" name="tPrix"><br><br>
        Photo <br>
        <input type="file" name="tPhoto"><br><br>
        Categorie <br>
        <?php echo $slct; ?><br><br>
        <input type="submit" value="Ajouter" name="btnAjouter">
    </form>
</body>