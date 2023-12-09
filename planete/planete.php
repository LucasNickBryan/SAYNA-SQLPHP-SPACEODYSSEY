<?php
$servname = "localhost";
$username = "root";
$password = "";
$dbname = "base";
$conn = new mysqli($servname, $username, $password, $dbname);

if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom_planete = $_POST["nom_planete"];
    $circonférence_km = $_POST["circonférence_km"];
    $distance_terre_km = $_POST["distance_terre_km"];
    $documentation = $_POST["documentation"];

    $sql = "INSERT INTO Planetes (nom_planete, circonférence_km, distance_terre_km, documentation) 
            VALUES ('$nom_planete', '$circonférence_km', '$distance_terre_km', '$documentation')";

    if ($conn->query($sql) === TRUE) {
        echo "Planète ajoutée avec succès";
    } else {
        echo "Erreur : " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();

header("Location: acceuil.php");

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Planète</title>
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

        input, textarea {
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
        <h2>Ajouter une Planète</h2>
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
            <label for="nom_planete">Nom de la Planète:</label>
            <input type="text" id="nom_planete" name="nom_planete" required>

            <label for="circonférence_km">Circonférence (km):</label>
            <input type="text" id="circonferénce_km" name="circonférence_km" required>

            <label for="distance_terre_km">Distance à la Terre (km):</label>
            <input type="text" id="distance_terre_km" name="distance_terre_km" required>

            <label for="documentation">Documentation:</label>
            <textarea id="documentation" name="documentation" required></textarea>

            <input type="submit" value="Ajouter la Planète">
        </form>
    </div>
</body>
</html>
