<?php
include 'config.php';

$id = $_POST['id'];
$title = $_POST['title'];
$director = $_POST['director'];
$release_date = $_POST['release_date'];
$rating = $_POST['rating'];

$sql = "UPDATE movies SET title='$title', director='$director', release_date='$release_date', rating='$rating' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
   
    header("Location: index.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
