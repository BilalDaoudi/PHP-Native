<?php
require 'ConnexionDB.php';

class Login extends ConnexionDB
{

    public function SeConnecter($login, $password)
    {
        $this->connexion();
        $st = ConnexionDB::$cnx->prepare("SELECT * FROM enseignant WHERE matricule = :login");
        $st->bindParam(":login", $login);
        $st->execute();
        $Admin = $st->fetch(PDO::FETCH_NUM);
        // return $Admin;
        if ($Admin) {
            if (password_verify($password,$Admin[9])) {
                return $Admin;
            } else
                return null;
        } else
            return null;
    }
}

?>
