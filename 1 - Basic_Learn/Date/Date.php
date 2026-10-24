<?php


// on test avec Button pour saisir un date
if (isset($_POST['btn'])) {
    $date = $_POST["date"];

    // Date Time Système =============================================================================================================================
    $dt9 = new DateTime();
    // ou 
    //$dt9 = date("Y-m-d h:i:s");
    //print_r($dt9);

    // seulement Date Système  
    $dt10 = date("Y-m-d");
    //print_r($dt10);

    // Pour Creer Date Time=========================================================================================================================
    $dt1 = new DateTime($date);
    // ou
    $dt5 = date_create_from_format("Y-m-d", "2020-06-9");
    //print_r($dt5);
    //print_r($dt1);

    // Pour Affiche date dans DateTime  =============================================================================================================
    $dt2 = date_format($dt1, "Y-m-d");
    // ou
    $dt3 = $dt1->format("Y/m/d");
    //echo $dt2;
    //echo $dt3;


    // Pour Comparer Avec un autre date on utilise diff(datetime) retourn un objet ====================================================================
    $dt4 = new DateTime("2022-02-9");
    //print_r($dt1->diff($dt4));


    // Difference entre deux date on utilise diff(datetime) retourn un objet ===========================================================================
    $dt6 = date_create_from_format("Y-m-d", "2020-06-9");
    $dt7 = date_create_from_format("Y-m-d", "2002-06-9");
    $dt8 = date_diff($dt6, $dt7);
    //print_r($dt8);


    // Pour Modifier time dans DateTime ==============================================================================================================
    $dt1->setTime(23, 30, 50, 1000);
    //print_r($dt1);


    // Pour Valide Une Date if existe ou non on utilise checkdate(mois,jour,annee)   ==============================================================================================================
    // Attention c'est date non valide
    //$existe = checkdate(3, 32, 2002);
    $existe = checkdate(3, 30, 2002);
    if ($existe == 1) {
        echo "date est validé";
    } else {
        echo "date est non validé";
    }
}
?>
<form action="" method="post">
    <input type="text" name="date" placeholder="aaaa/mm/jj">
    <!-- <input type="date" name="date" > -->
    <input type="submit" value="Envoyer" name="btn">
</form>