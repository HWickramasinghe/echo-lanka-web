<?php
session_start();
if($_SESSION["count"] <= 0)
{
    header("Location: error.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://use.fontawesome.com/c0bbe922da.js"></script>
    <meta charset="UTF-8">
    <title>e-grocery - Products</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <style type="text/css">
    .page-header h2 {
        margin-top: 0;
    }

    table tr td:last-child a {
        margin-right: 15px;
    }

    .add-btn {
        width: 50%;
        margin: 0 auto;
    }
    </style>
</head>

<body>
    <div class="container mt-3">
        <nav class="menu">
            <div class="row text-center">
                <a href="users.php" class="btn btn-info font-weight-bold col-2 offset-2">Users List</a>
                <a href="products.php" class="btn btn-warning font-weight-bold col-2 offset-1">Products List</a>
                <a href="../index.php" class="btn btn-danger font-weight-bold col-2 offset-1">Log Out</a>
            </div>
        </nav>
    </div>
    <div class="container" id="products">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header text-center">
                    <h2 class="bg-primary text-white text-center my-3 p-3">Products List</h2>
                    <a href="create.php" class="btn btn-success btn-lg btn-block add-btn">Add New Product <i class="fa fa-plus-circle"></i></a>
                </div>
                <?php
                    // Include config file
                    require_once "config.php";
                    // Attempt select query execution
                    $sql = "SELECT * FROM products";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped mt-5'>";
                                echo '<thead class="thead-dark">';
                                    echo "<tr>";
                                        echo "<th>ID</th>";
                                        echo "<th>Name</th>";
                                        echo "<th>Price</th>";
                                        echo "<th>Remain</th>";
                                        echo "<th>Unit</th>";
                                        echo '<th class="">Action</th>';
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                    echo "<td>#" . $row['id'] . "</td>";
                                    echo "<td>" . $row['name'] . "</td>";
                                    echo "<td>" . $row['price'] . "</td>";
                                    echo "<td>" . $row['remain'] . "</td>";
                                    echo "<td>" . $row['unit'] . "</td>";
                                    echo "<td>";
                                    echo '<a href="read.php?id=' . $row['id'] . '" class="btn btn-sm btn-success">Details</a>';
                                    echo '<a href="update.php?id=' . $row['id'] . '" class="btn btn-sm btn-warning">Update</a>';
                                    echo '<a href="delete-product.php?id=' . $row['id'] . '" class="btn btn-sm btn-danger">Delete</a>';
                                    echo "</td>";
                                    echo "</tr>";
                                }
                                    echo "<tr>";
                                    echo "</tr>";
                                    echo "</tbody>";
                                    echo "</table>";
                                    // Free result set
                                    mysqli_free_result($result);
                                    } else{
                                    echo "<p class='lead'><em>No records were found.</em></p>";
                                    }
                                    } else{
                                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                                    }

                                    // Close connection
                                    mysqli_close($link);
                ?>
            </div>
        </div>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
</body>

</html>