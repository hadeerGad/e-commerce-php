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
    <link rel='stylesheet' type='text/css' href='style.php' />

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
                        <a class="nav-link" href="./user_area/user_registeration.php">register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i> <sup><?php card_item(); ?></sup></a>
                    </li>


                </ul>
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
        <div class="container">
            <form action="" method="POST">
                <table class="table text-center table-bordered">
                    <!-- <thead>
                        <tr>
                            <th>
                                product title
                            </th>
                            <th>
                                product image
                            </th>
                            <th>
                                quantity
                            </th>
                            <th>
                                total price
                            </th>
                            <th>
                                remove
                            </th>
                            <th colspan="2">
                                operations
                            </th>

                        </tr>
                    </thead> -->
                    <tbody>

                        <!-- php code to display data from db into table -->
                        <?php
                        global $connection;
                        $total = 0;
                        $GET_ip_address = getIPAddress();
                        $select_query = "SELECT * FROM `card_details` WHERE ip_address= ' ::1'";
                        $result = mysqli_query($connection, $select_query);
                        if (mysqli_num_rows($result) > 0) {
                            echo "                    <thead>
                            <tr>
                                <th>
                                    product title
                                </th>
                                <th>
                                    product image
                                </th>
                                <th>
                                    quantity
                                </th>
                                <th>
                                    total price
                                </th>
                                <th>
                                    remove
                                </th>
                                <th colspan='2'>
                                    operations
                                </th>
    
                            </tr>
                        </thead>";
                            while ($row = mysqli_fetch_assoc($result)) {
                                $product_id = $row['product_id'];
                                $select_price_query = "SELECT * FROM `products_table` WHERE product_id= '$product_id'";
                                $select_result = mysqli_query($connection, $select_price_query);
                                $fetch_products = mysqli_fetch_assoc($select_result);
                                $product_title = $fetch_products["product_title"];
                                $product_img1 = $fetch_products["product_image1"];
                                $product_price = $fetch_products["product_price"];
                                $product_price = array($fetch_products["product_price"]);
                                $product_sum = array_sum($product_price);
                                $total += $product_sum;




                        ?>


                                <tr>
                                    <td>
                                        <?php echo $product_title ?>
                                    </td>
                                    <td>
                                        <img src="imgs/<?php echo $product_img1 ?>" class="cart_img" alt="">
                                    </td>

                                    <td>
                                        <input type="text" class="w-50 form-input" name="qty">
                                    </td>
                                    <!-- the php code for quantities -->
                                    <?php
                                    $GET_ip_address = getIPAddress();
                                    if (isset($_POST['update'])) {
                                        $quantites = $_POST['qty'];
                                        $update_cart = "UPDATE `card_details` set quantity= $quantites WHERE `product_id`=$product_id";
                                        $select_update_result = mysqli_query($connection, $update_cart);
                                        $total = $total * $quantites;
                                    }
                                    ?>

                                    <td>
                                        <?php print_r($product_price[0])  ?>
                                    </td>
                                    <td>
                                        <input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>">
                                    </td>
                                    <td>

                                        <input type="submit" class="btn btn-info" value="update cart" name="update">

                                        <input type="submit" class="btn btn-info" value="remove item" name="remove">

                                    </td>
                                </tr>

                        <?php }
                        } else {
                            echo "<h2 class='text-center text-danger' >your card is empty</h2>";
                        }
                        ?>
                    </tbody>


                </table>
                <?php
                global $connection;

                $GET_ip_address = getIPAddress();
                $select_query = "SELECT * FROM `card_details` WHERE ip_address= ' ::1'";
                $result = mysqli_query($connection, $select_query);
                if (mysqli_num_rows($result) > 0) {
                    echo "  <div class='d-flex mb-5 mt-5'>
<h4>subtotal: <strong class='text-info'> $total </strong></h4>
<input type='submit' class='btn btn-info mx-3 p-2' value='continue shopping' name='continue_shopping'>

<button class='btn btn-secondary mx-3 p-2 '><a href='user_area/checkout.php' class='text-decoration-none text-light'>checkout</a></button> 
</div>";
                } else {
                    echo "<input type='submit' class='btn btn-secondary mx-3 p-2 my-5' value='continue shopping' name='continue_shopping'>";
                }

                if (isset($_POST['continue_shopping'])) {
                    echo "<script>window.open('index.php','_self')</script>";
                }
                ?>
                <!-- sub total -->



            </form>
            <!-- php code for remove checkbox -->
            <?php
            function remove_item_card()
            {
                global $connection;
                if (isset($_POST['remove'])) {
                    foreach ($_POST['removeitem'] as $remove_id) {
                        echo $remove_id;
                        $remove_query = "DELETE FROM `card_details` WHERE `product_id`=$remove_id";
                        $run_remove_query = mysqli_query($connection, $remove_query);
                        if ($run_remove_query) {
                            echo "<script>window.open('cart.php','_self')</script>";
                        }
                    }
                }
            }
            echo $remove_item = remove_item_card();
            ?>
        </div>



    </div>


    <!-- last child footer -->
    <!-- include footer.php -->
    <?php include "footer.php"; ?>






    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"> </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    <script src="js/scrip.js"></script>
</body>

</html>