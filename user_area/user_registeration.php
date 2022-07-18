<?php
include("../includes/connection.php");
include("../functions/common_functions.php");
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
    <h2 class="text-center mt-5">new registeration user</h2>
    <div class="m-auto w-50">
        <form action="" method="POST" enctype="multipart/form-data">
            <!-- username -->
            <div class="mb-3">
                <label for="username" class="form-label">username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="please enter your username" required="required">

            </div>
            <!-- email -->

            <div class="mb-3">
                <label for="email" class="form-label">email</label>
                <input required="required" type="email" class="form-control" id="email" name="email" placeholder="please enter your email">

            </div>
            <!-- password -->

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input required="required" type="text" class="form-control" id="password" name="password" placeholder="enter your password" autocomplete="off">
            </div>

            <!-- confirm password -->
            <div class="mb-3">
                <label for="confirm_pass" class="form-label">confirm_password</label>
                <input required="required" type="text" class="form-control" id="confirm_pass" name="confirm_pass" placeholder="enter your password again" autocomplete="off">
            </div>
            <!-- upload img -->

            <div class="mb-3">
                <label for="image">upload image</label>
                <div class="input-group ">
                    <input required="required" type="file" class="form-control" id="image" name='image'>

                </div>
            </div>
            <!-- address -->
            <div class="mb-3">
                <label for="address" class="form-label">address</label>
                <input required="required" type="text" class="form-control" id="address" name="address" placeholder="enter your address" autocomplete="off">
            </div>
            <!-- mobile -->
            <div class="mb-3">
                <label for="mobile" class="form-label">mobile</label>
                <input required="required" type="text" class="form-control" id="mobile" name="mobile" placeholder="enter your mobile" autocomplete="off">
            </div>

            <input type="submit" class="btn btn-info" value="register" name="register">
            <div class="mb-3 mt-3">
                <p>already have an account ?! <a href="user_login.php"> login</a></p>
            </div>

        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    <script src="js/scrip.js"></script>
</body>

</html>


<!-- php code -->
<?php
if (isset($_POST['register'])) {
    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $conf_password = $_POST['confirm_pass'];
    $user_password=password_hash($password,PASSWORD_DEFAULT);
    $address = $_POST['address'];
    $mobile = $_POST['mobile'];
    $image = $_FILES['image']['name'];
    $image_temp = $_FILES['image']['tmp_name'];
    move_uploaded_file($image_temp, "../users_images/$image");
    $user_ip_address = getIPAddress();
    if (!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirm_pass']) && !empty($_FILES['image']) && !empty($_POST['address']) && !empty($_POST['mobile'])) {
        if ($password == $conf_password) {
            $select_all_users = "SELECT * FROM `user_table` WHERE `username`='$name'";
            $select_query = mysqli_query($connection, $select_all_users);
            if (mysqli_num_rows($select_query) > 0) {
                echo "<script>alert('this name is already exist')</script>";
            } else {
                $insert_data_query = "INSERT INTO `user_table`( `username`, `user_email`, `user_password`, `user_img`, `user_ip`, `user_address`, `user_mobile`) VALUES ('$name',' $email','$user_password','$image',' $user_ip_address','$address','$mobile')";
                $insert_data = mysqli_query($connection, $insert_data_query);
                if ($insert_data) {
                    echo "<script>alert('data is inserted successfully')</script>";
                } else {
                    echo "<script>alert('data isn't inserted')</script>";
                }
            }
        } else {
            echo "confirm password doesn't match with password";
        }
    } else {
        echo "all fields are required to br filled";
    }



    // selecting cart items

    $select_cart_item="SELECT * FROM `card_details` WHERE ip_address= ' $user_ip_address'";
    $result_query=mysqli_query($connection,$select_cart_item);
 
    $result_count=mysqli_num_rows($result_query);
    if($result_count>0){
        $_SESSION['username']=$name;
        echo "<script>alert('you have items in your card')</script>";
        echo "<script>window.open('checkout.php','_self')</script>";

    }else{
        echo "<script>windpw.open('../index.php','_self')</script>";

    }
}

?>