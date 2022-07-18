<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin area </title>
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.php">
    <style>
        .admin-img {
            height: 100px;
            object-fit: contain;
        }

        .footer {
            position: absolute;
            bottom: 0;
        }
    </style>
</head>

<body>
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../imgs/lets-shopping-logo-design-template-shop-icon-135610500.jpg" alt="" class="logo">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="" class="nav-link"> welcome guest</a>
                        </li>
                    </ul>
                </nav>
            </div>

        </nav>
        <!-- second child -->
        <div class="container-fluid  text-center p-4 bg-light">
            <h3> manage details</h3>
        </div>

        <!-- third child -->
        <dix class="row ">
            <div class="col-md-12 bg-secondary px-5 d-flex align-items-center">
                <div>
                    <a href="#"><img src="../imgs/portfolio-1.jpg" alt="" class="admin-img"></a>
                    <p class="text-light text-center"> admin name</p>
                </div>
                <div class="button text-center ">
                    <button>
                        <a href="insert-product.php" class="text-light my-1 bg-info nav-link">insert products</a>
                    </button>
                    <button>
                        <a href="#" class="text-light my-1 bg-info nav-link">view products</a>
                    </button>
                    <button>
                        <a href="index.php?insert_category" class="text-light my-1 bg-info nav-link">insert categories</a>
                    </button>
                    <button>
                        <a href="#" class="text-light my-1 bg-info nav-link">view categories</a>
                    </button>
                    <button>
                        <a href="index.php?insert_brands" class="text-light my-1 bg-info nav-link">insert brands</a>
                    </button>
                    <button>
                        <a href="#" class="text-light my-1 bg-info nav-link">view brands</a>
                    </button>
                    <button>
                        <a href="#" class="text-light my-1 bg-info nav-link">all orders </a>
                    </button>
                    <button>
                        <a href="#" class="text-light my-1 bg-info nav-link">all payments</a>
                    </button>
                    <button>
                        <a href="#" class="text-light my-1 bg-info nav-link">listusers</a>
                    </button>
                    <button>
                        <a href="#" class="text-light my-1 bg-info nav-link">logout</a>
                    </button>


                </div>


            </div>
        </dix>
        <!-- fourth child -->
        <div class="container my-4">
            <?php
            if (isset($_GET["insert_category"])) {
                include "insert-category.php";
            }
            if (isset($_GET["insert_brands"])) {
                include "insert-brands.php";
            }
            ?>
        </div>

        <!-- last child footer -->
        <div class="bg-info text-center p-3 footer">
            <p>designed by hadeer all rifhts are reserved 2022</p>
        </div>

    </div>



    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    <script src="js/scrip.js"></script>
</body>

</html>