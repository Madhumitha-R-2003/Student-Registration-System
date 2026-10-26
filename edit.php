
<?php
require_once "config/database.php";

if (isset($_POST['update'])) {
    $id = (int) $_POST['id'];
    $name = $_POST['student_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $department = $_POST['department'];
    $course = $_POST['course'];

    $stmt = $conn->prepare(
        "UPDATE students
         SET student_name = ?, email = ?, phone = ?,
             department = ?, course = ?
         WHERE id = ?"
    );

    $stmt->bind_param(
        "sssssi",
        $name,
        $email,
        $phone,
        $department,
        $course,
        $id
    );

    if ($stmt->execute()) {
        $stmt->close();
        $conn->close();

        header("Location: students.php");
        exit();
    } else {
        echo "Error updating student: " . $stmt->error;
    }

    $stmt->close();
} else {
    header("Location: students.php");
    exit();
}

$conn->close();
?>
