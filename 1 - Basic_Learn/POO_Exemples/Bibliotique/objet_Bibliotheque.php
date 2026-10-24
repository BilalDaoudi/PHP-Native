<?php



    include "Bibliotheque.php";
    

    

    // Créer Objet Bibliotheque 
    $nom = readline("Donner le Nom de Bibliotheque :");
    $adresse = readline("Donner l'Adresse de Bibliotheque :");
    $bibliotheque = new Bibliotheque($nom , $adresse);

    // Créer Objet Livre Papier avec Les valeurs Saiasir
    /*
    $isbn = (int)readline("Donner le ISBN de Livre :");
    $titre = readline("Donner le Titre de Livre :");
    $auteur = readline("Donner l'auteur de Livre :");
    $dtP = readline("Donner la Date de Publication de Livre :");
    $NbPages = (int)readline("Donner le nombre de pages de Livre :");
    $Formelivre = readline("Donner la forme de Livre :");

    $LivrePapier1=new LivrePapier($isbn,$titre,$auteur,$dtP,$NbPages,$Formelivre);
    */
    $dtP=new DateTime("1995-5-9");
    $LivrePapier1=new LivrePapier(2536,"Antigone","XXXXx",$dtP,2356,"puche");

    // Ajouter Livre à Bibliotheque
    $bibliotheque->AddLivre($LivrePapier1);
    $bibliotheque->AddLivre($LivrePapier1);
    

    // Créer Objet Livre Numerique avec Les valeurs Saiasir
    /*
    $isbn = (int)readline("Donner le ISBN de Livre :");
    $titre = readline("Donner le Titre de Livre :");
    $auteur = readline("Donner l'auteur de Livre :");
    $dtP = readline("Donner la Date de Publication de Livre :");
    $cap = (float)readline("Donner la capacite de Fichier :");
    $Formefichier = readline("Donner la forme de Fichier :");
    
    $LivreNum1=new LivrePapier($isbn,$titre,$auteur,$dtP,$cap,$Formefichier);
    */
    $dtP=new DateTime("1960-5-9");
    $LivreNum1=new LivreNumerique(1252,"La Boite à merveille","Bilal",$dtP,2.3,"PDF");
    
    // Ajouter Livre à Bibliotheque
    $bibliotheque->AddLivre($LivreNum1);



    // Afficher Les Livres de Bibliotheque
    $bibliotheque->AfficheLivres()


    










?>