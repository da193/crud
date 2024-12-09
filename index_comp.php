<?php

$dsn = 'mysql:host=localhost;dbname=bureau_etude;charset=utf8';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);

    
} catch(PDOException $e) {
    echo 'Une erreur est survenue : '.$e->getMessage();
}
$sql = "SELECT * FROM composants";
    $stmt = $pdo->query($sql);
    $components = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Listes des Composant</h1>

    <a href="add_component">Ajouter un nouveau composant</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Libelle</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($components as $component): ?>
            <tr>
                <td><?= htmlspecialchars($component['id']) ?></td>
                <td><?= htmlspecialchars($component['libelle']) ?></td>
                <td><?= htmlspecialchars($component['description']) ?></td>
                <td>
                    <a href="update.php?id=<?= $component['id'] ?>">Modifier</a>
                    <a href="delete.php?id=<?= $component['id'] ?>">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>