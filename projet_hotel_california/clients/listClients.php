<?php
require_once '../config/db_connect.php';

$conn = openDatabaseConnection();
$stmt = $conn->query("SELECT * FROM clients ORDER BY numero");
$clients = $stmt->fetchAll(PDO::FETCH_ASSOC);
closeDatabaseConnection($conn);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Liste des Clients</title>
</head>
<body>
    <h1>Liste des Clients</h1>
    <a href="createClient.php">Ajouter un client</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Télephone</th>
            <th>E-mail</th>
            <th>Actions</th>
        </tr>
        <?php foreach($clients as $client): ?>
        <tr>
            <td><?= $client['id'] ?></td>
            <td><?= $client['nom'] ?></td>
            <td><?= $client['Telephone'] ?></td>
            <td><?= $client['email'] ?></td>
            <td>
                <a href="edit.php?id=<?= $client['id'] ?>">Modifier</a>
                <a href="delete.php?id=<?= $client['id'] ?>" 
                    onclick="return confirm('Êtes-vous sûr?')">Supprimer
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>

