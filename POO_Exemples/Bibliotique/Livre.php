<?php
class Livre
{
        private int $ISBN;   
        private string $Titre;
        private string $Auteur; 
        private DateTime $DatePublication; 
        
        public function __construct(int $isbn,string $titre, string $auteur,DateTime $dt)
        {
            // Initialisation 
            $this->ISBN=$isbn;
            $this->Titre=$titre;
            $this->Auteur=$auteur;
            $this->DateNaissance=$dt;
        }
        
        // Setter et Getter
        public function SetISBN(string $isbn)
        {
            $this->ISBN=$isbn;
        }
        public function GetISBN()
        {
            return $this->ISBN;
        }

        // Setter et Getter
        public function SetTitre(string $titre)
        {
            $this->Titre=$titre;
        }
        public function GetTitre()
        {
            return $this->Titre;
        }
        

        // Setter et Getter
        public function SetAuteur(string $auteur)
        {
            $this->Auteur=$auteur;
        }
        public function GetAuteur()
        {
            return $this->Auteur;
        }



        // Setter et Getter
        public function SetDatePublication(string $dtP)
        {
            $this->DatePublication=$dtP;
        }
        public function GetDatePublication()
        {
            return $this->DatePublication;
        }

 

        function __toString():string
        {
            $dtf=$this->DateNaissance->format("d/m/Y");
            $ch=sprintf("%s;%s;%s;%s",$this->ISBN,$this->Titre,$this->Auteur,$dtf);
            return $ch;
        } 

}

 


?>