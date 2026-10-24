<?php   


// $2y$10$O37iX/g6d6JD1rftTvN/Ie4yzwM/u.6whHk7ucsx7W6OZVuG6vLiO
// echo password_hash("BTS123",PASSWORD_DEFAULT);

require "../Models/Login.php";

$login = new Login();

$username = "";
$password = "";
$erreur = "";
if (isset($_POST["btnConnecte"])) {
    $username = $_POST["tUsername"];
    $password = $_POST["tPassword"];
    $user = $login->SeConnecter($username,$password);
    if($user != null){
        session_start();
        $_SESSION["User"] = $user;
        header("location:Emploi.php");
    }else   
        $erreur = "User name or password incorrect";
    
}

require "../Views/Login.php";




?> 