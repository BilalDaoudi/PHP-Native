<?php  
require "ConnexionDB.php";

class Emploi extends ConnexionDB
{
    public function GetEmploiByFormateur($mat){
        $rows = [];
        try{
            $this->connexion();
            $n = Emploi::$cnx->prepare("select e.*,m.descriptionmat from Emploi e inner join Matiere m on e.Codematiere = m.Codematiere  where matricule = ?");
            $n->execute([$mat]);
            $rows = $n->fetchAll(PDO::FETCH_NUM);
        }catch(Exception $ex){
            // Erreur
        }
        return $rows;
    }

}


?>