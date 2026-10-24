<?php
include "LivrePapier.php";
class Bibliotheque
{
        
        public string $Nom;
        public string $Adresse; 
        public $ListeLivres = []; 
        public function __construct(string $nom, string $adr)
        {
            // Initialisation 
            $this->Nom=$nom;
            $this->Adresse=$adr;
        }

        public function FindLivre($isbn)
        {
            foreach($this->ListeLivres as $liv){
                if ($liv->GetISBN() === $isbn){
                    return 0;
                }
            }
            return -1;
            
        }

        public function AddLivre($liv)
        {
            $isbn = $liv->GetISBN();
            $existe = $this->FindLivre($isbn);

            if ($existe == -1){
                $this->ListeLivres[] = $liv;
                echo "Livre est Ajouté ☻☻☻ \n";
            }
            else{
                echo "Livre Déjà Existe !!!! \n";
            }
        }


        public function AfficheLivres()
        {
            foreach($this->ListeLivres as $liv){
                print($liv);
                print("\n");
            }
        }







        


}
?>