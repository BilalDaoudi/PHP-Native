<?php
print_r($_GET) 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="get">
        Nom :<input type="text" name="nom" value="<?php echo $_GET['nom']?>">
        <br>
        Prénom : <input type="text" name="prenom" value="<?php echo $_GET['prenom']?>">
        <br>
        Age  : <input type="text" name="age" value="<?php echo $_GET['age']?>">
    </form>
    
</body>
</html>