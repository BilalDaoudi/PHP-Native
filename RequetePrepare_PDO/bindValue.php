
<?php
// Marqueur Nommé :
//-------------------------------------------------------------------------------
    $cnx=new PDO("mysql:host=localhost;dbname=GestionProjets",'root','');
    $query="insert into Employe  values(:Matricule,:Nom,:Prenom,:DateNaissance,:Salaire)";
    $pdost=$cnx->prepare($query);
    //Les variables
    $mat=7540;
    $nom='El Alaoui';
    $pr='Jamila';
    $dn='2001-5-7';
    $sal=9000.50;
    //bindValue : Liaison par Valeur
    $pdost->bindValue(':Matricule',$mat);
    $pdost->bindValue(':Nom',$nom);
    $pdost->bindValue(':Prenom',$pr);
    $pdost->bindValue(':DateNaissance',$dn);
    $pdost->bindValue(':Salaire',$sal);
    //Exécution
    $pdost->execute();
?>

<?php
//--------------------------------------------------------------------------------
//Marqueur Interrogatif :
    $cnx=new PDO("mysql:host=localhost;dbname=GestionProjets",'root','');
    $query="insert into Employe  values(?,?,?,?,?)";
    $pdost=$cnx->prepare($query);
    //Les variables
    $mat=9122;
    $nom='El Kassbaoui';
    $pr='Samir';
    $dn='2002-9-9';
    $sal=13500;
    //bindValue : Liaison par Valeur
    $pdost->bindValue(1,$mat);
    $pdost->bindValue(2,$nom);
    $pdost->bindValue(3,$pr);
    $pdost->bindValue(4,$dn);
    $pdost->bindValue(5,$sal);
    //Exécution
    $pdost->execute();
    //-----------------------------------------------------------------------------
?>