<?php
if (isset($_GET['id_mission']) && is_numeric($_GET['id_mission'])) {
    $id_mission = $_GET['id_mission'];

    // Connexion à la base de données
    $servname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "base";
    $conn = new mysqli($servname, $username, $password, $dbname);

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("La connexion a échoué : " . $conn->connect_error);
    }

    $sql = "SELECT * FROM missions WHERE id_mission = ?";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("i", $id_mission);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $mission_data = $result->fetch_assoc();

        $stmt->close();

        $conn->close();
    } else {
        header("Location: ../acceuil.php");
        exit();
    }
} else {
    header("Location: ../acceuil.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une Mission</title>
</head>
<body>
    <h2>Modifier une Mission</h2>
    <form action="update_mission.php" method="post">
        <input type="hidden" name="id_mission" value="<?php echo $id_mission; ?>">

        <label for="vaisseau">Vaisseau:</label>
        <input type="text" id="vaisseau" name="vaisseau" value="<?php echo $mission_data['vaisseau']; ?>" required>

        <label for="date_debut">Date de Début:</label>
        <input type="date" id="date_debut" name="date_debut" value="<?php echo $mission_data['date_debut']; ?>" required>

        <label for="date_fin">Date de Fin:</label>
        <input type="date" id="date_fin" name="date_fin" value="<?php echo $mission_data['date_fin']; ?>" required>

        <label for="statut">Statut:</label>
        <select id="statut" name="statut" required>
            <option value="en préparation" <?php if ($mission_data['statut'] == 'en préparation') echo 'selected'; ?>>En Préparation</option>
            <option value="en cours" <?php if ($mission_data['statut'] == 'en cours') echo 'selected'; ?>>En Cours</option>
            <option value="terminée" <?php if ($mission_data['statut'] == 'terminée') echo 'selected'; ?>>Terminée</option>
            <option value="abandonnée" <?php if ($mission_data['statut'] == 'abandonnée') echo 'selected'; ?>>Abandonnée</option>
        </select>

        <input type="submit" value="Modifier la Mission">
    </form>
</body>
</html>
