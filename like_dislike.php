
<?php
include("conn.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the poem ID and the action (like or dislike)
    $poem_id = $_POST['poem_id'];
    $action = $_POST['action'];

    // Initialize the column to update
    $column = '';

    if ($action == 'like') {
        $column = 'likes';
    } elseif ($action == 'dislike') {
        $column = 'dislikes';
    }

    if ($column != '') {
        // Update the like/dislike count for the specific poem
        $sql = "UPDATE poems SET $column = $column + 1 WHERE id = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("i", $poem_id);
        $stmt->execute();
        $stmt->close();
    }

    // Redirect back to the poems page
    header("Location: services.php");
    exit;
}
?>
