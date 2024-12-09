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



$id=$_GET['id'];
$sql = 'SELECT * FROM nomencloture WHERE id=?';
$req = $pdo->prepare($sql);
$req ->execute([$id]);
$files = $req->fetchAll();



if(isset($_POST['update'])){
$libelle = htmlspecialchars($_POST['libelle']);
$description = htmlspecialchars($_POST['description']);
$sql = 'UPDATE nomencloture SET libelle=?, description=? WHERE id=?';
$req=$pdo->prepare($sql);
$req->execute([$libelle, $description]);
echo 'nomencloture modifier avec succes';
header("Location: index_nomen.php");

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Modifier une nomencloture
    </h1>
    <form action="Post">
    <?foreach($files as $file): ?>
        <label for="libelle">Libellé :</label>
        <input type="text" name="libelle" value="<?= ($file['libelle']); ?>">
        <label for="desscription">Description :</label>
        <input type="text" name="description" value="<?= ($file['description']); ?>">
        <input type="submit" name="update" value="modifier">
        <?endforeach?>n
    </form>
</body>
</html>