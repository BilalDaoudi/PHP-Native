<?php
$cnx = mysqli_connect("localhost","root","","GestionProjets");
/*
// Add ---------------------------------------------------------------------------------------------------
if (mysqli_query($cnx,"insert into employe values(2000,'Daoudi','Mohamed','1972-11-2',12000)")){
    echo "<script> alert('add') </script>";
}

// Update ---------------------------------------------------------------------------------------------------
if (mysqli_query($cnx,"update employe set Nom = 'Dawdi' where matricule = 2000")){
    echo "<script> alert('update') </script>";
}

// Delete ---------------------------------------------------------------------------------------------------
if (mysqli_query($cnx,"delete from employe where matricule = 2000")){
    echo "<script> alert('delete') </script>";
}
*/

// Select ---------------------------------------------------------------------------------------------------
/*
$T_Employes = mysqli_query($cnx,"select * from employe")->fetch_all();
$T_Employes = mysqli_query($cnx,"select * from employe")->fetch_all(MYSQLI_ASSOC);
$T_Employes = mysqli_query($cnx,"select * from employe")->fetch_all(MYSQLI_BOTH);
foreach($T_Employes as $employe){
    print_r($employe);
    echo "<br><br>";
}*/



// Requête Prepare ------------------------------------------------------------------------------------------------
/*
$T_Categorie = mysqli_query($cnx,"select CodeCategorie from CategorieProjet")->fetch_all();
foreach($T_Categorie as $cat){
    print_r($cat);
    echo "<br><br>";
}
*/

/*
$nom = "badi";
$req_pre = "select * from Employe where Nom = ?";
$stm = mysqli_prepare($cnx,$req_pre);
$stm->bind_param("s",$nom);
$stm->execute();
$rows = $stm->get_result()->fetch_assoc();


foreach($rows as $r){
    print_r($r);
    echo "<br><br>";
}
*/





?>