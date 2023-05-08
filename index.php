<?php

    use App\Controllers\LogicFinder;

    require_once 'App/start.php';

    $dataDeleter = new LogicFinder();
    $dataDeleter->dataDeleter();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div id="navbar-wrapper">
            <div id="navbar">
                <h1 id="add-title">Product List</h1>
                <div id="buttons-wrapper">
                    <a href="add-product.php" id="add-button">Add</a>
                    <form action="" id="delete-form" method="POST">
                        <button type="submit" name="delete" value="delete" id="mass-delete-button" action="POST">Mass Delete</button>
                    </form>
                </div>
            </div>
    </div>
    <div class="product-list-wrapper">
        <div id="product-list">
            <?php
            
            $renderData = new LogicFinder();
            $renderData->dataRenderer();

            ?>
        </div>
    </div>


    <footer id="footnote-wrapper">
        SCANDIWEB TEST ASSIGNMENT
    </footer>
</body>
</html>