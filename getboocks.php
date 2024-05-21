<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Livres</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: white; /* Fond blanc */
            color: #333; /* Texte noir */
            text-align: center; /* Centrer le contenu de la page */
        }

        /* Table styles */
        table {
            margin: 30px auto; /* Centrer le tableau avec un peu d'espace en haut */
            width: 80%; /* Largeur du tableau */
            border-collapse: collapse;
            border: 6px solid #8B4513; /* Bordures épaisses en marron */
        }

        table th,
        table td {
            padding: 15px; /* Augmenter la taille de la cellule pour un meilleur espacement */
            text-align: left;
            border: 3px solid #8B4513; /* Bordures de cellule épaisses en marron */
            font-size: 18px; /* Taille de police agrandie */
        }

        table th {
            background-color: white; /* Fond blanc pour l'en-tête */
            color: #8B4513; /* Texte marron pour l'en-tête */
        }

        /* Table hover effect */
        table tr:hover {
            background-color: #C06B3E; /* Gris clair pour l'effet au survol */
        }

        /* Heading styles */
        h1 {
            margin-top: 30px;
            color: #8B4513; /* Titre en marron */
            font-size: 28px; /* Taille de police agrandie pour le titre */
            font-weight: bold; /* En gras */
        }

        /* Custom text styles */
        .custom-text {
            font-size: 24px; /* Taille de police agrandie */
            color: #8B4513; /* Couleur marron */
            margin-bottom: 20px; /* Marge inférieure pour séparation */
        }
    </style>
</head>
<body>
    <p class="custom-text">Explorez notre collection de livres :</p>

    <?php
    // Inclure le fichier de connexion à la base de données
    require_once "db.php";

    // Requête pour sélectionner toutes les lignes de la table "livre"
    $sql = "SELECT * FROM livre";
    $result = mysqli_query($conn, $sql);

    // Vérifier s'il y a des résultats
    if (mysqli_num_rows($result) > 0) {
        // Afficher les résultats dans un tableau HTML
        echo "<table>";
        echo "<tr><th>Numéro</th><th>Titre</th><th>Auteur</th><th>Genre littéraire</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["numero"] . "</td>";
            echo "<td>" . $row["titre"] . "</td>";
            echo "<td>" . $row["auteur"] . "</td>";
            echo "<td>" . $row["genre_litteraire"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Aucun résultat trouvé";
    }

    // Fermer la connexion à la base de données
    mysqli_close($conn);
    ?>
</body>
</html>
