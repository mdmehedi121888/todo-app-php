<?php
include 'connect.php';
$id =  $_GET['id'];

// Define the update query
$sql = "UPDATE todos SET is_active = '0' WHERE id = '$id'";

// Execute the update query
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
    header('Location:display_todo.php');
} else {
    echo "Error updating record: " . $conn->error;
}

// Close connection
$conn->close();
