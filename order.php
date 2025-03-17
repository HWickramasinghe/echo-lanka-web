<?php
session_start();
ob_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- icon font -->
    <script src="https://use.fontawesome.com/c0bbe922da.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>echo-Lanka - Order</title>
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&family=Otomanopee+One&display=swap" rel="stylesheet">
<!-- bootstrap cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <!-- stylesheet -->
    <link rel="stylesheet" type="text/css" href="style/style.css">


    <style type="text/css">
    .wrapper {
        width : 100vw;
        height : 100vh;
        background-image: linear-gradient(320deg, #1abc9c, #16a085);

        display: flex;
        justify-content: center;
        align-items: center;    
    }
    .order-success {
        background-color: #fff;
        display : flex;
        flex-direction : column;
        justify-content: center;
        align-items: center;
        padding: 30px 40px;
        text-align : center;
        border-radius : 5px;
        color : #2c3e50;
    }
    .form {
        padding: 20px 30px;
        width:750px;
        height: 550px;
        background-color: #FFF;
        border-radius: 15px;
        box-shadow: 0 0 10px;
    }
    .form label {
        padding-left: 5px !important;
        color: #2c3e50;
    }

    .form-control {
        height: 40px;
    }
    .btn-reg,
    .btn-reg:link,
    .btn-reg:visited {
        padding: 10px 15px;
        color: #fff;
        font-weight: 700;
        border-radius: 5px;
        margin-left: 10px;
        border: none;
    }
    </style>

</head>

<body>
<div class="container-fluid bg-light">
        <div class="row">
            <nav class="nav">
                <div class="col col-md-5 logo text-center">
                <a href="#"><span>echo</span>-Lanka</a>
                </div>
                <div class="col col-md-7">
                    <ul class="nav-bar">
                    <li class="navbar__item"> <a href="index.php" class="navbar__item--link"> Go Home </a> </li>
                    <?php 

                            $destroySessionFlag = filter_input(INPUT_POST, 'destroySession');
                            if ($destroySessionFlag == 1) {
                                session_destroy();
                                header("Location: index.php");
                                exit();
                            }
                            if(isset($_SESSION["username"])) {

                                echo '<li class="navbar__item">';
                                echo    '<a href="#" class="navbar__item--link">' . $_SESSION["username"] . '</a>';
                                echo '</li>';

                                echo '<li class="navbar__item">';
                                echo '<form action="" method="POST">';
                                    echo '<input type="hidden" name="destroySession" value="1">';
                                    echo '<input type="submit" value="Log out" class="btn-logout"/>';
                                echo '</form>';
                                echo '</li>';
                                
                            } 
                        ?>
                </div>
            </nav>
        </div>
    </div>
    <div class="wrapper">
        <?php 
            if(isset($_SESSION["username"])) {
        ?>
        <div class="order-success">
            <h2 class="font-weight-bold text-center mb-3"> 
                Your order has been successfully placed! <br>
            </h2>
            <div>
                <a href="products.php" class="btn-reg bg-success">Take more Order</a>
                <a href="index.php" class="btn-reg bg-info">Go to homepage</a>
            </div>
        </div>
        <?php
            } 
            else {
        ?>
        <div class="form">
            <h2 class="text-success font-weight-bold text-center mb-3">
            </h2>
            <form action="index.php" method="POST" onsubmit=" alert('Order has been successfully placed!')">
                <div class="form-group">
                    <label class="font-weight-bold">Name</label>
                    <input type="text" name="name" class="form-control" >
                </div>
                <div class="form-group">
                    <label class="font-weight-bold">Email</label>
                    <input type="email" name="email" class="form-control"  >
                </div>
                <div class="form-group">
                    <label class="font-weight-bold">Contact</label>
                    <input type="text" name="contact" class="form-control"  >
                </div>
                <div class="form-group">
                    <label class="font-weight-bold">Address</label>
                    <input type="password" name="password" class="form-control" >
                </div>
                <input type="submit" class="btn-reg bg-success" value="Submit" name="submit" >
                <a href="products.php" class="btn-reg bg-danger">Cancel</a>
            </form>
        </div>
        <?php
            }
        ?>
    </div>
</body>

</html>