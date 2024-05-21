<?php

// Paramètres de connexion à la base de données
$host = 'localhost'; // hôte de la base de données
$user = 'root'; // nom d'utilisateur de la base de données
$password = 'root'; // mot de passe de la base de données
$database = 'biblio'; // nom de la base de données

// Connexion à la base de données
$conn = new mysqli($host, $user, $password, $database);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion à la base de données a échoué : " . $conn->connect_error);
}

echo "";

// Vous pouvez utiliser $conn pour exécuter des requêtes SQL maintenant

?>