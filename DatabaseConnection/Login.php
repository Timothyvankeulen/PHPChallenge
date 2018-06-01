<?php
session_start(); // Starts the session
//Connect to the database
include '../Include/DBConnection.php';

if (isset($_POST['email']) && isset($_POST['password'])) {
    //Checks the Firstname/lastname/email from the form.
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM Users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        //output data of each row
        while ($row = $result->fetch_assoc()) {
            //Making a session from the data that has been entered
            $_SESSION['firstname'] = $row['firstname'];
            $_SESSION['lastname'] = $row['lastname'];
            if(password_verify($_POST["password"],$row['hash'])){
                header("location:../index.php");
            }
            else {
                echo "WRONG PASSWORD";
            }
        }
    } else {
        echo "0 results";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SpotiTube</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        p {
            margin: 0;
        }
        p, button {
            margin-top:10px;
        }
        button {
            margin-right:10px;
        }
        .register {
            text-decoration: none;
            color:black;
        }
    </style>
</head>
<body>
<?php include '../Include/Navbar2.php'; ?>
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="text-center display-4">SpotiTube</h1>
        <p class="text-center lead">Listen to your own music at SpotiTube</p>
    </div>
</div>
<div class="container">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Register</h5>
            <form method="POST">
                <p class="card-text">Email</p>
                <input type="email" name="email" placeholder="Email address" required autofocus><br>
                <p class="card-text">Password</p>
                <input type="password" name="password" placeholder="Password" required><br>
                <button type="submit">Login</button>
                <button><a href="Register.php" class="register">Register</a></button>
            </form>
        </div>
    </div>
</div>
<?php include '../Include/Footer.php'; ?>
</body>
</html>