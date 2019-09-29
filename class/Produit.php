<?php

require 'orm.php';

class Produit extends Orm{
    private $id;
    private $name;
    private $description;
    private $image;
    private $price;

    public function getId(){
        return $this->id;
    }
    public function getName(){
        return $this->name;
    }
    public function getDescription(){
        return $this->description;
    }
    public function getImage(){
        return $this->image;
    }
    public function getPrice(){
        return $this->price;
    }

    public function setId($id) {
        $this->id = $id;
        return $this->id;
      }
    public function setName($name) {
        $this->name = $name;
        return $this->name;
      }
    public function setDescription($description) {
        $this->description = $description;
        return $this->description;
      }
    public function setImage($image) {
        $this->image = $image;
        return $this->image;
      }
    public function setPrice($price) {
        $this->price = $price;
        return $this->price;
      }
}