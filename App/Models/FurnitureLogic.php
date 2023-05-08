<?php namespace App\Models;

use App\Controllers\Connector as Connector;

class FurnitureLogic extends ProductLogic {
    private $specs;

    /*function to grab info from POST */
    public function setValues() {
        if(isset($_POST['submit'])){
            $this->setTable();
            $this->setType();
            $this->setSku();
            $this->setName();
            $this->setPrice();
            $this->setSpecs();
        }
    }

    /* function that calls the POST getter and sends info to database, then, send user to main page  */
    public function insertData() {
        $this->setValues();
        $table = $this->getTable();

        $connect = new Connector;
        $conn = $connect->connect();
    
        $sku = $this->getSku();
        $sql = "SELECT `sku` FROM `$table` WHERE sku = '$sku'";
        $findDuplicate = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($findDuplicate);

        if($count > 0){
            return;
        };

        $findDuplicate->close();

        $connect = new Connector;
        $conn = $connect->connect();

        $table = $this->getTable();

        $idParam = 0;
        $typeParam = $this->getType();
        $skuParam = $this->getSku();
        $nameParam = $this->getName();
        $priceParam = $this->getPrice();
        $specsParam = $this->getSpecs();

        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        $stmt = $conn->prepare("INSERT INTO `$table`(`id`, `type`, `sku`, `name`, `price`, `dimensions`) 
        VALUES (?,?,?,?,?,?)");

        $stmt->bind_param("iissis", $idParam,$typeParam, $skuParam, $nameParam, $priceParam, $specsParam );
        $stmt->execute();

        $this->redirectToMainPage();
    }

    public function getSpecs(){
        return $this->specs;
    }
    
    public function setSpecs(){
        $height = filter_input(INPUT_POST, 'height');
        $width = filter_input(INPUT_POST, 'width');
        $length = filter_input(INPUT_POST, 'length');

        $this->specs = $height . "x" . $width . "x" . $length;
    }
}