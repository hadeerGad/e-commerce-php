<?php
include_once "includes/connection.php";
include "functions/common_functions.php";
session_start();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.php">
</head>

<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <img src="imgs/lets-shopping-logo-design-template-shop-icon-135610500.jpg" alt="" class="logo">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="display_all.php">products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-shopping-cart"></i> <sup><?php card_item(); ?></sup></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">total price: <?php cart_price(); ?></a>

                    </li>

                </ul>
                <form class="form-inline my-2 my-lg-0" action="search_product.php" method="GET">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search_data_product">
                    <input type="submit" class="btn btn-outline-light" value="search" name="search_data">
                </form>
            </div>
        </nav>
        <!-- calling cart function -->
        <?php cart(); ?>
        <!-- second child -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class="navbar-nav mr-auto">
            <?php

if (!isset($_SESSION['username'])) {
    echo " <li class='nav-item '>
<a class='nav-link' href='#'>welcome guest</a>
</li>";
} else {
    $username = $_SESSION['username'];
    echo " <li class='nav-item '>
<a class='nav-link' href='#'>welcome  $username</a>
</li>";
}



if (!isset($_SESSION['username'])) {
    echo " <li class='nav-item '>
 <a class='nav-link' href='./user_area/user_login.php'>login</a>
</li>";
} else {
    echo " <li class='nav-item '>
    <a class='nav-link' href='./user_area/user_logout.php'>logout</a>
</li>";
}

?>
            </ul>
        </nav>
        <!-- third child -->

        <div class="bg-light">
            <h3 class="text-center">hidden store</h3>
            <p class="text-center">Lorem ipsum dolor sit amet consectetur.</p>

        </div>


        <!-- fourth child -->
        <div class="row">

            <div class="col-md-10 p-0">
                <div class="row">
                    <!-- <div class="row col-md-4 ml-2">
                        <div class='card'>
                            <img src='imgs/photo_2021-04-28_22-46-37.jpg' class='card-img-top' alt='$prdouct_title'>
                            <div class='card-body'>
                                <h5 class='card-title'>$prdouct_title</h5>
                                <p class='card-text'> $product_description</p>
                                <a href='#' class='btn btn-info'>add to card</a>
                                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>view more</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="text-center text-info mb-5">related products</h4>
                            </div>
                            <div class="col-md-6">
                            <img src='imgs/photo_2021-04-28_22-46-37.jpg' class='card-img-top' alt='$prdouct_title'>
                            </div>
                            <div class="col-md-6">
                            <img src='imgs/photo_2021-04-28_22-46-37.jpg' class='card-img-top' alt='$prdouct_title'>
                            </div>
                        </div>
                    </div> -->
                    <?php
                    // getAllProducts();
                    get_product_details();
                    get_unique_category();
                    get_unique_brand();
                    ?>
                </div>

            </div>
            <div class="col-md-2 bg-secondary p-0">
                <!-- sidenav -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item bg-info ">
                        <a class="nav-link text-center text-light" href="#">
                            <h4>delivery brands</h4>
                        </a>
                    </li>
                    <?php
                    // display brands from database
                    getAllBrands();
                    ?>


                </ul>

                <ul class="navbar-nav mr-auto">
                    <li class="nav-item bg-info ">
                        <a class="nav-link text-center text-light" href="#">
                            <h4>categories</h4>
                        </a>
                    </li>

                    <?php
                    getAllCategories();
                    ?>
                </ul>
            </div>
        </div>
    </div>


    <!-- last child footer -->
    <!-- include footer.php -->
    <?php include "footer.php"; ?>






    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    <script src="js/scrip.js"></script>
</body>

</html>