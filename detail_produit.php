<?php
require 'config/database.php';
require 'class/Produit.php';
//connexion base de données
$database = new Database();
$db = $database->getConnection();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/app.css">
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-info">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="admin.php">Admin</a>
      </li>   
    </ul>
  </div>
</nav>
<div class="container">
   <div class="title">
        <h1>Detail produit</h1>
   </div>
   <div class="produit">
   <?php
   //methode findById pour recuperer un produit
   $produit = new Produit($db);
   $html = ''; 
   $id = $_GET['id'];
   $produitId = $produit->findById($id);
   // var_dump($produitId);
    foreach($produitId as $produit){
    $html .= '<h2>'.$produit['name'].'</h2>';
    $html .= '<img  src="'.$produit['image'].'" class="image" alt="...">';
    $html .= '<p><h3>Description:</h3> </br>'.$produit['description'].'</p>';
    $html .= '<h4>Prix: '.$produit['price'].' Euro</h4>';
    }
    //affichage du produit
    echo $html;
   ?>
   </div>
   <div class="button">
   <a href="index.php" class="btn btn-primary">Retour a l'accueil</a>
   </div>
</div>
<footer class="footer">
 <h2>Merci de nous faire confiance !!</h2>
 <p>Ce site a été créer pour nos chers clients qui nous font confiance<p>
 <img class="logo" src="https://cdn.worldvectorlogo.com/logos/php-1.svg" alt=""/>  
</footer>
<script src="js/jquery-3.4.1.js"></script>
<script src="js/app.js"></script>
</body>
</html>