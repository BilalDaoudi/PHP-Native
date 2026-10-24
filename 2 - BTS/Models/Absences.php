<?php
require "ConnexionDB.php";


class Absence extends ConnexionDB
{

    public $id;
    public $NumInscription;
    public $DateAbsence;
    public $Seance;
    public $Matiere;
    public $Matricule;
    public $Filiere;
    public function AddAbsence()
    {
        try {
            $this->connexion();
            $n = Absence::$cnx->prepare("insert into Abcense(Num_Inscription,dateabcense,seonce,matiere,matricule,filiere) values (?,?,?,?,?,?)");
            $n->execute([$this->NumInscription, $this->DateAbsence, $this->Seance, $this->Matiere, $this->Matricule, $this->Filiere]);
            $this->Deconnexion();
        } catch (Exception $ex) {
            // erreur
        }
    }
    public function DeleteAbsence()
    {
        try {
            $this->connexion();
            $n = Absence::$cnx->prepare("delete from Abcense where Num_Inscription = ? and dateabcense = ? and  seonce = ?");
            $n->execute([$this->NumInscription, $this->DateAbsence, $this->Seance]);
            $this->Deconnexion();
        } catch (Exception $ex) {
            // erreur
        }
    }
    public function GetEtudiantByFiliere()
    {
        $Etudiants = [];
        try {
            $this->connexion();
            $n = Absence::$cnx->prepare("select Num_Inscription,NomE,PrenomE,codefilier from Etudiant where  codefilier = ? order by Num_Inscription");
            $n->execute([$this->Filiere]);
            $Etudiants =  $n->fetchAll(PDO::FETCH_NUM);
            $this->Deconnexion();
        } catch (Exception $ex) {
            // erreur
        }
        return $Etudiants;
    }
    public function ExisteSeanceByFormateur($jour)
    {
        $existe = [];
        try {
            $this->connexion();
            $n = Absence::$cnx->prepare("select e.*,m.descriptionmat from Emploi e inner join Matiere m on e.Codematiere = m.Codematiere where seance = ? and jour = ? and matricule = ? ");
            $n->execute([$this->Seance, $jour, $this->Matricule]);
            $existe =  $n->fetch(PDO::FETCH_NUM);
            $this->Deconnexion();
        } catch (Exception $ex) {
            // erreur
        }
        return $existe;
    }
    public function VerifierAbsenceStagiaire($Seance, $DateAbsence, $NumInscription)
    {
        $existe = [];
        try {
            $this->connexion();
            $n = Absence::$cnx->prepare("select * from Abcense where seonce = ? and dateabcense = ? and Num_Inscription = ?");
            $n->execute([$Seance, $DateAbsence, $NumInscription]);
            $existe =  $n->fetch(PDO::FETCH_NUM);
            $this->Deconnexion();
        } catch (Exception $ex) {
            // erreur
        }
        if ($existe)
            return true;
        else return false;
    }
    public function GetDay($d)
    {
        $T_NameDay = [
            "Mon" => "Lundi",
            "Tue" => "Mardi",
            "Wed" => "Mercredi",
            "Thu" => "Jeudi",
            "Fri" => "Vendredi",
            "Sat" => "Samedi",
            "Sun" => "Dimanche"
        ];
        $dayname = date('D', strtotime($d));
        return $T_NameDay[$dayname];
    }

    public function GetSeance($n)
    {
        switch ($n) {
            case 1:
                return "8:30 -> 10:30";
            case 2:
                return "10:30 -> 12:30";
            case 3:
                return "14:30 -> 16:30";
            case 4:
                return "16:30 -> 18:30";
            default:
                return "";
        }
    }


    public function ExisteAbsenceStagiaire($NumInscription)
    {
        $absences = [];
        try {
            $this->connexion();
            $n = Absence::$cnx->prepare("select * from Abcense where Num_Inscription = ?");
            $n->execute([$NumInscription]);
            $absences =  $n->fetchAll(PDO::FETCH_NUM);
            $this->Deconnexion();
        } catch (Exception $ex) {
            // erreur
        }
        return $absences;
    }

    public function FindEtudiantByNi()
    {
        $row = [];
        try {
            $this->connexion();
            $n = Absence::$cnx->prepare("select * from Etudiant where Num_Inscription = ?");
            $n->execute([$this->NumInscription]);
            $row =  $n->fetch(PDO::FETCH_NUM);
            $this->Deconnexion();
        } catch (Exception $ex) {
            // erreur
        }
        return $row;
    }


    public function DetailAbsencesbyEtudiant()
    {
        // $absences = [];
        // try {
        $this->connexion();
        $n = Absence::$cnx->prepare("select m.codeMatiere,m.descriptionMat,a.dateabcense,a.seonce,a.filiere,e.Nom,e.Prenom from Matiere m inner join Abcense a on m.CodeMatiere = a.matiere
            inner join enseignant e using(matricule) where Num_Inscription = ?");
        $n->execute([$this->NumInscription]);
        $absences =  $n->fetchAll(PDO::FETCH_NUM);
        $this->Deconnexion();
        // } catch (Exception $ex) {
        //     // erreur
        // }
        return $absences;
    }
}
