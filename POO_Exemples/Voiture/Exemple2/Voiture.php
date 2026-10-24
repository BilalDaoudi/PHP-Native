<?php
class Voiture
{
    
    //Les Attributs d'Objet
    private string $NumeroChassis;
    private string $Marque;
    private int $Model;
    private float $Prix;
    private string $Couleur;
    private bool $AirBag;
    private bool $Climat;
    private bool $Abs;

    function __construct()
    {     
    }

    //Les Seteers and getters des Attributs private
    //numeroChassis
    public function SetNumeroChassis(string $num)
    {
        $this->NumeroChassis=$num;
    }
    public function GetNumeroChassis()
    {
        return $this->NumeroChassis;
    }

    //Marque
    public function SetMarque(string $marque)
    {
        $this->Marque=$marque;
    }
    public function GetMarque()
    {
        return $this->Marque;
    }

    //Model
    public function SetModel(int $model)
    {
        $this->Model=$model;
    }
    public function GetModel()
    {
        return $this->Model;
    }

    //Prix
    public function SetPrix(float $prix)
    {
        $this->Prix=$prix;
    }
    public function GetPrix()
    {
        return $this->Prix;
    }

    //Couleur
    public function SetCouleur(string $couleur)
    {
        $this->Couleur=$couleur;
    }
    public function GetCouleur()
    {
        return $this->Couleur;
    }

    //AirBag
    public function SetAirBag(bool $airbag)
    {
        $this->AirBag=$airbag;
    }
    public function GetAirBag()
    {
        return $this->AirBag;
    }

    //Climat
    public function SetClimat(bool $climat)
    {
        $this->Climat=$climat;
    }
    public function GetClimat()
    {
        return $this->Climat;
    }

    //Abs
    public function SetAbs(bool $abs)
    {
        $this->Abs=$abs;
    }
    public function GetAbs()
    {
        return $this->Abs;
    }

}
?>