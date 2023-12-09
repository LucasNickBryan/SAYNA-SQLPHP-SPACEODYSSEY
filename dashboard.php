<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex; 
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .img-container {
            width: 40%;
            float: left;
            margin-right: 20px;
        }

        .table-container {
            width: 60%;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table th, .table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        .table th {
            background-color: #f2f2f2;
        }

        .table tbody tr:hover {
            background-color: #f5f5f5;
        }

        .table ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .table li {
            margin-bottom: 5px;
        }


        h2 {
            color: #333;
        }

        img {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="img-container">
            <?php include './include/apod.php';
            ?>
        </div>
        
        <div class="card">
    <div class="card-header">
        <h3 class="card-title">Assignations Mission-Astronaute</h3>
    </div>

    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Assignation</th>
                    <th>ID Mission</th>
                    <th>ID Astronaute</th>
                </tr>
            </thead>
            <tbody>
                <?php
                try {
                    $bdd = new PDO('mysql:host=localhost;dbname=evaluation2;charset=utf8', 'root', '');
                    $requete = $bdd->query("SELECT * FROM Assignation_Mission_Astronaute");

                    while ($resultat = $requete->fetch()) {
                        echo "<tr>";
                        echo "<td>" . $resultat["id_assignation"] . "</td>";
                        echo "<td>" . $resultat["id_mission"] . "</td>";
                        echo "<td>" . $resultat["id_astronaute"] . "</td>";
                        echo "</tr>";
                    }

                } catch (PDOException $e) {
                    die('Erreur : ' . $e->getMessage());
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
    </div>
</body>
</html>