<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'crud');

// initialize variables
$name = "";
$address = "";
$id = 0;
$update = false;

if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];

    mysqli_query($db, "INSERT INTO info (name, lastname, gender) VALUES ('$name', '$lastname', '$gender')");
    $_SESSION['message'] = "saved";
    header('location: index.php');
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];

    mysqli_query($db, "UPDATE info SET name='$name', lastname='$lastname', gender='$gender'  WHERE id=$id");
    $_SESSION['message'] = "updated!";
    header('location: index.php');
}
if (isset($_GET['del'])) {
    $id = $_GET['del'];
    mysqli_query($db, "DELETE FROM info WHERE id=$id");
    $_SESSION['message'] = "deleted!";
    header('location: index.php');
}