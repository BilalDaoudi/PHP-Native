<?php
if (isset($_POST["btninscrice"])) {
      include "connecte_a_data.php";

      $nom = $_POST['nom'];
      $prenom = $_POST['prenom'];
      $date = $_POST['date'];
      $email = $_POST['email'];
      $tel = $_POST['tele'];
      $sexe = $_POST['sexe'];
      $question = $_POST['question'];
      $reponse = $_POST['reponse'];
      $code = $_POST['motpasse1'];


      $req = "insert into clients values('$nom','$prenom','$email','$tel','$code','$date',CURRENT_TIMESTAMP(),'$sexe','$question','$reponse')";
      $n = $pdo->exec($req);
      if ($n == 1) {
            echo "<script>alert('Ajouter avec succès')</script>";
            header('Location:Home_page.php');
            exit();
      }
}
