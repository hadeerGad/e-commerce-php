<?php
require_once "../includes/connection.php";
if(isset($_POST["insert_product"]) && !empty($_POST["product-title"])&& !empty($_POST["description"])){
    $product_title=$_POST["product-title"];
    $product_description=$_POST["description"];
    $product_keywords=$_POST["keywords"];
    $product_category=$_POST["product_category"];
    $product_brand=$_POST["product_brand"];
    $product_price=$_POST["product_price"];
    $product_status='true';
    // imgs name
    $product_img1=$_FILES["product_img1"]["name"];
    $product_img2=$_FILES["product_img2"]["name"];
    $product_img3=$_FILES["product_img3"]["name"];
    // imgs tmp
    $tmp_img1=$_FILES["product_img1"]["tmp_name"];
    $tmp_img2=$_FILES["product_img2"]["tmp_name"];
    $tmp_img3=$_FILES["product_img3"]["tmp_name"];
    // move to upload file
    move_uploaded_file($tmp_img1,"../imgs/$product_img1");
    move_uploaded_file($tmp_img2,"../imgs/$product_img2");
    move_uploaded_file($tmp_img3,"../imgs/$product_img3");
    // insert values in the database
    $insert_products_query="INSERT INTO `products_table`( `product_title`, `product_description`, `product_keyword`, `category_id`, `brand_id`, `product_image1`, `product_image2`, `product_image3`, `product_price`,`date`,`status`) VALUES ('$product_title','$product_description','$product_keywords','$product_category','$product_brand','$product_img1','$product_img2','$product_img3','$product_price',NOW(),'$product_status')";
    $products_result=mysqli_query($connection,$insert_products_query);
    if($products_result){
        echo "<script>alert('product details is added successfully')</script>";
    }else{
        echo  "<script>alert('Oops!!product has not been added ')</script>";

    }



}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <title>Document</title>
    <style>
        .form-outline {
            margin-top: 15px;
            margin-right: auto;
            margin-bottom: 0;
            margin-left: auto;

        }

        .form-select {
            width: 100%;
        }
    </style>
</head>

<body class="bg-light">
    <div class="container">
        <h2 class="text-center m-4">insert new product</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <!-- title -->
            <div class="form-outline  w-50 ">
                <label for="product-title" class="form-label">product title</label>
                <input type="text" class="form-control " name="product-title" id="product-title" placeholder="enter the product title" autocomplete="off" required="required">
            </div>
            <!-- description -->
            <div class="form-outline w-50 ">
                <label for="description" class="form-label">product description</label>
                <input type="text" class="form-control" name="description" id="description" placeholder="enter the product description" autocomplete="off" required="required">
            </div>

            <!-- keywords -->
            <div class="form-outline  w-50 ">
                <label for="keywords" class="form-label">product keywords</label>
                <input type="text" class="form-control" name="keywords" id="keywords" placeholder="enter the product keywords" autocomplete="off" required="required">
            </div>
            <!-- select category -->
            <div class="form-outline w-50 ">
                <select class="form-select" name="product_category">
                    <option value="">select the category</option>
                    <?php
                    $select_query = "SELECT * from `categories`";
                    $select_result = mysqli_query($connection, $select_query);
                    while ($category_rows = mysqli_fetch_assoc($select_result)) {
                        $data[] = $category_rows;
                    }
                    foreach ($data as $row) :
                    ?>

                        <option value="<?= $row["category_id"] ?>"><?= $row["title"] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <!-- select brand -->
            <div class="form-outline w-50 ">
                <select class="form-select" name="product_brand">
                    <option value="">select the brand</option>

                    <?php
                    $select_query = "SELECT * from `brands`";
                    $select_result = mysqli_query($connection, $select_query);
                    while ($brand_rows = mysqli_fetch_assoc($select_result)) {
                        $rows[] = $brand_rows;
                    }
                    foreach ($rows as $row) :
                    ?>

                        <option value="<?= $row["brand_id"] ?>"><?= $row["title"] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- image1 -->
            <div class="form-outline  w-50 ">
                <label for="product_img1" class="form-label">product image 1</label>
                <input type="file" class="form-control" name="product_img1" id="product_img1" required="required">
            </div>

            <!-- image2 -->
            <div class="form-outline  w-50 ">
                <label for="product_img2" class="form-label">product image 2</label>
                <input type="file" class="form-control" name="product_img2" id="product_img2" required="required">
            </div>

            <!-- image3 -->
            <div class="form-outline  w-50 ">
                <label for="product_img3" class="form-label">product image 3</label>
                <input type="file" class="form-control" name="product_img3" id="product_img3" required="required">
            </div>

            <!-- product price -->
            <div class="form-outline  w-50 ">
                <label for="product_price" class="form-label">product price</label>
                <input type="text" class="form-control" name="product_price" id="product_price" placeholder="enter the product price" autocomplete="off" required="required">
            </div>
            <!-- insert btn -->
            <div class="form-outline  w-50 ">

                <input type="submit" class="btn btn-info mb-2 px-3" name="insert_product" value="insert product">
            </div>
        </form>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    <script src="../js/scrip.js"></script>
</body>

</html>