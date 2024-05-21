<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer un Livre</title>
    <style>
        body {
            background-color: #fff; /* blanc */
            color: #4d3319; /* marron */
            font-family: Arial, sans-serif;
        }

        h2 {
            color: #4d3319; /* marron */
        }

        form {
            max-width: 400px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 20px;
            border: 1px solid #4d3319; /* marron */
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4d3319; /* marron */
            color: #fff; /* blanc */
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #63452b; /* marron foncé */
        }
    </style>
</head>
<body>
    <form action="deletebooks.php" method="post">
        <label for="numero">Numéro du Livre à Supprimer :</label>
        <input type="text" id="numero" name="numero" required><br><br>

        <input type="submit" value="Supprimer Livre">
    </form>

    <?php
    // Inclure le fichier de connexion à la base de données
    require_once "db.php";

    // Vérifier si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Vérifier si le numéro du livre à supprimer est présent
        if (isset($_POST['numero'])) {
            // Récupérer le numéro du livre à supprimer
            $numero = $_POST['numero'];

            // Préparer la requête de suppression
            $sql = "DELETE FROM livre WHERE numero = ?";
            
            // Préparer et exécuter la requête
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $numero);
            $stmt->execute();

            // Vérifier si la suppression a réussi
            if ($stmt->affected_rows > 0) {
                echo "Livre supprimé avec succès.";
            } else {
                echo "Aucun livre trouvé avec ce numéro.";
            }

            // Fermer la requête préparée
            $stmt->close();
        } else {
            echo "Veuillez entrer le numéro du livre à supprimer.";
        }
    }

    // Fermer la connexion à la base de données
    mysqli_close($conn);
    ?>
</body>
</html>
