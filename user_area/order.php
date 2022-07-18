<?php

include_once "../includes/connection.php";
require "../functions/common_functions.php";
session_start();


if(isset($_GET['user_id'])){
    $user_id=$_GET['user_id'];

}
$user_ip=getIPAddress();
$total_price=0;
$card_query_price="SELECT * FROM `card_details`WHERE ip_address='$user_ip'";
$result_card_price=mysqli_query($connection,$card_query_price);
$fetch_data=mysqli_fetch_assoc($result_card_price);
while($row=mysqli_fetch_assoc($result_card_price)){
    $product_id=$row['product_id'];
    $product_details="SELECT * FROM `products_table` WHERE product_id=$product_id";
    $product_details_query=mysqli_query($connection,$product_details);
    while($product_row=mysqli_fetch_assoc($product_details_query)){
        $product_price= array( $product_row['product_price']);
        $product_value= array_sum( $product_price);
        $total_price+=$product_value;
    }
    
}

?>