      <?php
    $cnx=new PDO("mysql:host=localhost;dbname=GestionProjets",'root','');
    $query="insert into Employe  values(:Matricule,:Nom,:Prenom,:DateNaissance,:Salaire)";
    $pdost=$cnx->prepare($query);
    
    /*
    $pdost->execute(array(
        ':Matricule'=>4455,
        ':Nom'=>'El Maliki',
        ':Prenom'=>'Fatima',
        ':DateNaissance'=>'1987-5-9',
        ':Salaire'=>8000
    ));
    */
    //ou
    $row=array(
        ':Matricule'=>1199,
        ':Nom'=>'El Jabri',
        ':Prenom'=>'Samir',
        ':DateNaissance'=>'1987-5-9',
        ':Salaire'=>3500
    );
    $pdost->execute($row);
?>