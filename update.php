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
// if (isset($_GET['id'])){

//     $id = $_GET['id'];
//     $stmt = $pdo->prepare("SELECT * FROM produits WHERE id = :id");
//     $stmt ->execute(['id' => $id]);
//     $produits = $stmt->fetch();
//     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//         // Récupérer les données du formulaire
//         $libelle = $_POST['libelle'];
//         $description = $_POST['description'];
//         $stmt = $pdo->prepare("UPDATE produits SET libelle=:libelle, description=:description WHERE id=:id");
//         $stmt->execute([
//             'libelle' => $libelle,
//             'description' => $description,
//             'id' => $id
//         ]);
//         // var_dump($stmt);
//         // exit;
        
//         echo "Produit modifié avec succès !";
//         header("Location: index_produit.php");
//     }
// }


$id=$_GET['id'];

    $sql = "SELECT * FROM produits WHERE id=?";
    $req = $pdo->prepare($sql);
    $req->execute([$id]);
    $donnees=$req->fetchAll();

if(isset($_POST['update'])){


    $libelle =htmlspecialchars($_POST['libelle']);
    $description =htmlspecialchars($_POST['description']);
    $sql = "UPDATE produits SET libelle=?, description=? WHERE id=?";
    $req = $pdo->prepare($sql);
    $req->execute([$libelle,$description,$id]);

    echo "Produit modifié avec succès !";
            header("Location: index_produit.php");

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
    <h1>Modify a product</h1>
    <form action="" method="POST">
        <?php foreach( $donnees as $donnee): ?>
        <label for="libelle">Libellé :</label>
        <input type="text" name="libelle" value="<?=($donnee['libelle']); ?>">
        <label for="desscription">Description :</label>
        <input type="text" name="description" value="<?=($donnee['description']); ?>">
        <input type="submit" name="update" value="modifier">
        <?php endforeach; ?>
    
    </form>
</body>
</html>