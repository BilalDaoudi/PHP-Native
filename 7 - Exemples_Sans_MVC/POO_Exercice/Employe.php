<?php
require "IEmploye.php";
require "IR.php";


class Employe extends IR implements IEmploye
{
    
    public static $mat = 1000;

    protected $Matricule;
    protected $Nom;
    protected $DateNaissance;
    protected $DateAmbauche;
    protected $Salaire;

    function __construct()
    {
        self::$mat++;
        $this->Matricule = self::$mat;
    }

    public function GetMatricule()
    {
        return $this->Matricule;
    }

    public function SetNom($nom)
    {
        $this->Nom = $nom;
    }
    public function GetNom()
    {
        return $this->Nom;
    }
    public function SetDateNaissance($dtn)
    {
        $this->DateNaissance = $dtn;
    }
    public function GetDateNaissance()
    {
        return $this->DateNaissance;
    }
    public function SetDateAmbauche($dta)
    {
        $dt_sys = new DateTime();
        $dtn = $this->DateNaissance;
        $t = (array)(date_diff($dt_sys, $dtn));
        if ($t["y"] > 16)
            $this->DateAmbauche = $dta;
    }
    public function GetDateAmbauche()
    {
        return $this->DateAmbauche;
    }
    public function SetSalaire($sal)
    {
        $this->Salaire = $sal;
    }
    public function GetSalaire()
    {
        return $this->Salaire;
    }



    public function Age()
    {
        $dt_sys = new DateTime();
        $dtn = $this->DateNaissance;
        $t = (array)(date_diff($dt_sys, $dtn));
        return $t["y"];
    }



    public function Anciennete()
    {
        $dt_sys = new DateTime();
        $dtn = $this->DateAmbauche;
        $t = (array)(date_diff($dt_sys, $dtn));
        return $t["y"];
    }



    public function DateRetraite($ageretrait)
    {
        $t = (array)($this->DateNaissance);
        $t1 = explode(' ', $t["date"]);
        $t2 = explode('-', $t1[0]);
        $dateretrait = $t2[0] + $ageretrait . "-" . $t2[1] . "-" . $t2[2];
        return $dateretrait;
    }
    public static function getIR($salaire)
    {
        for ($i = 0; $i < 6; $i++) {
            if ($salaire >= self::$_tranches[$i][0] and $salaire <= self::$_tranches[$i][1]) {
                return self::$_tauxIR[$i];
            }
        }
        return "0%";
    }


    public function SalaireAPayer()
    {
    }
    public function __toString()
    {
        $ch = $this->Matricule."-".$this->Nom."-".$this->Salaire."-".$this->Age()."-".$this->Anciennete();
        return $ch;
    }
    
}




//  --------------- Test ------------------------

/*
$em = new Employe();
echo $em->GetMatricule();
echo "<br><br>";
$em->SetNom("Daoudi bilal");
echo $em->GetNom();
echo "<br><br>";
$em->SetDateNaissance(new DateTime("2002-12-09"));
print_r($em->GetDateNaissance());
echo "<br><br>";
$em->SetDateAmbauche(new DateTime("2004-12-09"));
print_r($em->GetDateAmbauche());
echo "<br><br>";
$em->SetSalaire(9000);
echo $em->GetSalaire();
echo "<br><br>";
echo $em->Age();
echo "<br><br>";
echo $em->Anciennete();
echo "<br><br>";
echo $em->DateRetraite(25);
echo "<br><br>";
echo $em->getIR(9000*12);
echo "<br><br>";
echo "<br><br>";
echo $em;
*/

// $em1 = new Employe();
// $em2 = new Employe();
// echo $em1->GetMatricule();
// echo $em2->GetMatricule();