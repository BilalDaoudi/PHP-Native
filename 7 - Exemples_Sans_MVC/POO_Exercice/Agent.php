<?php
require "Employe.php";

class Agent extends Employe
{
    private $primeResponsabilite;
    public function SetprimeResponsabilite($primeRespo)
    {
        $this->primeResponsabilite = $primeRespo;
    }
    public function GetprimeResponsabilite()
    {
        return $this->primeResponsabilite;
    }
    public function SalaireAPayer()
    {
        $sal_annee = $this->Salaire * 12;
        $str_taux = $this->getIR($sal_annee);
        $sal_net = 0;
        switch ($str_taux) {
            case "0%":
                $sal_net = ($this->Salaire + $this->primeResponsabilite);
                break;
            case "12%":
                $sal_net = ($this->Salaire + $this->primeResponsabilite)*(1-0.12);
                break;
            case "24%":
                $sal_net = ($this->Salaire + $this->primeResponsabilite)*(1-0.24);
                break;
            case "34%":
                $sal_net = ($this->Salaire + $this->primeResponsabilite)*(1-0.34);
                break;
            case "38%":
                $sal_net = ($this->Salaire + $this->primeResponsabilite)*(1-0.38);
                break;
            case "40%":
                $sal_net = ($this->Salaire + $this->primeResponsabilite)*(1-0.4);
                break;
            }

        return $sal_net;
    }
}

/*
$agent = new Agent(30);
echo $agent->GetMatricule();
echo "<br><br>";
$agent->SetNom("Daoudi bilal");
echo $agent->GetNom();
echo "<br><br>";
$agent->SetDateNaissance(new DateTime("2002-12-09"));
print_r($agent->GetDateNaissance());
echo "<br><br>";
$agent->SetDateAmbauche(new DateTime("2004-12-09"));
print_r($agent->GetDateAmbauche());
echo "<br><br>";
$agent->SetSalaire(9000);
echo $agent->GetSalaire();
echo "<br><br>";
echo $agent->Age();
echo "<br><br>";
echo $agent->Anciennete();
echo "<br><br>";
echo $agent->DateRetraite(25);
echo "<br><br>";
echo $agent->getIR(9000*12);
echo "<br><br>";
$agent->SetprimeResponsabilite(100);
echo "<br><br>";
echo "<br><br>";
echo $agent->SalaireAPayer();

*/
?>