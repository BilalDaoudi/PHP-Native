<?php
include "Livre.php";
class LivreNumerique extends Livre
{
    // Attributs d'Objet
    public int $Capacite;
    public string $FormatFichier;

 

    // Constructeur
    function __construct($isbn,$titre,$auteur,$dateP,$capa,$formfichier)
    {
        parent::__construct($isbn,$titre,$auteur,$dateP);
        $this->Capacite=$capa;
        $this->FormatFichier=$formfichier;
    }
    public function __toString(): string
    {
        $st=parent::__toString();
        $st.=sprintf(";%s;%s",$this->Capacite,$this->FormatFichier);
        return $st;
    }
}

 

?>