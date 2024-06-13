<?php
// Include the database connection
include_once 'connect.php';


// Check if the 'id' parameter is set in the URL
if (isset($_GET['id'])) {
    // Sanitize and retrieve the 'id' parameter from the URL
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // Prepare a delete statement
    $sql = "DELETE FROM todos WHERE id = $id";

    // Execute the delete statement
    if (mysqli_query($conn, $sql)) {
        // If the deletion is successful, redirect back to the page displaying the todos

        header("Location: display_todo.php");
        exit(); // Ensure no further code execution after redirection
    } else {
        // If an error occurs, display an error message
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    // If the 'id' parameter is not set, display an error message
    echo "ID parameter is missing.";
}

// Close the database connection
mysqli_close($conn);
