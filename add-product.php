<?php

    use App\Controllers\LogicFinder;

    require_once 'App/start.php';

    $sendData = new LogicFinder();
    $sendData->findLogic();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="typeSwitcher.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="style.css">
    <title>Add product</title>
</head>
<body>
    <div id="navbar-wrapper">
        <div id="navbar">
            <h1 id="add-title">Product Add</h1>
            <div id="buttons-wrapper">
                <button type="submit" form="product_form" name="submit" class="submit-button">Save</button>
                <a href="index.php" id="cancel-button">Cancel</a>
            </div>
        </div>
    </div>
        <div class="form-wrapper">
            <form action="" method="POST" id="product_form">
                <div class="row">
                    <label class="form-label">SKU</label>
                    <input required type="text" class="form-item" id="sku" name="sku" placeholder="Product SKU" />
                </div>
                <div class="row">
                    <label class="form-label">Name</label>
                    <input required type="text" class="form-item" id="name" name="name" placeholder="Product Name" />
                </div>
                <div class="row">
                    <label class="form-label">Price ($)</label>
                    <input required type="number" class="form-item" id="price" name="price" placeholder="Product Price" />
                </div>

                <div class="type-switcher-wrapper row">
                    Type Switcher
                    <br/>
                    <select id="productType" name="type-switcher" onchange=typeSwitcher()>

                        <option value="1" selected="selected">DVD</option>
                        <option value="2" selected="selected">Book</option>
                        <option value="3" selected="selected">Furniture</option>

                    </select>
                </div>
                
                
                <div class="productInput" id="DVD" style="visibility:hidden" >
                    <div class="row">
                        <label class="form-label">Size (mb)</label>
                        <input type="number" class="form-item" id="size" name="size" placeholder="Please, provide size" />
                    </div>
                </div>

                <div class="productInput" id="Book" style="visibility:hidden">
                    <div class="row">
                        <label class="form-label">Weight (kg)</label>
                        <input type="number" class="form-item" id="weight" name="weight"  placeholder="Please, provide weight" />
                    </div>
                </div>

                <div class="productInput" id="Furniture" style="visibility:visible" >
                    <div class="row">
                        <label class="form-label">Height (cm)</label>
                        <input required type="number" class="form-item" id="height" name="height"  placeholder="Please, provide height" />
                    </div>

                    <div class="row">
                        <label class="form-label">Width (cm)</label>
                        <input required type="number" class="form-item" id="width" name="width" placeholder="Please, provide width" />
                    </div>

                    <div class="row">
                        <label class="form-label">Length (cm)</label>
                        <input required type="number" class="form-item" id="length" name="length" placeholder="Please, provide length" />
                    </div>
                </div>


            </form>
        </div>
    <footer id="footnote-wrapper">
        SCANDIWEB TEST ASSIGNMENT
    </footer>
</body>
</html>