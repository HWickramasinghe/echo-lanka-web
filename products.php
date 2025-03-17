<?php 
    session_start();
    // Include config file
    require_once "./admin/config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- icon font -->
    <script src="https://use.fontawesome.com/c0bbe922da.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>echo-Lanka - products</title>
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&family=Otomanopee+One&display=swap" rel="stylesheet">
<!-- bootstrap cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <!-- stylesheet -->
    <link rel="stylesheet" type="text/css" href="style/style.css">

</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="nav">
                <div class="col col-md-3 logo">
                <a href="index.php"><span>echo</span>-Lanka</a>
                </div>
                <div class="col col-md-9">
                    <ul class="nav-bar">
                        <li class="navbar__item"> <a href="index.php" class="navbar__item--link"> Home </a> </li>
                        <li class="navbar__item"> <a href="index.php#services" class="navbar__item--link"> Services </a> </li>
                        <li class="navbar__item"> <a href="#contact" class="navbar__item--link"> Contact </a> </li>
                        <li class="navbar__item" >
                            <form action="" method="post">
                                <input type="text" name="search" class="border border-4 py-1 border-success">
                                <input type="submit" name="submit" value="Search" class="btn btn-success">
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>

    <!-- cart modal start -->
        <div class="cart" id="cart" data-toggle="modal" data-target="#cart-modal">
            <div class="cart-items" id="cart-items">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i> <br>
                <span>0 items</span>
            </div>
            <div class="cart-price" id="cart-price">
                <span>Rs. 0</span>
            </div>
        </div>

    <div class="modal fade" id="cart-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Your Selected Products</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
      <div class="modal-body">
      <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">Product Name</th>
            <th scope="col">Product Quantity</th>
            <th scope="col">Product Price(Rs.)</th>
            <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody id="modal-tbody">

        </tbody>
      </table>
      </div>
      <div class="modal-footer">
        <a href="order.php" type="button" class="btn-logout">Confirm Order</a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- cart modal end -->

    <section class="products all-products" id="products">
        <div class="container">
            <div class="row">
                <?php
                $search_value = '';
                    // Attempt select query execution
                    if(isset($_POST["search"])) {
                        $search_value = $_POST["search"];
                    }
                    if($search_value != '') {
                        $sql="SELECT * from products where id like '%$search_value%' order by name asc";
                    } else {
                        $sql = "SELECT * FROM products order by name asc";
                    }
                    if($result = mysqli_query($link, $sql)) {
                        if(mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_array($result)){
                                echo '<div class="col-md-3">';

                                    echo '<div class="product-card">';

                                        echo '<img src="./admin/uploads/products/' . $row['image'] . '" alt="' . $row['image']. '" class="product-image">';

                                        echo '<h5 class="product-name" id="product-name">'. $row['name']. '</h5>';

                                        echo '<h6 class=""> <span class="product-price" id="product-price">' . $row['price']. '</span>/'. $row['unit'] .'</h6>';

                                        echo '<p class="product-description">'. $row['description'] .'</p>';

                                        echo '<div class="product-qty">
                                        <label for="qty">Quantity : </label>
                                        <input type="number" id="product-qty" name="qty" value="1" />
                                        </div>';

                                        echo '<button type="button" class="btn-product" id="add-item">
                                        Add to Cart <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                        </button>';

                                    echo '</div>';

                                echo '</div>';
                            }
                        }
                    }
                ?>
            </div>
        </div>
    </section>


    <footer class="footer" id="contact">
        <div class="container">
            <div class="row ">
                <div class="col-md-4 offset-md-2">
                    <div>
                        <h3 class="heading-4 footer-heading">
                            Contact With Us
                        </h3>
                        <ul>
                            <li> <i class="fa fa-envelope"></i> echogrocery123@gmail.com</li>
                            <li><i class="fa fa-phone"></i> 0715864899 </li>
                        </ul>
                    </div>
                </div>

            </div>

        <div class="footer-line m-4"></div>

        <div class="copy-right text-center">
            All rights reserved &copy;<a href="" class="text-success" target="_blank">Echo-grocery</a>
        </div>

        </div>

    </footer>

    <script src="script/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
</body>

</html>