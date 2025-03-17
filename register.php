<?php
session_start();
ob_start();
// Include config file
require_once "./admin/config.php";
 
// Define variables and initialize with empty values
$image = $name = $username = $password = "";
$image_err = $name_err = $username_err = $password_err = "";

 
// Processing form data when form is submitted
if(isset($_POST['submit'])){
    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } else{
        $name = $input_name;
    }
    
    // Validate username
    $input_username = trim($_POST["username"]);
    if(empty($input_username)){
        $username_err = "Please enter an username.";     
    } else{
        $username = $input_username;
    }
    
    // Validate password
    $input_password = trim($_POST["password"]);
    if(empty($input_password)){
        $password_err = "Please enter a valid password.";     
    } else{
        $password = $input_password;
    }
    
    
    // Check input errors before inserting in database
    if(empty($name_err) && empty($username_err) && empty($password_err)){
        // image validation
        $imagetype = array(image_type_to_mime_type(IMAGETYPE_GIF), image_type_to_mime_type(IMAGETYPE_JPEG), image_type_to_mime_type(IMAGETYPE_PNG));

        $image_err = "";
        $imageUploadERROR = FALSE;
        $FOLDER = "admin/uploads/users/";
        if ($_FILES["f"]["name"] && $_FILES["f"]["error"] == 0) {
            // uploaded file is OK
            
            if (in_array($_FILES["f"]["type"], $imagetype)) {
                // get the extention of the file
                $file_extention = @strtolower(@end(@explode(".", $_FILES["f"]["name"])));
                // Setting an unique name for the file
                $file_name = $_POST["name"] . "." . $file_extention;
                $image = $file_name;
                
                if (move_uploaded_file($_FILES["f"]["tmp_name"], $FOLDER . $file_name) === FALSE) {
                    $image_err = "Error while uploading the file";
                } else {
                    echo "Image uploaded successfully";
                }
            } else {
                $image_err = "File is not a valid image type.";
            }
        }
        // Prepare an insert statement
        $sql = "INSERT INTO users (image, name, username, password) VALUES ('$image', '$name', '$username', '$password')";
        if (mysqli_query($link, $sql)) {
            $_SESSION["username"] = $username;
            echo '<meta http-equiv="refresh" content="0; URL=index.php">';
        } else {
            echo "Error: " . $sql . ":-" . mysqli_error($link);
        }
    }
    // Close connection
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- icon font -->
    <script src="https://use.fontawesome.com/c0bbe922da.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>e-grocery - Sign up</title>
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
        background-image: linear-gradient(to bottom right, #3c6382, #0a3d62);

        display: flex;
        justify-content: center;
        align-items: center;    
    }
    .form {
        padding: 20px 30px;
        width:600px;
        height: 600px;
        background-color: #FFF;
        border-radius: 15px;
        box-shadow: 0 0 10px;
        border:1px solid gray;
    }
    .form label {
        padding-left: 5px !important;
        color: #2c3e50;
    }

    .form-control {
        height: 40px;
    }
    .btn-reg,
    .btn-reg:link {
        padding: 10px 15px;
        color: #fff;
        font-weight: 700;
        border-radius: 5px;
        margin-left: 10px;
    }
    </style>

</head>

<body>
<div class="container-fluid bg-light">
        <div class="row">
            <nav class="nav">
                <div class="col col-md-5 logo text-center">
                <a href="#"><span>e</span>-Grocery</a>
                </div>
                <div class="col col-md-7">
                    <ul class="nav-bar">
                    <li class="navbar__item"> <a href="index.php" class="navbar__item--link"> Go Home </a> </li>
                    <li class="navbar__item"> <a href="products.php" class="navbar__item--link"> Take Some Orders </a> </li>
                        <li class="navbar__item" >
                            <a href="admin" class="navbar__item--link" > Admin? </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <div class="wrapper">
        <div class="form">
            <h2 class="text-success font-weight-bold text-center mb-3">Sign Up</h2>
            
            <form action="register.php" enctype="multipart/form-data" method="POST">
                <div class="form-group <?php echo (!empty($image_err)) ? 'has-error' : ''; ?>">
                    <label class="font-weight-bold">Profile Picture</label>
                    <input type="file" name="f" class="form-control" required>
                    <span class=" help-block text-danger"><?php echo $image_err;?></span>
                </div>
                <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                    <label class="font-weight-bold">Name</label>
                    <input type="text" name="name" class="form-control" value="<?php echo $name; ?>" >
                    <span class="help-block text-danger"><?php echo $name_err;?></span>
                </div>
                <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                    <label class="font-weight-bold">Email</label>
                    <input type="email" name="username" class="form-control" value="<?php echo $username; ?>" >
                    <span class="help-block text-danger"><?php echo $username_err;?></span>
                </div>
                <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                    <label class="font-weight-bold">Password</label>
                    <input type="password" name="password" class="form-control" value="<?php echo $password; ?>" >
                    <span class="help-block text-danger"><?php echo $password_err;?></span>
                </div>
                <input type="submit" class="btn-reg bg-primary" value="Submit" name="submit">
                <a href="index.php" class="btn-reg bg-danger">Cancel</a>
            </form>
        </div>
    </div>
</body>

</html>