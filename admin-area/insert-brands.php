<?php
include_once "../includes/connection.php";
if (isset($_POST["insert-brand"]) &&!empty($_POST["brand-title"])) {
    $brand_title = $_POST["brand-title"];

    //    dont repeate the categories name
    $select_query = "SELECT * from `brands` where `title`='$brand_title'";
    $result = mysqli_query($connection, $select_query);
    $numberofrows = mysqli_num_rows($result);
    if ($numberofrows> 0) {
        echo "<script>alert('this brand is already exist')</script>";
    } else {
        $insert_query = "INSERT INTO `brands`( `title`) VALUES ('$brand_title')";
        $result = mysqli_query($connection, $insert_query);
        if ($result) {
            echo "<script>alert('brand has been added successfully')</script>";
        } else {
            echo "<script>alert('oops!! no brand has been added')</script>";
        }
    }
}

?>


<h2 class="text-center mb-4">insert brands</h2>

<form action="" method="POST" class="m-2">
    <div class="input-group mb-3 w-90">
        <span class="input-group-text  bg-info" id="basic-addon1"><i class="fas fa-receipt"></i></span>
        <input type="text" class="form-control" name="brand-title" placeholder="insert brands" aria-label="brands" aria-describedby="basic-addon1">
    </div>

    <div class="input-group mb-3 w-10 mb-2 m-auto">
      
        <input type="submit" class="bg-info border-1 m-2 p-3 text-light" name="insert-brand" value="insert brand" aria-label="Username" aria-describedby="basic-addon1" class="bg-info">
        <!-- <button class="bg-info border-1 m-2 p-3 text-light">insert brands</button> -->
    </div>
</form>