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
$sql = "SELECT * FROM nomencloture";
    $stmt = $pdo->query($sql);
    $nomens = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Listes des Nomenclature</h1>
    <a href="Create.php">Ajouter une nouvelle nomenclature</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>libelle</th>
                <th>description</th>
                <th>actions</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($nomens as $nomen): ?>
            <tr>
                <td><?= htmlspecialchars($nomen['id_produit']) ?></td>
                <td><?= htmlspecialchars($nomen['id_composaant']) ?></td>
                <td><?= htmlspecialchars($nomen['quantité']) ?></td>
                <td>
                    <a href="update_nomen.php?id=<?= $nomen['id_produit'] ?>">Modifier</a>
                    <a href="delete.php?id=<?= $nomen['id_produit'] ?>">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>

    </table>



</body>
</html>