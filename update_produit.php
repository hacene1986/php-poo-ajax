<?php
require 'config/database.php';
require 'class/Produit.php';
//connexion base de données
$database = new Database();
$db = $database->getConnection();
$produit = new Produit($db);
$name = $_POST['name'];
//var_dump($name);
 $image = $_POST['image'];
// var_dump($image);
$description = $_POST['description'];
$price = $_POST['price'];
 $id = $_POST['id'];
 $pro = $produit->updateById($id, $name, $description, $image, $price);
 var_dump($pro);


?>