<?php
// include "./includes/connection.php";

// function to display limited products from db
function getAllProducts()
{
    //  fetch the data from the database 
    if (!isset($_GET["category"])) {
        if (!isset($_GET["brand"])) {
            global $connection;
            $select_products_query = "SELECT * FROM `products_table`order by rand() LIMIT 0,2";
            $products_results = mysqli_query($connection, $select_products_query);
            while ($product_rows = mysqli_fetch_assoc($products_results)) {
                // $products_data[] = $product_rows;
                $product_id = $product_rows['product_id'];
                $prdouct_title = $product_rows['product_title'];
                $product_description = $product_rows["product_description"];
                $product_img1 = $product_rows["product_image1"];
                $product_price = $product_rows["product_price"];
                echo "
           <div class='col-md-4 mb-2'>
              <div class='card'>
               <img src='imgs/$product_img1' class='card-img-top' alt='$prdouct_title'>
               <div class='card-body'>
                   <h5 class='card-title'>$prdouct_title</h5>
                   <p class='card-text'> $product_description</p>
                   <p class='card-text'>price: $product_price/-</p>
                   <a href='index.php?add_to_card=$product_id' class='btn btn-info'>add to card</a>
                   <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>view more</a>
               </div>
               </div>
            </div>";
            }
        }
    }
}

// function to display all products 
function display_all_products()
{

    //  fetch the data from the database 
    if (!isset($_GET["category"])) {
        if (!isset($_GET["brand"])) {
            global $connection;
            $select_products_query = "SELECT * FROM `products_table`order by rand() ";
            $products_results = mysqli_query($connection, $select_products_query);
            while ($product_rows = mysqli_fetch_assoc($products_results)) {
                // $products_data[] = $product_rows;
                $product_id = $product_rows['product_id'];
                $prdouct_title = $product_rows['product_title'];
                $product_description = $product_rows["product_description"];
                $product_img1 = $product_rows["product_image1"];
                $product_price = $product_rows["product_price"];
                echo "
           <div class='col-md-4 mb-2'>
              <div class='card'>
               <img src='imgs/$product_img1' class='card-img-top' alt='$prdouct_title'>
               <div class='card-body'>
                   <h5 class='card-title'>$prdouct_title</h5>
                   <p class='card-text'> $product_description</p>
                   <p class='card-text'>price: $product_price/-</p>
                   <a href='index.php?add_to_card=$product_id' class='btn btn-info'>add to card</a>
                   <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>view more</a>
               </div>
               </div>
            </div>";
            }
        }
    }
}




// get a unique category
function get_unique_category()
{
    if (isset($_GET["category"])) {
        $category_id = $_GET["category"];

        global $connection;
        $select_products_query = "SELECT * FROM `products_table` WHERE `category_id`=$category_id";
        $products_results = mysqli_query($connection, $select_products_query);
        if (mysqli_num_rows($products_results) > 0) {
            while ($product_rows = mysqli_fetch_assoc($products_results)) {
                // $products_data[] = $product_rows;
                $product_id = $product_rows['product_id'];
                $prdouct_title = $product_rows['product_title'];
                $product_description = $product_rows["product_description"];
                $product_img1 = $product_rows["product_image1"];
                $product_price = $product_rows["product_price"];

                echo "
               <div class='col-md-4 mb-2'>
                  <div class='card'>
                   <img src='imgs/$product_img1' class='card-img-top' alt='$prdouct_title'>
                   <div class='card-body'>
                       <h5 class='card-title'>$prdouct_title</h5>
                       <p class='card-text'> $product_description</p>
                       <p class='card-text'>price: $product_price/-</p>
                       <a href='index.php?add_to_card=$product_id' class='btn btn-info'>add to card</a>
                       <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>view more</a>
                   </div>
                   </div>
                </div>";
            }
        } else {
            echo "<h1 class='bg-danger text-center text-light'>no category in this in store</h1> ";
        }
    }
}


// get a unique brand
function get_unique_brand()
{
    if (isset($_GET["brand"])) {
        $brand_id = $_GET["brand"];
        global $connection;
        $select_products_query = "SELECT * FROM `products_table` WHERE `brand_id`=$brand_id";
        $products_results = mysqli_query($connection, $select_products_query);
        if (mysqli_num_rows($products_results) > 0) {
            while ($product_rows = mysqli_fetch_assoc($products_results)) {
                // $products_data[] = $product_rows;
                $product_id = $product_rows['product_id'];
                $prdouct_title = $product_rows['product_title'];
                $product_description = $product_rows["product_description"];
                $product_img1 = $product_rows["product_image1"];
                $product_price = $product_rows["product_price"];
                echo "
               <div class='col-md-4 mb-2'>
                  <div class='card'>
                   <img src='imgs/$product_img1' class='card-img-top' alt='$prdouct_title'>
                   <div class='card-body'>
                       <h5 class='card-title'>$prdouct_title</h5>
                       <p class='card-text'> $product_description</p>
                <p class='card-text'>price: $product_price/-</p>

                       <a href='index.php?add_to_card=$product_id' class='btn btn-info'>add to card</a>
                       <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>view more</a>
                   </div>
                   </div>
                </div>";
            }
        } else {
            echo "<h1 class='text-center bg-danger text-light'>no brand in this in store</h1> ";
        }
    }
}


// function to display all brands

function getAllBrands()
{
    global $connection;
    $select_query = "SELECT * FROM `brands`";
    $brands_result = mysqli_query($connection, $select_query);
    while ($brands_rows = mysqli_fetch_assoc($brands_result)) {
        $brand_id = $brands_rows['brand_id'];
        $brand_title = $brands_rows['title'];
        echo "<li class='nav-item'>
        <a class='nav-link text-center text-light' href='index.php?brand=$brand_id'>$brand_title</a>
    </li>";
    }
}


// function to display all categories

function getAllCategories()
{
    global $connection;
    $select_category_query = "SELECT * FROM `categories`";
    $category_result = mysqli_query($connection, $select_category_query);
    while ($category_rows = mysqli_fetch_assoc($category_result)) {
        $category_id = $category_rows['category_id'];
        $category_title = $category_rows['title'];
        echo "<li class='nav-item  '>
        <a class='nav-link text-center text-light' href='index.php?category=$category_id'>$category_title</a>
    </li>";
    }
}


// function to search a product
function search_product()
{
    global $connection;

    if (isset($_GET['search_data'])) {
        $search_product_value = $_GET['search_data_product'];

        $search_products_query = "SELECT * FROM `products_table` WHERE product_keyword LIKE '%$search_product_value%'";
        $products_results = mysqli_query($connection, $search_products_query);
        if (mysqli_num_rows($products_results) > 0) {
            while ($product_rows = mysqli_fetch_assoc($products_results)) {
                // $products_data[] = $product_rows;
                $product_id = $product_rows['product_id'];
                $prdouct_title = $product_rows['product_title'];
                $product_description = $product_rows["product_description"];
                $product_img1 = $product_rows["product_image1"];
                $product_price = $product_rows["product_price"];
                echo "
               <div class='col-md-4 mb-2'>
                  <div class='card'>
                   <img src='imgs/$product_img1' class='card-img-top' alt='$prdouct_title'>
                   <div class='card-body'>
                       <h5 class='card-title'>$prdouct_title</h5>
                       <p class='card-text'> $product_description</p>
                       <p class='card-text'>price: $product_price/-</p>
                       <a href='index.php?add_to_card=$product_id' class='btn btn-info'>add to card</a>
                       <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>view more</a>
                   </div>
                   </div>
                </div>";
            }
        } else {
            echo "<h1 class='text-center bg-danger text-light'>no result is found</h1> ";
        }
    }
}


// het the product details 
function get_product_details()
{
    //  fetch the data from the database 
    if (isset($_GET['product_id'])) {
        $product_id = $_GET['product_id'];
        if (!isset($_GET["category"])) {
            if (!isset($_GET["brand"])) {
                global $connection;
                $select_products_query = "SELECT * FROM `products_table`WHERE product_id=$product_id";
                $products_results = mysqli_query($connection, $select_products_query);
                while ($product_rows = mysqli_fetch_assoc($products_results)) {
                    // $products_data[] = $product_rows;
                    $product_id = $product_rows['product_id'];
                    $prdouct_title = $product_rows['product_title'];
                    $product_description = $product_rows["product_description"];
                    $product_img1 = $product_rows["product_image1"];
                    $product_img2 = $product_rows["product_image2"];
                    $product_img3 = $product_rows["product_image3"];
                    $product_price = $product_rows["product_price"];

                    echo "
              <div class='col-md-4 mb-2'>
              <div class='card'>
               <img src='imgs/$product_img1' class='card-img-top' alt='$prdouct_title'>
               <div class='card-body'>
                   <h5 class='card-title'>$prdouct_title</h5>
                   <p class='card-text'> $product_description</p>
                   <p class='card-text'>price: $product_price/-</p>

                   <a href='index.php?add_to_card=$product_id' class='btn btn-info'>add to card</a>
                   <a href='index.php' class='btn btn-secondary'>go home</a>
               </div>
               </div>
              </div>
              <div class='col-md-8'>
              <div class='row'>
                  <div class='col-md-12'>
                      <h4 class='text-center text-info mb-5'>related products</h4>
                  </div>
                  <div class='col-md-6'>
                  <img src='imgs/$product_img2' class='card-img-top' alt='$prdouct_title'>
                  </div>
                  <div class='col-md-6'>
                  <img src='imgs/$product_img3' class='card-img-top' alt='$prdouct_title'>
                  </div>
              </div>
          </div>
              
              ";
                }
            }
        }
    }
}


// get the ip address
function getIPAddress()
{
    //whether ip is from the share internet  
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    //whether ip is from the remote address  
    else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}


// function to add to cart
function cart()
{
    global $connection;
    if (isset($_GET['add_to_card'])) {
        $GET_ip_address = getIPAddress();
        $product_id = $_GET['add_to_card'];
        $select_product_id_query = "SELECT * FROM `card_details` WHERE ip_address=' $GET_ip_address'&& product_id=$product_id";
        $result = mysqli_query($connection, $select_product_id_query);
        if (mysqli_num_rows($result) > 0) {
            echo "<script>alert('this item is already exist')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        } else {
            $insert_query = "INSERT INTO `card_details`(`product_id`, `ip_address`, `quantity`) VALUES ('$product_id',' $GET_ip_address',0)";
            $result = mysqli_query($connection, $insert_query);
            echo "<script>alert('item is added to cart')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
    }
}


// function to get th no of items inside my card
function card_item()
{
    global $connection;
    if (isset($_GET['add_to_card'])) {
        $GET_ip_address = getIPAddress();
        $select_product_id_query = "SELECT * FROM `card_details` WHERE ip_address=' $GET_ip_address'";
        $result = mysqli_query($connection, $select_product_id_query);
        $count_cart_item = mysqli_num_rows($result);
    } else {
        $GET_ip_address = getIPAddress();
        $select_product_id_query = "SELECT * FROM `card_details` WHERE ip_address=' $GET_ip_address'";
        $result = mysqli_query($connection, $select_product_id_query);
        $count_cart_item = mysqli_num_rows($result);
    }
    echo $count_cart_item;
}

// function to get the price of the cart
function cart_price()
{
    global $connection;
    $total = 0;
    $GET_ip_address = getIPAddress();
    $select_query = "SELECT * FROM `card_details` WHERE ip_address= ' ::1'";
    $result = mysqli_query($connection, $select_query);
    while ($row = mysqli_fetch_assoc($result)) {
        $product_id = $row['product_id'];
        $select_price_query = "SELECT * FROM `products_table` WHERE product_id= '$product_id'";
        $select_result = mysqli_query($connection, $select_price_query);
        $fetch_products = mysqli_fetch_assoc($select_result);
        $product_price = array($fetch_products["product_price"]);
        $product_sum = array_sum($product_price);
        $total += $product_sum;
    }
    echo $total;
}



// function to grt cart details
function cart_details()
{
    global $connection;
    $total = 0;
    $GET_ip_address = getIPAddress();
    $select_query = "SELECT * FROM `card_details` WHERE ip_address= ' ::1'";
    $result = mysqli_query($connection, $select_query);
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
    }
}
