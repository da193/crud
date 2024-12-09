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
$sql = "SELECT * FROM produits ";
    $stmt = $pdo->query($sql);
    $produits = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Listes des Produits</h1>
    <a href="Create.php">Ajouter un nouveau produit</a>
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
        <?php foreach ($produits as $produit): ?>
            <tr>
                <td><?= htmlspecialchars($produit['id']) ?></td>
                <td><?= htmlspecialchars($produit['libelle']) ?></td>
                <td><?= htmlspecialchars($produit['description']) ?></td>
                <td>
                    <a href="update.php?id=<?= $produit['id'] ?>">Modifier</a>
                    <a href="delete.php?id=<?= $produit['id'] ?>">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>

    </table>
 <a href="">Produit(s)</a>
 <a href="">Composant(s)</a>
 <a href="">Nomenclature(s)</a>
</body>
</html>