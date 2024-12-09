<?php
$dsn = 'mysql:host=localhost;dbname=bureau_etude;charset=utf8';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo 'Une erreur est survenue : '.$e->getMessage();
    exit;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $stmt = $pdo->prepare("DELETE FROM produits WHERE id = :id");
    $stmt->execute(['id' => $id]);
    
    echo "Produit supprimé avec succès !";
    header("Location: index.php"); 
    exit;
} else {
    echo "Aucun produit sélectionné";- 
    exit;
}
?>