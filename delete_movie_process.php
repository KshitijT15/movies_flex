
<?php
include 'config.php';
$id = $_POST['id'];

$sql = "DELETE FROM movies WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    
    header("Location: index.php");
    exit(); 
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
