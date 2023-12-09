*<?php
$servname = "localhost";
$username = "root";
$password = "";
$dbname = "base";
$conn = new mysqli($servname, $username, $password, $dbname);

if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

$sql = "SELECT * FROM missions";
$result = $conn->query($sql);

$missions = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $missions[] = $row;
    }
}

$conn->close();
?>


<table class="table">
    <thead>
        <tr>
            <th>id</th>
            <th>nom</th>
            <th>vaisseau</th>
            <th>Date de Début</th>
            <th>Date de Fin</th>
            <th>status</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($missions as $mission) : ?>
            <tr>
                <td><?php echo $mission['id_mission']; ?></td>
                <td><?php echo $mission['nom_mission']; ?></td>
                <td><?php echo $mission['id_vaisseau']; ?></td>
                <td><?php echo $mission['date_debut']; ?></td>
                <td><?php echo $mission['date_fin']; ?></td>
                <td><?php echo $mission['statut']; ?></td>
                <td>
                <a href="./missions/add_mission.php" title="Ajouter une mission">
                    <i class="fas fa-plus"></i>
                </a>

                <a href="./missions/edit_mission.php" title="Modifier la mission">
                    <i class="fas fa-edit"></i>
                </a>

                <a href="./missions/delete_mission.php" title="Supprimer la mission">
                    <i class="fas fa-trash"></i>
                </a>
                </td>
            </tr>

        <?php endforeach; ?>

    </tbody>
</table>