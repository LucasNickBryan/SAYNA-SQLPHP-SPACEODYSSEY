<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Liste des Astronautes</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>

<body>
    <h1>Liste des Astronautes</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>État de santé</th>
                <th>Taille</th>
                <th>Poids</th>
            </tr>
        </thead>
        <tbody>
            <?php
            try {
                $bdd = new PDO('mysql:host=localhost;dbname=evaluation2;charset=utf8', 'root', '');
                $requete = $bdd->query("SELECT * FROM Astronautes");

                // Affichage des résultats
                while ($resultat = $requete->fetch()) {
                    echo "<tr>";
                    echo "<td>" . $resultat["id_astronaute"] . "</td>";
                    echo "<td>" . $resultat["nom_astronaute"] . "</td>";
                    echo "<td>" . $resultat["etat_sante"] . "</td>";
                    echo "<td>" . $resultat["taille"] . "</td>";
                    echo "<td>" . $resultat["poids"] . "</td>";
                    echo "</tr>";
                }

            } catch (PDOException $e) {
                die('Erreur : ' . $e->getMessage());
            }
            ?>
        </tbody>
    </table>
</body>

</html>
