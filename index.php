<?php
include "db.php";

if (isset($_POST['add'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $course = $_POST['course'];
    $marks = $_POST['marks'];

    mysqli_query($conn, "INSERT INTO students VALUES ('$id','$name','$course','$marks')");
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $course = $_POST['course'];
    $marks = $_POST['marks'];

    mysqli_query($conn, "UPDATE students SET name='$name', course='$course', marks='$marks' WHERE id='$id'");
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM students WHERE id='$id'");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Management System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Student Management System</h2>

<form method="post">
    <input type="number" name="id" placeholder="Student ID" required>
    <input type="text" name="name" placeholder="Student Name" required>
    <input type="text" name="course" placeholder="Course" required>
    <input type="number" name="marks" placeholder="Marks" required>

    <button name="add">Add</button>
    <button name="update">Update</button>
</form>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Course</th>
        <th>Marks</th>
        <th>Action</th>
    </tr>

<?php
$data = mysqli_query($conn, "SELECT * FROM students");

while ($row = mysqli_fetch_assoc($data)) {
    echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['name']}</td>
            <td>{$row['course']}</td>
            <td>{$row['marks']}</td>
            <td><a href='?delete={$row['id']}'>Delete</a></td>
          </tr>";
}
?>

</table>

</body>
</html>