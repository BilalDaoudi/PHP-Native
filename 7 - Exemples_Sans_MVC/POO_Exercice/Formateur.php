<?php
require "Employe.php";

class Formateur extends Employe
{
    
    private $HeureSup;
    private static $RemunerationHSup;
    private $Photo;
    public function SetPhoto($photo)
    {
        $this->Photo = $photo;
    }
    public function GetPhoto()
    {
        return $this->Photo;
    }

    public static function SetRemunerationHSup($ReHSup)
    {
        Formateur::$RemunerationHSup = $ReHSup;
    }
    public static function GetRemunerationHSup()
    {
        return Formateur::$RemunerationHSup;
    }

    function __construct($HSup)
    {
        parent::__construct();
        $this->HeureSup = $HSup;
    }

    public function SalaireAPayer()
    {
        $sal_annee = $this->Salaire * 12;
        $str_taux = $this->getIR($sal_annee);
        $sal_net = 0;
        switch ($str_taux) {
            case "0%":
                $sal_net = ($this->Salaire + $this->HeureSup * $this->RemunerationHSup);
                break;
            case "12%":
                $sal_net = ($this->Salaire + $this->HeureSup * $this->RemunerationHSup)*(1-0.12);
                break;
            case "24%":
                $sal_net = ($this->Salaire + $this->HeureSup * $this->RemunerationHSup)*(1-0.24);
                break;
            case "34%":
                $sal_net = ($this->Salaire + $this->HeureSup * $this->RemunerationHSup)*(1-0.34);
                break;
            case "38%":
                $sal_net = ($this->Salaire + $this->HeureSup * $this->RemunerationHSup)*(1-0.38);
                break;
            case "40%":
                $sal_net = ($this->Salaire + $this->HeureSup * $this->RemunerationHSup)*(1-0.4);
                break;
            }

        return $sal_net;
    }

    public function __toString()
    {
        $ch = parent::__toString() . "-" . $this->HeureSup . "-" . $this->RemunerationHSup . "-" . $this->SalaireAPayer();
        return $ch;
    }
}




/*
$formateur = new Formateur(30);
echo $formateur->GetMatricule();
echo "<br><br>";
$formateur->SetNom("Daoudi bilal");
echo $formateur->GetNom();
echo "<br><br>";
$formateur->SetDateNaissance(new DateTime("2002-12-09"));
print_r($formateur->GetDateNaissance());
echo "<br><br>";
$formateur->SetDateAmbauche(new DateTime("2004-12-09"));
print_r($formateur->GetDateAmbauche());
echo "<br><br>";
$formateur->SetSalaire(9000);
echo $formateur->GetSalaire();
echo "<br><br>";
echo $formateur->Age();
echo "<br><br>";
echo $formateur->Anciennete();
echo "<br><br>";
echo $formateur->DateRetraite(25);
echo "<br><br>";
echo $formateur->getIR(9000*12);
echo "<br><br>";
echo $formateur->SetRemunerationHSup(100);
echo "<br><br>";
echo "<br><br>";
echo $formateur;

*/

// $em1 = new Formateur(30);
// $em2 = new Formateur(30);
// echo $em1->GetMatricule();
// echo $em2->GetMatricule();





?>




