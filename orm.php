<?php

abstract class Orm{

    private $conn;

    public function __construct($db){
        $this->conn = $db;
    }

    //recuperation de tous les produits

    public function findAll(){
        //recupere le nom de la classe et le formate
        $table = strtolower(get_class($this));

        //Prepare la requete
        $query = "SELECT * FROM $table";
        $results = $this->conn->prepare($query);

        //Execution requete et stockage resultats dans une variable
        $results->execute();
        $resultats = $results->fetchAll(PDO::FETCH_ASSOC);
        return $resultats;
    }


    //recuperer le detail d'un produit

    public function findById($id){
        //recupere le nom de la classe et le formate
        $table = strtolower(get_class($this));

        //Prepare la requete
        $query = "SELECT * FROM $table WHERE id=$id";
        $results = $this->conn->prepare($query);

        //Execution requete et stockage resultats dans une variable
        $results->execute();
        $resultats = $results->fetchAll(PDO::FETCH_ASSOC);
        return $resultats;
    }


    //modification d'un produit

    public function updateById($id, $name, $description, $image, $price){
        //recupere le nom de la classe et le formate
        $table = strtolower(get_class($this));
        $id = $_POST['id'];
      //  var_dump($name);
        //Prepare la requete
        $req = "UPDATE produit SET name = '$name',
        description = '$description',
        image = '$image', 
        price = '$price'
         WHERE id = $id";
        $results = $this->conn->query($req);
        var_dump($results);
    }
}
