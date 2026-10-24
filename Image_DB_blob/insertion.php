<?php
// Informations de connexion à la base de données
$servername = "localhost";
$username = "votre_utilisateur";
$password = "votre_mot_de_passe";
$dbname = "votre_base_de_donnees";

try {
    // Connexion à la base de données MySQL avec PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Chemin complet vers le fichier image à insérer
    $imagePath = "chemin/vers/votre/image.jpg"; // Modifier le chemin selon votre fichier
    
    // Lire le fichier image en tant que BLOB
    $imageBlob = file_get_contents($imagePath);
    
    // Préparer la requête SQL avec un paramètre pour le BLOB
    $stmt = $conn->prepare("INSERT INTO images (image_blob) VALUES (?)"); // Modifier selon votre schéma de base de données
    
    // Exécuter la requête en liant le BLOB en tant que paramètre
    $stmt->bindParam(1, $imageBlob, PDO::PARAM_LOB);
    $stmt->execute();
    
    echo "L'image a été insérée avec succès.";
} catch(PDOException $e) {
    echo "Une erreur s'est produite lors de l'insertion de l'image : " . $e->getMessage();
}

// Fermer la connexion à la base de données
$conn = null;
?>
