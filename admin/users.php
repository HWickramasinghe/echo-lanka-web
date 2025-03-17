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
    <title>e-grocery - Users</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <style type="text/css">
    .page-header h2 {
        margin-top: 0;
    }

    .user-image {
        height: 100px;
        width: auto;
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
    <div class="container" id="users">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header text-center">
                    <h2 class="bg-primary text-white text-center my-3 p-3">Users List</h2>
                </div>
                <?php
                    // Include config file
                    require_once "config.php";
                    // Attempt select query execution
                    $sql = "SELECT * FROM users";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped mt-5'>";
                                echo '<thead class="thead-dark">';
                                    echo "<tr>";
                                        echo "<th>Image</th>";
                                        echo "<th>Name</th>";
                                        echo "<th>Email</th>";
                                        echo "<th>Password</th>";
                                        echo '<th class="">Action</th>';
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . '<img src="./uploads/users/' . $row['image'] . '" alt="' . $row['image'] . '" class="user-image">' . "</td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['username'] . "</td>";
                                        echo "<td>" . $row['password'] . "</td>";
                                        echo "<td>";
                                        echo '<a href="delete-user.php?email=' . $row['username'] . '" class="btn btn-sm btn-danger">Delete</a>';
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
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
</body>

</html>