<?php namespace App\Models;

/* abstract product logic, every product class extends this */
abstract class ProductLogic {

    private $sku;
    private $name;
    private $price;
    private $type;

    private $table;

    public static function  redirectToaddPage(){
        header("Location: add-product.php");
    }

    public static function  redirectToMainPage(){
        header("Location: index.php");
    }

    public function setValues(){
        if(isset($_POST['submit'])){
            $this->setTable();
            $this->setType();
            $this->setSku();
            $this->setName();
            $this->setPrice();
            $this->setSpecs();
        }
    }

    abstract public function insertData();

    /* Getters */
    public function getSku(){
        return $this->sku;
    }

    public function getType(){
        return $this->type;
    }

    public function getName(){
        return $this->name;

    }

    public function getPrice(){
        return $this->price;

    }

    public function getTable(){
        return $this->table;

    }

    abstract public function getSpecs();

    /* Setters */
    public function setType(){
        $this->type = filter_input(INPUT_POST, 'type-switcher');
    }

    public function setSku(){
        $this->sku = filter_input(INPUT_POST, 'sku');
    }
    
    public function setName(){
        $this->name = filter_input(INPUT_POST, 'name');

    }
    
    public function setPrice(){
        $this->price = filter_input(INPUT_POST, 'price');

    }
    
    public function setTable(){
        $this->table = "products";

    }

    abstract public function setSpecs();

}