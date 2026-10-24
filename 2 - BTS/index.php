<?php
session_start();
if(isset($_SESSION["User"])){
    header("location:./Controllers/Emploi.php");
}

else{
    
    header("location:./Controllers/Login.php");
}


?>