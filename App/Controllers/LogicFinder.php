<?php namespace App\Controllers;

require_once "App/start.php";


/* class that finds and controls the product classes */
class LogicFinder{

    public $type;

    public function findLogic(){
        /* get data submitted, use type-switcher and array to figure out what product type it is 
            then instance a class and use that class's function to send data to db*/
        if(isset($_POST['submit'])){

            $this->type = filter_input(INPUT_POST, 'type-switcher');

            $logicIndex = [
                1 => 'App\Models\DvdLogic',
                2 => 'App\Models\BookLogic',
                3 => 'App\Models\FurnitureLogic',
            ];

            $logicClass = $logicIndex[$this->type];

            $logic = new $logicClass();

            $logic->insertData();

        }

    }

    public function dataRenderer(){

        $typeDict = [
            1 => "size",
            2 => "weight",
            3 => "dimensions",
            "size" => "MB",
            "weight" => "KG",
            "dimensions" => "CM"
        ];

        $connect = new Connector;

        $sql = "SELECT * FROM `products` ORDER BY 'id'";
        $result = mysqli_query($connect->connect(), $sql);
        $products = mysqli_fetch_all($result, MYSQLI_ASSOC);

        foreach($products as $product) {

            ?>
            <div class="product-wrapper">
                <div class="delete-checkbox-wrapper">
                        <input type="checkbox" form="delete-form" name="checkbox[]" value="<?php echo htmlspecialchars($product['id']); ?>" class="delete-checkbox">
                </div>
                <div class="list-item"> <?php echo htmlspecialchars($product['sku']); ?> </div>
                <div class="list-item"> <?php echo htmlspecialchars($product['name']); ?></div>
                <div class="list-item"> <?php echo htmlspecialchars($product['price']); ?>$</div>
                <div class="list-item"> 
                    <?php echo strtoupper($typeDict[$product['type']]); ?> 
                    <?php echo htmlspecialchars($product[$typeDict[$product['type']]]); ?> 
                    <?php echo $typeDict[$typeDict[$product['type']]] ?></div>
            </div>
        <?php }
    } 





        /* go through each product class and run that class's render function to display db info */ 
/*         $logicIndex = [
            1 => 'App\Models\DvdLogic',
            2 => 'App\Models\BookLogic',
            3 => 'App\Models\FurnitureLogic',
        ];

        foreach($logicIndex as $logicClass){
            $logic = new $logicClass;
            $logic->renderData();
        } 
    } */

    public function dataDeleter(){

        if(isset($_POST['delete'])){
            $connect = new Connector;

            if(empty($_POST['checkbox'])){
                return;
            }else {
                $checkbox = $_POST['checkbox'];
                $count = count($checkbox);
            
                for($i=0;$i<$count;$i++){
            
                    if(!empty($checkbox[$i])){ 
                
                        $id = mysqli_real_escape_string($connect->connect(),$checkbox[$i]);
                        mysqli_query($connect->connect(),"DELETE FROM products WHERE id = '$id'");
                    }
                }
            } 
        }
    }
}