<?php
include_once "../includes/connection.php";
if (isset($_POST["insert-cat"]) && !empty($_POST["cat-title"])) {
    $category_title = $_POST["cat-title"];

    //    dont repeate the categories name
    $select_query = "SELECT * from `categories` where `title`='$category_title'";
    $result = mysqli_query($connection, $select_query);
    $numberofrows = mysqli_num_rows($result);
    if ($numberofrows > 0) {
        echo "<script>alert('this category is already exist')</script>";
    } else {
        $insert_query = "INSERT INTO `categories`( `title`) VALUES ('$category_title')";
        $result = mysqli_query($connection, $insert_query);
        if ($result) {
            echo "<script>alert('category has been added successfully')</script>";
        } else {
            echo "<script>alert('oops!! no category has been added')</script>";
        }
    }
}

?>


<h2 class="text-center mb-4">insert categories</h2>

<form action="" method="POST" class="m-2">
    <div class="input-group mb-3 w-90">
        <span class="input-group-text  bg-info" id="basic-addon1"><i class="fas fa-receipt"></i></span>
        <input type="text" class="form-control" name="cat-title" placeholder="insert category" aria-label="Username" aria-describedby="basic-addon1">
    </div>

    <div class="input-group mb-3 w-10 mb-2 m-auto">

        <input type="submit" class="bg-info border-1 m-2 p-3 text-light" name="insert-cat" value="insert category" aria-label="Username" aria-describedby="basic-addon1" class="bg-info">
        <!-- <button class="bg-info border-1 m-2 p-3 text-light">insert category</button> -->
    </div>
</form>