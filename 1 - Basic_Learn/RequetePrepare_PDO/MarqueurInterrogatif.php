<?php
    $cnx=new PDO("mysql:host=localhost;dbname=GestionProjets",'root','');
    $query="insert into Employe  values(?,?,?,?,?)";
    $pdost=$cnx->prepare($query);
    
    /*
    $pdost->execute(array(4455,'El Maliki','Fatima','1987-5-9',));
    */
    //ou
    $row=array(1199,'El Jabri','Samir','1987-5-9',3500);
    $pdost->execute($row);
?>