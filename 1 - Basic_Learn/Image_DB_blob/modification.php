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
    
    // ID de l'image à modifier
    $imageId = 1; // Modifier selon vos besoins
    
    // Chemin complet vers le nouveau fichier image
    $newImagePath = "chemin/vers/votre/nouvelle_image.jpg"; // Modifier le chemin selon votre fichier
    
    // Lire le nouveau fichier image en tant que BLOB
    $newImageBlob = file_get_contents($newImagePath);
    
    // Préparer la requête SQL de mise à jour avec un paramètre pour le BLOB
    $stmt = $conn->prepare("UPDATE images SET image_blob = ? WHERE id = ?"); // Modifier selon votre schéma de base de données
    
    // Exécuter la requête en liant le BLOB et l'ID en tant que paramètres
    $stmt->bindParam(1, $newImageBlob, PDO::PARAM_LOB);
    $stmt->bindParam(2, $imageId, PDO::PARAM_INT);
    $stmt->execute();
    
    echo "L'image a été modifiée avec succès.";
} catch(PDOException $e) {
    echo "Une erreur s'est produite lors de la modification de l'image : " . $e->getMessage();
}

// Fermer la connexion à la base de données
$conn = null;
?>
