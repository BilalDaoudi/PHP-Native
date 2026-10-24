<?php
if(isset($_GET['nom']) && isset($_GET['prenom']))
{
    $fullname=$_GET['nom']." ".$_GET['prenom'];
    echo $fullname;
}


?>