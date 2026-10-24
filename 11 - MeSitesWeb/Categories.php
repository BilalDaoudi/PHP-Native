<?php

$con = new PDO("mysql:host=localhost;dbname=MesSitesWeb", "root", "12345678");
if (isset($_POST["add"])) {
    $n = $con->prepare("call SP_AddCategorie(?,?)");
    $n->execute([$_POST["nom"], $_POST["description"]]);
}
if (isset($_POST["iddelete"])) {
    $n = $con->prepare("call SP_DeleteCategorie(?)");
    $n->execute([$_POST["iddelete"]]);
}

$categories = $con->query("call SP_getAllCategories()")->fetchAll(PDO::FETCH_NUM);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catégories</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="row h1 text-primary m-1 fw-bold">
        <center>
            Les Catégories
        </center>
    </div>
    <div class="row m-5">
        <div class="col-4" id="ajouter">
            <div class="text-center h5 text-info fw-bold m-4">
                Ajouter
            </div>
            <form action="" method="post">
                <div class="form-group m-3">
                    <input type="text" class="form-control" id="nom" name="nom" placeholder="tapez le nom" />
                </div>
                <div class="form-group m-3">
                    <input type="text" class="form-control" id="description" name="description" placeholder="tapez le description" />
                </div>
                <div class="form-group m-5">
                    <center>
                        <button class="btn btn-primary" name="add">Sauvgarder</button>
                    </center>
                </div>
            </form>
        </div>

        <div class="col-8">
            <br>
            <table class="table table-bordered table-light table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    
                <?php if (count($categories) != 0) : ?>
                    <?php foreach ($categories as $cat) : ?>
                        <tr>
                            <td><?= $cat[0] ?></td>
                            <td><?= $cat[1] ?></td>
                            <td><?= $cat[2] ?></td>
                            <td>
                                <form action='' method="POST">
                                    <button class="btn btn-danger" name="iddelete" value="<?= $cat[0] ?>">Supprimer</button>
                                </form>
                            </td>
                        </tr>


                    <?php endforeach; ?>
                    
                <?php else : ?>
                    <tr>
                        <td colspan="4" class="text-danger fw-bold text-center p-5 h1">
                            n'est pas des catégories 
                        </td>
                    </tr>
                <?php endif; ?>

                </tbody>

            </table>
        </div>
    </div>
</body>

</html>