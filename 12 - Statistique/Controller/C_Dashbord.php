<?php
session_start();


$conn = mysqli_connect("localhost", "root", "12345678", "Statistique");



$sql = "SELECT c.Cin,c.Nom , count(*) AS nbVoiture
FROM Client c
INNER JOIN Cars ca using(cin) 
GROUP BY c.Cin;";
        
        $result = mysqli_query($conn, $sql);

$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}


require "../View/V_Dashbord.php";
?>