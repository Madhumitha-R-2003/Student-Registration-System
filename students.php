<?php
require_once "config/database.php";
$editStudent = null;
if (isset($_GET['edit'])) {
    $id = (int) $_GET['edit'];

    $stmt = $conn->prepare("SELECT * FROM students WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $editStudent = $stmt->get_result()->fetch_assoc();
    $stmt->close();
}
$result = $conn->query("SELECT * FROM students ORDER BY id ASC");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registered Students List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            background: #f4f6f9;
        }

        h2 { color: #333; }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background: navy;
            color: white;
        }

        input {
            padding: 8px;
            margin: 5px;
        }
        .edit,
        button[type="submit"] {
            background: transparent;
            color:black;
            border: none;
            padding: 0;
            margin-right: 15px;
            text-decoration: underline;
            cursor: pointer;
            font: inherit;
        }
    </style>
</head>
<body>
<h2>Registered Students List</h2>
<?php if ($editStudent) { ?>
    <h3>Edit Student Details</h3>

    <form method="POST" action="edit.php">
        <input type="hidden" name="id"
               value="<?php echo $editStudent['id']; ?>">

        <input type="text" name="student_name"
               placeholder="Student Name"
               value="<?php echo htmlspecialchars($editStudent['student_name']); ?>"
               required>

        <input type="email" name="email"
               placeholder="Email"
               value="<?php echo htmlspecialchars($editStudent['email']); ?>"
               required>

        <input type="text" name="phone"
               placeholder="Phone"
               value="<?php echo htmlspecialchars($editStudent['phone']); ?>">

        <input type="text" name="department"
               placeholder="Department"
               value="<?php echo htmlspecialchars($editStudent['department']); ?>">

        <input type="text" name="course"
               placeholder="Course"
               value="<?php echo htmlspecialchars($editStudent['course']); ?>">

        <button class="update-btn" type="submit" name="update">
            Update
        </button>
    </form>

    <br>
<?php } ?>
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Department</th>
        <th>Course</th>
        <th>Actions</th>
    </tr>
    <?php 
    $count=1;
    while ($row = $result->fetch_assoc()) { ?>
    <tr>
        <td><?php echo $count++; ?></td>
        <td><?php echo htmlspecialchars($row['student_name']); ?></td>
        <td><?php echo htmlspecialchars($row['email']); ?></td>
        <td><?php echo htmlspecialchars($row['phone']); ?></td>
        <td><?php echo htmlspecialchars($row['department']); ?></td>
        <td><?php echo htmlspecialchars($row['course']); ?></td>

        <td>
            <a class="edit"
               href="students.php?edit=<?php echo $row['id']; ?>">
                Edit
            </a>

            <form method="POST" action="delete.php"
                  style="display:inline"
                  onsubmit="return confirm('Delete this student?');">

                <input type="hidden" name="delete_id"
                       value="<?php echo $row['id']; ?>">

                <button type="submit">Delete</button>
            </form>
        </td>
    </tr>
    <?php } ?>
</table>
<br>
<a href="index.php">Back to Registration</a>
</body>
</html>
<?php $conn->close(); ?>
