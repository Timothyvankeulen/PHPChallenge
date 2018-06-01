<?php
//Connect to the database
include './Include/DBConnection.php';

//Checking if the firstname/lastname/email are filled in.
if (isset($_POST['playlist']) && isset($_POST['url'])) {
//Checks the data from the form.
    $playlist = $_POST['playlist'];
    $url = $_POST['url'];

    //Inserts the data into the database
    $sql = "INSERT INTO Playlist (playlistname, url) 
VALUES ('$playlist', '$url')";

    //Checks if the data is inserted.
    if ($conn->query($sql) === TRUE) {
        echo "Your playlist has been added.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
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
        p:first-child {
            margin-top: 0;
        }

        p, button {
            margin: 0;
            margin-top: 10px;
        }
    </style>
</head>
<body>
<?php include 'Include/Navbar.php'; ?>
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="text-center display-4">SpotiTube</h1>
        <p class="text-center lead">Listen to your own music at SpotiTube</p>
    </div>
</div>
<div class="container">
    <h5>New Playlist</h5>
    <div class="card">
        <div class="card-body">
            <form method="POST">
                <p class="card-text">Name Playlist</p>
                <input type="text" name="playlist" placeholder="Playlist name" required autofocus><br>
                <p class="card-text">Url to playlist-img (400 x 400px)</p>
                <input type="text" name="url" placeholder="Url" required><br>
                <button type="submit">Create</button>
            </form>
        </div>
    </div>
</div>
<?php include 'Include/Footer.php'; ?>
</body>
</html>