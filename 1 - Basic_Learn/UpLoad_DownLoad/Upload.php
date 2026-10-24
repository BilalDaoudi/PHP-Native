<?php 
    if(isset($_POST['btnUpLoad']))
    {

       print_r($_FILES);
        echo "Nom Fichier : ".$_FILES['MonFichier']['name']."<br/>";
        echo "Type Fichier : ".$_FILES['MonFichier']['type']."<br/>";
        echo "Capacité Fichier : ".$_FILES['MonFichier']['size']."<br/>";
        if($_FILES['MonFichier']['size']<=10000)
            move_uploaded_file($_FILES['MonFichier']['tmp_name'],"Photos/JPG/".$_FILES['MonFichier']['name']);

/*
        $from=$_FILES['MonFichier']['tmp_name'];
        $to="Photos/".$_FILES['MonFichier']['name'];
        move_uploaded_file($from,$to);
*/
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Chargement</title>
</head>
<body>
    <form enctype="multipart/form-data" action="" method="post">
        <input type="hidden" name="MAX_FILE_SIZE" value="100000" />
        Photo : <input type="file" name="MonFichier"/><br/><br/>
        <input type="submit" name="btnUpLoad" value="UpLoad"/>

        <!-- <input type="file" name="hh" id="hh" accept=".jpg, .png, .jpeg"> -->
        <!-- <input type="text" name="hh" id="hh" autofocus> -->
       <!-- <a href="../EFM_V2/photo/A1.jpeg" download>bilal download</a> -->




    </form>
</body>
</html>