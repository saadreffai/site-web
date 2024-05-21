<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "form";

// Création de la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Vérification des identifiants de connexion
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];

    // Requête SQL pour vérifier les identifiants dans la base de données
    $sql = "SELECT id FROM utilisateurs WHERE email = '$email' AND mdp = '$mdp'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Identifiants corrects, rediriger vers index.html
        header("Location: index.html");
        exit();
    } else {
        // Identifiants incorrects, afficher un message d'erreur ou rediriger vers une page d'erreur
        echo "Identifiants incorrects. Veuillez réessayer.";
    }
}

// Fermer la connexion à la base de données
$conn->close();
?>
