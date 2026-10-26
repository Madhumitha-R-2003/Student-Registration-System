
<?php
require_once "config/database.php";

if (isset($_POST['delete_id'])) {
    $id = (int) $_POST['delete_id'];

    $stmt = $conn->prepare("DELETE FROM students WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $stmt->close();
        $conn->close();

        header("Location: students.php");
        exit();
    } else {
        echo "Error deleting student: " . $stmt->error;
    }

    $stmt->close();
} else {
    header("Location: students.php");
    exit();
}

$conn->close();
?>
