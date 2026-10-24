<?php
class Personne
{
        // Attribut de Classe
        public static int $NbPersonnes=0;
        // Méthode de Classe
        public static function Incrementer():int
        {
            self::$NbPersonnes++;           
            return self::$NbPersonnes;
            // ou
            //Personne::$NbPersonnes++;
            //return Personne::$NbPersonnes;
        }
        //Les Attributs d'Objet
        private string $Cin;   // Attribut private Non Accessible : Setter et Getter
        public string $Nom;    // Attribut public : Accessible
        public string $Prenom; // Attribut public : Accessible
        public DateTime $DateNaissance; // Attribut public : Accessible
        //Constructeur : 1 seul avec ou Sans Arguments
        public function __construct(string $nom,string $pr,DateTime $dn)
        {
            // Initialisation 
            $this->Nom=$nom;
            $this->Prenom=$pr;
            $this->DateNaissance=$dn;
            self::Incrementer();  // Appel de la fonction static Incrementer()
        }
        
        // Setter et Getter
        public function SetCin(string $cin)
        {
            $this->Cin=$cin;
        }
        public function GetCin()
        {
            return $this->Cin;
        }

 

        function __toString():string
        {
            $dtf=$this->DateNaissance->format("d/m/Y");
             $ch=sprintf("%s;%s;%s;%s",$this->Cin,$this->Nom,$this->Prenom,$dtf);
            return $ch;
        }

 

        public function Afficher()
        {
            $dtf=$this->DateNaissance->format("d/m/Y");
            print("----------------------------------<br/>");
            print("Cin :$this->Cin<br/>");
            print("Nom :$this->Nom<br/>");
            print("Prénom :$this->Prenom<br/>");
            print("Date Naissance :$dtf<br/>");
        }

 

}

 


?>