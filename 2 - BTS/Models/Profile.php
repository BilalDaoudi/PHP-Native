<?php  

require "../Models/ConnexionDB.php";

class Profile extends ConnexionDB{
    
    public function ChangePassword($matricule,$password){
        try {
            $this->connexion();
            $n = Profile::$cnx->prepare("update enseignant set Password = ? where matricule = ?");
            $n->execute([$password,$matricule]);
            $this->Deconnexion();
        } catch (Exception $ex) {
            // erreur
        }
    }
}


?>