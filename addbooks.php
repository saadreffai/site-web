<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Livre</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: linear-gradient(to right,#331900 ,black); /* Fond blanc */
            color: #331900; /* Marron */
            margin: 0;
            padding: 0;
        }
        h2 {
            text-align: center;
            color: white; /* Marron */
        }
        form {
            max-width: 400px;
            margin: 0 auto;
            background: white; /* Blanc */
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #331900; /* Marron */
        }
        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #331900; /* Marron */
            border-radius: 4px;
            box-sizing: border-box;
            background-color: white; /* Blanc */
            color: #8b4513; /* Marron */
        }
        input[type="submit"] {
            background-color: #331900; /* Marron */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }
        input[type="submit"]:hover {
            background-color: #5e2605; /* Marron plus foncé au survol */
        }
    </style>
</head>
<body>
    <h2>Ajouter un Nouveau Livre</h2>
    <form id="myForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" >
        <label for="numero">Numéro :</label>
        <input type="text" id="numero" name="numero" required><br><br>

        <label for="titre">Titre :</label>
        <input type="text" id="titre" name="titre" required><br><br>

        <label for="auteur">Auteur :</label>
        <input type="text" id="auteur" name="auteur" required><br><br>

        <label for="genre_litteraire">Genre littéraire :</label>
        <input type="text" id="genre_litteraire" name="genre_litteraire" required><br><br>

        <input type="submit" value="Ajouter Livre">
    </form>

    <?php
    // Inclure le fichier de connexion à la base de données
    require_once "db.php";

    // Vérifier si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Vérifier si tous les champs sont présents
        if (isset($_POST['numero'], $_POST['titre'], $_POST['auteur'], $_POST['genre_litteraire'])) {
            // Nettoyer et valider les données du formulaire
            $numero = mysqli_real_escape_string($conn, $_POST['numero']);
            $titre = mysqli_real_escape_string($conn, $_POST['titre']);
            $auteur = mysqli_real_escape_string($conn, $_POST['auteur']);
            $genre_litteraire = mysqli_real_escape_string($conn, $_POST['genre_litteraire']);

            // Préparer la requête d'insertion
            $sql = "INSERT INTO livre (numero, titre, auteur, genre_litteraire) VALUES (?, ?, ?, ?)";
            
            // Préparer et exécuter la requête
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("isss", $numero, $titre, $auteur, $genre_litteraire);
            if ($stmt->execute()) {
                echo "Livre ajouté avec succès.";
            } else {
                echo "Erreur lors de l'ajout du livre : " . $conn->error;
            }

            // Fermer la requête préparée
            $stmt->close();
        } else {
            echo "Veuillez remplir tous les champs du formulaire.";
        }
    }

    // Fermer la connexion à la base de données
    mysqli_close($conn);
    ?>
</body>
</html>
