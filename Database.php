

 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
 </head>
 <body>

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
 </body>
 </html>