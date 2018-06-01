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
        <h1 class="text-center display-4">SpotiTube</h1>
        <p class="text-center lead">Listen to your own music at SpotiTube</p>
    </div>
</div>
<div class="container">
    <h3>
        Playlists
    </h3>
    <a href="addPlaylist.php">Add a new Playlist</a><br>
    <?php
    include './Include/DBConnection.php';
    //Select from database
    $sql = "SELECT * FROM playlist";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $playlistname = $row["playlistname"];
            $url = $row["url"];
            echo "<a href='playlist_list.php'><img src='$url' width='400px' height='400px'></a>";
            echo "<p>$playlistname</p>";
        }
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>
</div>

<?php include 'Include/Footer.php'; ?>
</body>
</html>
