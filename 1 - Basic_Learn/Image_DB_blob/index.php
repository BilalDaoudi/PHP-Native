<?php
// Informations de connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Gestion_decole";

// Connexion à la base de données MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

// ID de l'image que vous souhaitez afficher
$imageId = 2; // Modifier selon vos besoins

// Requête SQL pour récupérer l'image en tant que BLOB
$sql = "SELECT imageE FROM Etudiant WHERE Num_Inscription = $imageId"; // Modifier la requête selon votre schéma de base de données
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Récupérer le BLOB de la réponse de la requête
    $row = $result->fetch_assoc();
    $imageBlob = $row["imageE"];
    

    // Convertir le BLOB en une chaîne encodée en base64
    $imageBase64 = base64_encode($imageBlob);

    // Affichage de l'image dans la balise <img>
    echo '<img src="data:image/jpeg;base64,' . $imageBase64 . '" alt="Image">';
} else {
    echo "Aucune image trouvée.";
}

// Fermer la connexion à la base de données
$conn->close();


?>