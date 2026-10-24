<?php

include 'connecte_a_data.php';
if (isset($_POST['btninscrice'])) :
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $date = $_POST['date'];
    $email = $_POST['email'];
    $motpasse1 = $_POST['motpasse1'];
    $question = $_POST['question'];
    $reponse = $_POST['reponse'];
    $tele = $_POST['tele'];
    $sexe = $_POST['sexe'];


    try {
        $req = "insert into  clients values('$nom','$prenom','$email','$tele','$motpasse1','$date',CURRENT_TIMESTAMP(),'$sexe','$question','$reponse')";

        $test = $pdo->exec($req);
        if ($test == true)  echo "<script>alert('Ajoute avec succés ')</script>;";
    } catch (PDOException $err) {
        // $msg=$err->getMessage();
        // $message=sprintf("%s",$msg);
        // echo '<script>alert("'.$message.'");</script>';
        echo  "<script>alert('Cet compte est déja exicte')</script>";
    }
endif;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insccription</title>
<!-- 
    <style>
        * {
            padding: 0;
            margin: 0;
            overflow-x: hidden;
        }

        .debut {
            background-color: black;
            padding: 15px;
            position: fixed;
            width: 100%;
            z-index: 1;
        }

        .debut a {
            text-decoration: none;
            color: white;
            margin-left: 10px;
        }
    </style> -->
</head>

<body>
    <!-- <div class="debut">
        <a href="#home">HOME</a>
        <a href="#news">NEWS</a>
        <a href="#contact">CONTACT</a>
    </div> -->
    <center><a href="calculatrice2.html"> Calculatrice</a><br><br>
            <a href="sudoku (1).html">Sudoku joue</a>

    </center>
</body>

</html>