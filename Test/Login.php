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

<form method="POST">
    <input type="email" name="email" placeholder="Email" required autofocus><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit">Login</button>
    <a href="Register.php">Register</a>
</form>