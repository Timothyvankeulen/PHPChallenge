<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SpotiTube</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<?php include 'Include/Navbar.php'; ?>
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="text-center display-4">Welcome to the Homepage</h1>
        <p class="text-center lead">
            <?php
            //Checking if user has logged in, if logged in, Display Firstname and Lastname.
            if ($_SESSION['firstname'] && $_SESSION['lastname'] != NULL) {
                $firstname = $_SESSION['firstname'];
                $lastname = $_SESSION['lastname'];
                echo "$firstname $lastname";
            } else { //Redirects to the Login Page if not logged in.
                header("Location:DatabaseConnection/Login.php");
            }
            ?>
        </p>
    </div>
</div>


<?php include 'Include/Footer.php'; ?>
</body>
</html>