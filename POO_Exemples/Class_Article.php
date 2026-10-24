<?php

 

    class Article
    {
//les Attributs d'objets
        /*
        public $CodeArticle;
        public $Designation;
        public $Prix;
        public $Quantite;
        */

 

        // Ou avec les Type
        public string $CodeArticle;
        public string $Designation;
        public float $Prix;
        public int $Quantite;
//Les Attributs de Classe
        public static $NbArticles=0;

 

        //Constructeur : 1 Seul avec ou sans arguments
        function __construct(){
            // Pour Accéder aux Membres de Classe (Attribut ou Méthode) on utilise NomClasse ::
            //Article::$NbArticles++;
            //ou
            Article::Incrementer(); }
//Méthodes d'objets
        public function Saisir(){         
            //$this est équivalent de self de Python
           $this->CodeArticle =readline("Donner le code de l'article :");
           $this->Designation=readline("Donner la désignation de l'article :");
           $this->Prix =(float)readline("Donner le prix de l'article :");
           $this->Quantite=(int)readline("Donner la quantité de l'article :");        }
        public function Display(){
            print("$this->CodeArticle\t$this->Designation\t$this->Prix\t$this->Quantite\n");}
//Méthodes de Classe
        private static function Incrementer()
         {
            Article::$NbArticles++;
        } 
    }
    
//Les Objets
    // Instanciation
    $art1=new Article();   
    //Accéder Aux Attributs : ->
    $art1->CodeArticle="hdd1t";
    $art1->Designation="Disque Dur 1 Terra Bytes";
    $art1->Prix=500.50;
    $art1->Quantite=12;
    //Affichage de $art1
    echo $art1->CodeArticle,"\n";
    echo $art1->Designation,"\n";
    echo $art1->Prix,"\n";
    echo $art1->Quantite,"\n";

 

    //instanciation
    $art2=new Article();
    //Saisie Clavier
    $art2->CodeArticle=readline("Donner le code de l'article :");
    $art2->Designation=readline("Donner la désignation de l'article:");
    $art2->Prix=(float)readline("Donner le prix de l'article :");
    $art2->Quantite=(int)readline("Donner la quantité de l'article :");
    //Affichage de $art2
    print("CodeArticle\tDésignation\tPrix\tquantité\n");
    print("$art2->CodeArticle\t$art2->Designation\t$art2->Prix\t$art2->Quantite\n");

 

    //instanciation
    $art3=new Article();
    $art3->Saisir();
    $art3->Display();
    $art13=new Article();
    $art223=new Article();
    $art883=new Article();
    echo "Nombre d'Articles :",Article::$NbArticles,"\n";
    
?>