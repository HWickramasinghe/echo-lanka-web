<?php
// Check existence of id parameter before processing further
require_once "config.php";

$id =  trim($_GET["id"]); 
// Prepare a select statement
$sql = "SELECT * FROM products WHERE id = '$id'";
$result = mysqli_query($link, $sql);
while($row = mysqli_fetch_array($result)) {
    $image = $row['image'];
    $name = $row['name'];
    $description = $row['description'];
    $price = $row['price'];
    $unit = $row['unit'];
    $remain = $row['remain'];
}
    // Close connection
    mysqli_close($link);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>e-grocery - product details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <style type="text/css">
    .wrapper {
        width: 500px;
        margin: 0 auto;
    }

    .prod-image {
        height: 300px;
        width: auto;
    }
    </style>
</head>

<body>
    <div>
        <div class="container">
            <div class="page-header">
                <h1 class="bg-success p-3 my-3 text-center text-white text-uppercase">View Record</h1>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <h3 class="font-weight-bold">Product Information- <span
                                class="text-danger">#<?php echo $id; ?></span>

                        </h3>
                        <?php echo '<img src="./uploads/products/' . $image . '" alt="' . $image. '"
                                class="prod-image">';?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="list-group-sm">
                        <div class="list-group-item list-group-item-success">
                            <label class="font-weight-bold">Name</label>
                            <div><?php echo $name; ?>
                            </div>
                        </div>
                        <div class="list-group-item list-group-item-dark">
                            <label class="font-weight-bold">Description</label>
                            <div><?php echo $description; ?></div>
                        </div>
                        <div class="list-group-item list-group-item-danger">
                            <label class="font-weight-bold">Price</label>
                            <div><?php echo $price; ?></div>
                        </div>
                        <div class="list-group-item list-group-item-info">
                            <label class="font-weight-bold">Remain</label>
                            <div><?php echo $remain; ?></div>
                        </div>
                        <div class="list-group-item list-group-item-warning">
                            <label class="font-weight-bold">Unit</label>
                            <div><?php echo $unit; ?></div>
                        </div>
                        <div>
                            <a href="products.php#products" class="btn btn-primary mt-3">Back</a>
                            <?php
                            echo '<a href="update.php?id=' . $id . '" class="btn btn-warning mt-3 mr-1">Update</a>';
                            echo '<a href="delete-product.php?id=' . $id . '" class="btn btn-danger mt-3">Delete</a>'; 
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>