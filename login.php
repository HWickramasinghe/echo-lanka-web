<?php
session_start();
ob_start();
// Include config file
require_once "./admin/config.php";

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

//session track
// $_SESSION["username"] = "";
 
// Processing form data when form is submitted
if(isset($_POST['login'])){
    // Validate usename
    $input_username = trim($_POST["username"]);
    if(empty($input_username)){
        $username_err = "Please enter a valid email.";
    } else{
        $username = $input_username;
    }
    
    // Validate password
    $input_password = trim($_POST["password"]);
    if(empty($input_password)){
        $password_err = "Please enter valid password.";
    } else{
        $password = $input_password;
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err)){

        $sql = "SELECT *  FROM users where username = '$username' AND password = '$password'";
        $result = mysqli_query($link, $sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        // $active = $row['active'];
      
        $count = mysqli_num_rows($result);
        echo $count;

        // if (mysqli_num_rows($result)) { 
        //     while ($row = mysqli_fetch_assoc($result)) { 
        //         $username = $row['username'];
        //         $password = $row['password'];
        //         echo $username;
        //     }
        // }
        $name = $row['name'];
        if ($count) {
          $_SESSION["username"] = $name;
            header("Location: index.php");
        } else {
            header("Location: error.php");
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>e-grocery - login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <style type="text/css">
    .wrapper {
        width: 500px;
        margin: 0 auto;
    }
    </style>
</head>

<body>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="page-header">
                        <h2 class="p-3 my-3 text-center">Have an account? Login here!</h2>
                    </div>
                    <form action="login.php" enctype="multipart/form-data" method="POST">
                        <div class="row">
                            <div class="col-md-6 offset-md-3">
                                <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                                    <label class="font-weight-bold">Email</label>
                                    <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                                    <span class="help-block text-danger"><?php echo $username_err;?></span>
                                </div>
                                <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                                    <label class="font-weight-bold">Password</label>
                                    <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                                    <span class="help-block text-danger"><?php echo $password_err;?></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 offset-md-3">
                        <input type="submit" class="btn btn-primary" value="Login" name="login">
                        <a href="index.php" class="btn btn-danger">Back to Home</a>
                        </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>