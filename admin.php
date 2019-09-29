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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js">
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
        <h1>Liste de mes produits</h1>
   </div>
   <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Nom</th>
      <th scope="col">Image url</th>
      <th scope="col">Description</th>
      <th scope="col">Prix</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
     <?php 
         //methode findById pour recuperer un produit
        $produit = new Produit($db);
        // $id = $_GET['id'];
        $produitId = $produit->findAll();
   // var_dump($produitId);
    foreach($produitId as $produit){
      ?>
      <tr id="<?php echo $produit['id']; ?>">
        <td data-target="name"><?php echo $produit['name']; ?></td>
        <td data-target="image"><?php echo $produit['image']; ?></td>
        <td data-target="description"><?php echo $produit['description']; ?></td>
        <td data-target="price"><?php echo $produit['price']; ?></td>
        <td><a href="#" data-role="update" data-id="<?php echo $produit['id']; ?>">Modifier</a></td>
      </tr>
      <?php
    };
     ?>
  </tbody>
</table>
<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> -->
</div>


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modification</h4><br>
        
      </div>
      <p id="message"></p>
      <div class="modal-body">
      <form method="post">
      <div class="form-group">
         <label for="name">Nom</label>
         <input type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="nom produit">
      </div>
      <div class="form-group">
         <label for="description">Description</label>
         <input type="text" class="form-control" id="description" placeholder="description">
      </div>
      <div class="form-group">
         <label for="image">Image Url</label>
         <input type="text" class="form-control" id="image" placeholder="Image">
      </div>
      <div class="form-group">
         <label for="price">Prix</label>
         <input type="number" class="form-control" id="price" placeholder="prix">
      </div>
      <input type="hidden" class="form-control" id="produitId">
      </div>
      <div class="modal-footer">
      <a href="#" id="save" class="btn btn-primary pull-right">Modifier</a>
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>

  </div>
</div>
<footer class="footer">
 <h2>Merci de nous faire confiance !!</h2>
 <p>Ce site a été créer pour nos chers clients qui nous font confiance<p>
 <img class="logo" src="https://cdn.worldvectorlogo.com/logos/php-1.svg" alt=""/>  
  </footer>
<script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="app.js"></script>
</body>
</html>