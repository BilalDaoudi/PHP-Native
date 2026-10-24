<?php
include "Personne.php";
class Stagiaire extends Personne
{
    // Attributs d'Objet
    public int $NumInscription;
    public string $CodeSp;

 

    // Constructeur
    function __construct($cin,$nom,$pr,$dn,$ni,$code)
    {
        parent::__construct($nom,$pr,$dn);
        parent::SetCin($cin);
        $this->NumInscription=$ni;
        $this->CodeSp=$code;
    }
    public function __toString(): string
    {
        $st=parent::__toString();
        $st.=sprintf(";%s;%s",$this->NumInscription,$this->CodeSp);
        return $st;
    }
    public function Afficher()
        {
            parent::Afficher();
            print("Numéro Inscription :$this->NumInscription<br/>");
            print("Code Spécialité :$this->CodeSp<br/>");
        }
}

 

?>