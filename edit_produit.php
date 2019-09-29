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
        <a class="nav-link" href="#">Features</a>
      </li>   
    </ul>
  </div>
</nav>
<div class="container">
   <div class="title">
        <h1>Modifier un produit</h1>
   </div>
   <div class="produit">
   <?php 
   $produit = new Produit($db);
  // $html = ''; 
    $id = $_GET['id'];
    $produitId = $produit->findById($id);
//    var_dump($produitId)
    foreach($produitId as $produit){
        ?>
    <form>
        <div class="form-group">
          <label for="exampleInputEmail1">Nom du produit</label>
          <input type="text" class="form-control" id="name"  placeholder="Enter nom" value ="<?php echo $produit['name']; ?>">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Image url</label>
          <input type="text" class="form-control" id="image" placeholder="image url" value ="<?php echo $produit['image']; ?>'">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Description</label>
          <input type="text" class="form-control" id="description" placeholder="description" value ="<?php echo $produit['description']; ?>">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Prix</label>
          <input type="text" class="form-control" id="price" placeholder="prix" value ="<?php echo $produit['price']; ?>">
        </div>
       
        <button id="update"  type="submit" class="btn btn-primary">Submit</button>
      </form>
      
      <?php
    }
   
   
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