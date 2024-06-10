<?php
include 'connect.php';
include_once 'index.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $title = mysqli_real_escape_string($conn, $_POST['title']);

    // Attempt insert query execution
    $sql = "INSERT INTO todos (title) VALUES ('$title')";
    if (mysqli_query($conn, $sql)) {
        // Set a session variable to indicate success
        $_SESSION['success'] = true;
    } else {
        echo "Failed to insert the record: " . mysqli_error($conn);
    }
}

mysqli_close($conn); // Close the database connection
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container mt-2">
        <form method="post" action="">
            <div class="mb-3">
                <label for="" class="form-label"></label>
                <input type="text" name="title" class="form-control" id="exampleInputEmail1" autofocus aria-describedby="emailHelp" placeholder="what do you need to do ?" required>
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>

        <?php
        // Check if success session variable is set
        if (isset($_SESSION['success']) && $_SESSION['success'] === true) {
            echo "<div class='alert alert-success' role='alert'>New record created successfully</div>";
            // Unset the session variable after displaying the message
            unset($_SESSION['success']);
        }
        ?>

        <?php include_once 'display_todo.php' ?>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>