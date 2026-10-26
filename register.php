<?php
$conn=new mysqli("localhost","root","","studentdb");
if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $student_name=$_POST['student_name'];
    $gender=$_POST['gender'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $dob=$_POST['dob'];
    $password=password_hash($_POST['password'],PASSWORD_DEFAULT);
    $department=$_POST['department'];
    $course=$_POST['course'];
    $address=$_POST['address'];

    $sql="INSERT INTO students(student_name,gender,email,phone,dob,password,department,course,address)
          VALUES(?,?,?,?,?,?,?,?,?)";
   $stmt = $conn->prepare($sql);

$stmt->bind_param(
    "sssssssss",
    $student_name,
    $gender,
    $email,
    $phone,
    $dob,
    $password,
    $department,
    $course,
    $address
);

if ($stmt->execute()) {
    echo "<script>
        alert('Student Registered Successfully!');
        window.location.href = '/SRS/students.php';
    </script>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
}
?>