<?php
include "LivreNumerique.php";
class LivrePapier extends Livre
{
    // Attributs d'Objet
    public int $NombrePages;
    public string $Formatlivre;

 

    // Constructeur
    function __construct($isbn,$titre,$auteur,$dateP,$nbpages,$formlivre)
    {
        parent::__construct($isbn,$titre,$auteur,$dateP);
        $this->NombrePages=$nbpages;
        $this->Formatlivre=$formlivre;
    }
    public function __toString(): string
    {
        $st=parent::__toString();
        $st.=sprintf(";%s;%s",$this->NombrePages,$this->Formatlivre);
        return $st;
    }
}

 

?>