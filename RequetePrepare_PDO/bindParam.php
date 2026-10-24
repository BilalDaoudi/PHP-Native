

<?php
// Marqueur Nommé
//------------------------------------------------------------------------------
    $cnx=new PDO("mysql:host=localhost;dbname=GestionProjets",'root','');
    $query="insert into Employe  values(:Matricule,:Nom,:Prenom,:DateNaissance,:Salaire)";
    $pdost=$cnx->prepare($query);
    //Les variables
    $mat=5433;
    $nom='Tanjaoui';
    $pr='Ahmed';
    $dn='2001-5-7';
    $sal=11000.25;
    //bindParam : Liaison par Référence
    $pdost->bindParam(':Matricule',$mat);
    $pdost->bindParam(':Nom',$nom);
    $pdost->bindParam(':Prenom',$pr);
    $pdost->bindParam(':DateNaissance',$dn);
    $pdost->bindParam(':Salaire',$sal);
    //Exécution
    $pdost->execute();
?>

<?php
//--------------------------------------------------------------------------------
// Marqueur Interrogatif
    $cnx=new PDO("mysql:host=localhost;dbname=GestionProjets",'root','');
    $query="insert into Employe  values(?,?,?,?,?)";
    $pdost=$cnx->prepare($query);
    //Les variables
    $mat=7188;
    $nom='Safrioui';
    $pr='Mohamed';
    $dn='2001-2-1';
    $sal=8500.25;
    //bindParam : Liaison par Référence
    $pdost->bindParam(1,$mat);
    $pdost->bindParam(2,$nom);
    $pdost->bindParam(3,$pr);
    $pdost->bindParam(4,$dn);
    $pdost->bindParam(5,$sal);
    //Changer $sal
    $sal=12200.50;
    //Exécution
    $pdost->execute();
?>
//---------------------------------------------------------------------------