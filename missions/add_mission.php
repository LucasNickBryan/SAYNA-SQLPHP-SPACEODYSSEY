<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_vaisseau = $_POST["vaisseau"];
    $date_debut = $_POST["date_debut"];
    $date_fin = $_POST["date_fin"];
    $statut = $_POST["statut"];

    $servname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "base";
    $conn = new mysqli($servname, $username, $password, $dbname);

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("La connexion a échoué : " . $conn->connect_error);
    }

    // Insérer la nouvelle mission dans la base de données
    $sql = "INSERT INTO missions (id_vaisseau, date_debut, date_fin, statut) VALUES ('$id_vaisseau', '$date_debut', '$date_fin', '$statut')";
    if ($conn->query($sql) === TRUE) {
        // Redirection vers la page d'accueil après l'ajout de la mission
        header("Location: ../acceuil.php");
        exit;
    } else {
        echo "Erreur : " . $sql . "<br>" . $conn->error;
    }

    // Fermer la connexion à la base de données
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Mission</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 500px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 8px;
        }

        input, select {
            margin-bottom: 16px;
            padding: 8px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            border: none;
            padding: 10px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Ajouter une Mission</h2>
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
         
            <label for="vaisseau">Vaisseau:</label>
            <input type="text" id="vaisseau" name="vaisseau" required>

            <label for="date_debut">Date de Début:</label>
            <input type="date" id="date_debut" name="date_debut" required>

            <label for="date_fin">Date de Fin:</label>
            <input type="date" id="date_fin" name="date_fin" required>

            <label for="statut">Statut:</label>
            <select id="statut" name="statut" required>
                <option value="en préparation">En Préparation</option>
                <option value="en cours">En Cours</option>
                <option value="terminée">Terminée</option>
                <option value="abandonnée">Abandonnée</option>
            </select>

            <input type="submit" value="Ajouter la Mission">
        </form>
    </div>
</body>
</html>
