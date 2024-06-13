<?php
include 'connect.php';
include 'index.php';

// Fetch todos from the database
$sql = "SELECT * FROM todos order by id desc";
$result = mysqli_query($conn, $sql);

echo "<div class='container mt-2 text-center'>";
echo "<h3 class='mb-5' >Todo List</h3>";
echo "<table class='table table-striped text-center'>";
echo "<tr><th>#</th><th>Title</th><th>Created Time</th><th>Action</th></tr>";

// Check if there are any todos
if (mysqli_num_rows($result) > 0) {
    $cnt = 0;
    // Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        ++$cnt;

        $title = "<td id=" . $row['id'] . ">" . $row["title"] . "</td>";

        if ($row['is_active'] == 0) {
            $title = "<td id=" . $row['id'] . "> <strike> " . $row["title"] . " </strike> </td>";
        }

        echo "<tr>
            <td>" . $cnt . "</td>
            $title
            <td>" . $row["date"] . " </td>
            <td>
                <button class='border-0'><a href='update.php?id=" . $row['id'] . "' class='mx-3')'><i class='fa-solid fa-check fs-4 cursor-pointer'></i></a></button>
                <button class='border-0'><a href='delete.php?id=" . $row['id'] . "'><i class='fa-solid fa-trash fs-4 cursor-pointer'></i></a></button>
            </td>
        </tr>";
    }
} else {
    echo "<tr><td class='text-center' colspan='4'>No todos found</td></tr>";
}

echo "</table>";
echo "</div>";

mysqli_close($conn); // Close the database connection
?>

<script>
    // function markDone(id) {
    //     // console.log("clicked " + id);
    //     var titleElement = document.getElementById(id);
    //     titleElement.innerHTML = '<strike>' + titleElement.innerHTML + '</strike>';
    // }
</script>