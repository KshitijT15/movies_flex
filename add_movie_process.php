<?php
include 'config.php';

$title = $_POST['title'];
$director = $_POST['director'];
$release_date = $_POST['release_date'];
$rating = $_POST['rating'];
$poster = $_POST['poster']; 

$sql = "INSERT INTO movies (title, director, release_date, rating, poster) 
VALUES ('$title', '$director', '$release_date', '$rating', '$poster')";

if ($conn->query($sql) === TRUE) {
    
    header("Location: index.php");
    exit(); 
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
