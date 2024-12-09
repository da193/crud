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
?>

 <h1> Ajouter un Produit</h1>
  <form action="Post">
    <label for="lebelle">Libellé</label>
    <input type="text" name= "libelle" id="libelle">
  </form>
  <input type="submit" value="Ajouter">
<!-- <a href="add_component">Ajouter</a><br>h -->
<a href="index_produit.php">Retourner à la listes des produits</a>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $libelle = $_POST['libelle'];
  $description = $_POST['description'];

  //  insert
  // $sql = 'INSERT INTO produits ( libelle, description) VALUES (?,?)';
  //       $stmt = $pdo ->prepare ($sql);

  $stmt = $pdo ->prepare("INSERT INTO produits ( libelle, description) VALUES (:libelle, :description)");
  $stmt ->bindParam(':libelle' , $libelle );
  $stmt ->bindParam(':description', $description);
  if ($stmt ->execute()){
    echo 'new product added successfully';
  } else{
    echo 'Erreur :' . $stmt->error;
  };
}
