<?php
if(isset($_POST['nom']) && isset($_POST['prenom']))
    {
        $fullname=$_POST['nom']." ".$_POST['prenom'];
        echo $fullname;
    }


?>