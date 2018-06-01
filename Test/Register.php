<?php
//Connect to the database
include '../Include/DBConnection.php';

//Checking if the firstname/lastname/email are filled in.
if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email'])) {
    //Checks the data from the form.
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

    //Inserts the data into the database
    $sql = "INSERT INTO Users (firstname, lastname, hash, password, email) 
VALUES ('$firstname', '$lastname', '$hash', '$password', '$email')";

    //Checks if the data is inserted.
    if ($conn->query($sql) === TRUE) {
        echo "Your account has been created.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
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
<?php include '../Include/Navbar.php'; ?>
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="text-center display-4">SpotiTube</h1>
        <p class="text-center lead">Listen to your own music at SpotiTube</p>
    </div>
</div>
<div class="card text-center">
    <div class="card-body">
        <h5 class="card-title">Register</h5>
        <p class="card-text">Username</p>
        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
</div>
<div class="container">
    <form method="POST">
        <input type="email" name="email" placeholder="Email address" required autofocus><br>
        <input type="text" name="firstname" placeholder="Firstname" required><br>
        <input type="text" name="lastname" placeholder="Lastname" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit">Register</button>
        <a href="Login.php">Login</a>
    </form>
</div>
<?php include '../Include/Footer.php'; ?>
</body>
</html>
